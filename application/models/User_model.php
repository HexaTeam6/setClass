<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    function selectUserInfo($kode_user){
        $sql = "SELECT * FROM master_login WHERE kode_user=?";
        $result = $this->db->query($sql, array($kode_user));
        return $result;
    }

    function getLogin($kode_user, $password)
    {
        $sql = "SELECT * FROM master_login WHERE kode_user=? AND password=MD5(?)";
        $result = $this->db->query($sql, array($kode_user, $password));
        return $result;
    }
}
?>