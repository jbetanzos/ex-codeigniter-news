<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GmailMailer extends CI_Model
{
    protected $mailClient;

    public function __construct()
    {
        $this->mailClient = new PHPMailer();
    }

    public function send($email, $subject, $message)
    {
        $this->mailClient->isSMTP();
        $this->mailClient->Host = 'smtp.gmail.com';
        $this->mailClient->Port = '587';
        $this->mailClient->SMTPSecure = 'tls';
        $this->mailClient->SMTPAuth = true;
        $this->mailClient->Username = 'jose.betanzos@demosite.mx';
        $this->mailClient->Password = 'SomePassword';
        $this->mailClient->setFrom('jose.betanzos@demosite.mx', 'Jose Betanzos');
        $this->mailClient->addReplyTo('no-replay@demosite.mx', 'No Replay');
        $this->mailClient->addAddress($email, $email);
        $this->mailClient->Subject = $subject;
        $this->mailClient->msgHTML($message);

        if (!$this->mailClient->send()) {
            throw new Exception("ActivationMailException: Mail not sent");
        }
    }
}