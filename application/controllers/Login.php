<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Global_model');
    }

    public function index() {
        if ($this->session->userdata('sessionData')) {
            redirect('Dashboard');
        }
        $this->load->view('login');
    }

    public function loginsection() {
        $username = trim($this->input->post('username'));
        $password = trim($this->input->post('password'));

        $result = $this->Global_model->select_single('', array('email' => $username), 'user');
        $storedPassword = base64_decode($result['password']);
        if ($storedPassword == $password) {
            $sessionD = array(
                'id' => $result['id'],
                'name' => $result['name'],
                'email' => $result['email'],
                'userType' =>$result['user_type']
            );

            $this->session->set_userdata('sessionData', $sessionD);
            redirect('Dashboard');
        } else {
            $this->index();
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Login/index');
    }

}
