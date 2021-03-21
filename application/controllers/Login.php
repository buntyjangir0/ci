<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('facebook');

    }
    public function index()
    {
       
    }

    public function fblogin()
    {
        $data['user'] = array();
        if ($this->facebook->is_authenticated()) {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id,name,email');
            if (!isset($user['error'])) {
               $data['user'] = $user;
               echo $email        = $user['email'];
               echo "<br>";
             echo   $name = $user['name'];
                

            }

        } else {
            $data['title'] = 'Login - IPL Quiz';
            $this->load->view('login', $data);
        }
    }

}
