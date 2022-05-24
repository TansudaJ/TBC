<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SignupModel extends CI_Model
{
    public function index($fname, $lname, $email, $password)
    {
        $data = array(
            'Firstname' => $fname,
            'Lastname' => $lname,
            'Email' => $email,
            'Password' => $password
        );
        $query = $this->db->insert('user', $data);
        if ($query) {
            $this->session->set_flashdata('success', 'ลงชื่อเข้าใช้งานสำเร็จ คุณสามารถเข้าใช้งานระบบได้ทันที');
            redirect('Signup');
        } else {
            $this->session->set_flashdata('error', 'เกิดข้อผิดพลาด กรุณาสมัครใหม่อีกครั้ง');
            redirect('Signup');
        }
    }
    
}
