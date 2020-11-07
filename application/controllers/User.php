<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Global_model');
    }

    public function createUsers() {
        $this->load->library('form_validation');
        $this->load->view('createUser');
    }

    public function insert() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('userName', 'User Name', 'required|trim|alpha|max_length[60]|min_length[03]');
        $this->form_validation->set_rules('userEmail', 'User Email', 'required|trim|callback_insertEmailUniqueness');
        $this->form_validation->set_rules('userPassword', 'Password', 'trim|required|max_length[60]|min_length[03]');
        $this->form_validation->set_rules('userConfirmPassword', 'Confirm Password', 'trim|required|matches[userPassword]');
        $this->form_validation->set_rules('userGender', 'User Gender', 'required');
        $this->form_validation->set_rules('userAge', 'User Age', 'required');

        if ($this->form_validation->run() === TRUE) {
            $insertData = array(
                'name' => $this->input->post('userName'),
                'email' => $this->input->post('userEmail'),
                'password' => base64_encode($this->input->post('userPassword')),
                'gender' => $this->input->post('userGender'),
                'age' => $this->input->post('userAge'),
                'user_type' => $this->input->post('userType'),
                'created_datetime' => date('Y-m-d H:i:s')
            );

            $this->Global_model->insert($insertData, 'user');
            redirect('User/listusers');
        } else {
            $this->createUsers();
        }
    }

    function insertEmailUniqueness($email) {
        if ($this->Global_model->select_single('', array('email=' => $email, 'is_deleted' => 0), 'user')) {
            $this->form_validation->set_message('insertEmailUniqueness', 'Email Id is Not Unique');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function listUsers() {
        $data['content'] = $this->Global_model->select_multiple('name,email,gender,user_type,id', array('is_deleted' => 0), 'user', 'created_datetime');
        $this->load->view('listUsers', $data);
    }

    public function delete($id) {
        $this->Global_model->update(array('is_deleted' => 1), array('id' => $id), 'user');
        $data['content'] = $this->Global_model->select_multiple('name,email,gender,user_type,id', array('is_deleted' => 0), 'user', 'created_datetime');
        $this->load->view('listUsers', $data);
    }

}
