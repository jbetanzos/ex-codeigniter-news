<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    public function signin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $em = $this->doctrine->em;
            try {
                $user = $em->getRepository('models\Entity\User')->findByEmailAndPassword($email, $password);

                if (!$user || !$user->isConfirmed()) {
                    $this->load->view('User/signin.view.php');
                    return;
                }

                $sessionInfo = array(
                    'username' => $email,
                    'logged_in' => true
                );

                $this->session->set_userdata($sessionInfo);

                redirect('admin/dashboard/newsList');
            } catch (\Doctrine\ORM\NoResultException $e) {
                redirect('user/signin');
            }
        }

        $this->load->view('User/signin.view.php');
    }

    public function signup()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('User/signup.view.php');
            return;
        }

        $email = $this->input->post('email');
        $em = $this->doctrine->em;
        $user = $em->getRepository('models\Entity\User')->find($email);

        if ($user) {
            $data['error_message'] = 'The email is registered';
            $this->load->view('User/signup.view.php', $data);
            return;
        }

        $user = new \models\Entity\User();

        $user->setEmail($email);
        $user->setConfirmed(false);
        $plainPassword = sha1(time());
        $user->setPassword(sha1($plainPassword));

        $this->doctrine->em->persist($user);
        $this->doctrine->em->flush();

        $data["activateAccountUrl"] = anchor('user/activate/' . $user->getEmail() . '/' . $plainPassword, 'Click here to activate your account');

        $this->load->model('Mailer/GmailMailer');
        $this->GmailMailer->send($user->getEmail(), "Activate your account", $this->load->view('User/mail.view.php', $data, true));

        $this->load->view('User/mail.sent.view.php');
    }

    public function activate($email, $key)
    {
        $email = urldecode($email);
        $em = $this->doctrine->em;
        $user = $em->getRepository('models\Entity\User')->findByEmailAndPassword($email, $key);

        if (!$user) {
            throw new Exception("User not found");
        }

        $data['email'] = $email;
        $data['key'] = $key;

        $this->load->view('User/confirm.view.php', $data);
    }

    public function changepassword()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $oldPassword = $this->input->post('key');

        $em = $this->doctrine->em;
        $user = $em->getRepository('models\Entity\User')->findByEmailAndPassword(urldecode($email), $oldPassword);

        if (!$user || $user->isConfirmed()) {
            throw new Exception("User not found");
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirmpass', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['email'] = $email;
            $data['key'] = $oldPassword;
            $this->load->view('User/confirm.view.php', $data);
        }

        $user->setPassword(sha1($password));
        $user->setConfirmed(true);
        $em->flush();

        $sessionInfo = array(
            'username' => $email,
            'logged_in' => true
        );

        $this->session->set_userdata($sessionInfo);

        redirect('admin/dashboard');
    }

    public function signoff()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
