<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends CI_Controller
{
    public function index()
    {
        //Form Validation
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.Email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|min_length[6]|matches[password]');
        $this->form_validation->set_message('is_unique', 'This email is already exists.');
        if ($this->form_validation->run()) {
            //Getting Post Values
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->load->model('SignupModel');
            $this->SignupModel->index($fname, $lname, $email, $password);
        } else {
            $this->load->view('Signup');
        }
    }
}
