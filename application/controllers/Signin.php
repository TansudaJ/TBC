<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Signin extends CI_Controller
{
    public function index()
    {
        //Validation for login form
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $Email = $this->input->post('email');
            $Password = $this->input->post('password');
            $this->load->model('SigninModel');
            $tmp = $this->SigninModel->index($Email, $Password);
            // echo "==$tmp==";
            // die();
            if ($tmp) {

                $this->session->set_flashdata('message_code', '202');
                $this->session->set_flashdata('message_error', 'ยินดีต้อนรับคุณเข้าสู่ระบบ');
                redirect('Welcome');
            } else {
                $this->session->set_flashdata('message_code', '503');
                $this->session->set_flashdata('message_error', 'กรุณาเข้าสู่ระบบใหม่อีกครั้ง');
                redirect('Signin');
            }
        } else {
            $this->load->view('Signin');
        }
    }

    
}
