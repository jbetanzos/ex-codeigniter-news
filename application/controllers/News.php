<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller
{
    public function index()
    {
        $em = $this->doctrine->em;

        $articles = $em->getRepository('models\Entity\Article')->findTop10();

        $data["articles"] = $articles;
        $this->load->view('News/list.view.php', $data);
    }

    public function delete($id)
    {
        has_session();

        $em = $this->doctrine->em;
        $article = $em->getRepository('models\Entity\Article')->find($id);
        $em->remove($article);
        $em->flush();

        redirect('admin/dashboard');
    }

    public function create()
    {
        has_session();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');
        if (empty($_FILES['photo']['name'])) {
            $this->form_validation->set_rules('photo', 'Photo', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('News/create.view.php');
            return;
        }

        $title = $this->input->post('title');
        $body = $this->input->post('body');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '200';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);


        if ($this->upload->do_upload('photo')) {
            $fileInfo = $this->upload->data();
            $article = new \models\Entity\Article();

            $article->setTitle($title);
            $article->setBody($body);
            $article->setPhoto($fileInfo['file_name']);
            $article->setCreatedAt(new DateTime());

            $em = $this->doctrine->em;
            $user = $em->getRepository('models\Entity\User')->find($this->session->userdata('username'));

            $article->setUser($user);
            $em->persist($article);
            $em->flush();

            redirect('news/show/' . $article->getId());
        }

        throw new Exception($this->upload->display_errors());
    }

    public function show($id)
    {
        $em = $this->doctrine->em;
        $article = $em->getRepository('models\Entity\Article')->find($id);

        if (!isset($article)) {
            show_404();
        }

        var_dump('hola mundo asdfasdf');


        $data['article'] = $article;
        $this->load->view('News/show.view.php', $data);
    }

    public function pdf($id)
    {
        $em = $this->doctrine->em;
        $article = $em->getRepository('models\Entity\Article')->find($id);

        $data['article'] = $article;

        pdf_create($this->load->view('News/pdf.view.php', $data, true), 'CO-News.pdf');
    }
}