<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        has_session();
    }

    public function newsList()
    {
        $em = $this->doctrine->em;

        $email = $this->session->userdata('username');
        $articles = $em->getRepository('models\Entity\Article')->findAllByEmail($email);

        $data["articles"] = $articles;
        $this->load->view('News/admin.list.view.php', $data);
    }

    public function index()
    {
        $this->newsList();
    }
}
