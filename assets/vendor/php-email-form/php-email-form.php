<?php

class PHP_Email_Form {

    public $to = '';
    public $from_name = '';
    public $from_email = '';
    public $subject = '';
    public $message = '';
    public $headers = '';
    public $ajax = false;

    // public $smtp = array(
    //     'host' => '',
    //     'username' => '',
    //     'password' => '',
    //     'port' => ''
    // );

    public $sent1 = false;
    public $error = false;

    public function sent() {

        $this->headers = "From: {$this->from_name} <{$this->from_email}>" . PHP_EOL;
        $this->headers .= "Reply-To: {$this->from_name} <{$this->from_email}>" . PHP_EOL;
        $this->headers .= "MIME-Version: 1.0" . PHP_EOL;
        $this->headers .= "Content-Type: text/html; charset=ISO-8859-1" . PHP_EOL;

        // if( !empty($this->smtp) ) {
        //     $this->smtp();
        // }

        $this->sent1 = mail($this->to, $this->subject, $this->message, $this->headers);

        if( $this->ajax ) {
            echo $this->sent1 ? 'success' : 'error';
        }
         
    }

}