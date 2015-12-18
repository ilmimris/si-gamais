<?php

/**
 * File: adminmodel.php
 * Ibrohim Kholilul Islam
 */

class model_admin extends CI_Model
{

    /**
     * Construct
     */

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * Behaviors
     */

    /**
     * Function check
     *
     * @param  string  $username
     * @param  string  $password_md5
     *
     * @result boolean false if no match
     * @result array   if match
     */

    public function check($username, $password_md5)
    {
        $this->db->select('id, username, password');
        $this->db->from('administrator');
        $this->db->where('username', $username);
        $this->db->where('password', $password_md5);
        $this->db->limit(1);
        $query=$this->db->get();
 
        if($query->num_rows() == 1)
            return $query->result();
        else
            return false;
    }
}
