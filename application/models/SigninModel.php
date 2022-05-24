<?php
defined('BASEPATH') or exit('No direct script access allowed');
class SigninModel extends CI_Model
{

    public function index($Email,$Password)
    {
            //$query = $this->db->get('users');
            $sql = "SELECT * FROM user WHERE email='".$Email."' and password='".$Password."' ";
            //echo $sql;
            //die();
            $query = $this->db->query($sql);
            $users = $query->result();
            if(count($users)==1){
                //var_dump($users);
                $user = $users[0];
                if($user->Password == $Password){
                        $user_data["userID"] = $user->userID;
                        $user_data["Firstname"] = $user->Firstname;
                        $user_data["Lastname"] = $user->Lastname;
                        $user_data["Email"] = $user->Email;
                        $user_data["logged_in"] = TRUE;
                        $this->session->set_userdata($user_data);
                        return (true);
                }else{
                        return (false);
                }
                
            }else{
                return (false);
            }

    }
}
