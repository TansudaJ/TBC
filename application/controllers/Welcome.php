<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Welcome extends CI_Controller
{
    //Validating login

    public function index()
    {
        $this->checklogin();
        $this->load->view('Welcome');
    }
    private function checklogin(){
		if(!isset($_SESSION['logged_in'])){
			$this->session->set_flashdata('message_error', 'กรุณาเข้าสู่ระบบก่อนเข้าใช้งาน');
			redirect('Signin');
		}

	}
}
