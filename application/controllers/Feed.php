<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('xml'));
    }

    public function index()
    {
        $em = $this->doctrine->em;

        $articles = $em->getRepository('models\Entity\Article')->findTop10();

        $data["articles"] = $articles;
        $data['name'] = 'co-news.com';
        $data['url'] = 'http://co-news.com/feed';
        $data['description'] = 'Last Articles - CO News';
        $data['email'] = 'jose.betanzos@co-news.com';

        header("Content-Type: application/rss+xml");
        $this->load->view('feed.view.php',$data);
    }
}