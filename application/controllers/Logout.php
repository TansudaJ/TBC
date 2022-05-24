<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Logout extends CI_Controller
{
    //Function for logout
    public function index()
    {
        $array_items = array('userID','fname','lname','email','logged_in');
		$this->session->unset_userdata($array_items);
		redirect('Signin');
    }

}
