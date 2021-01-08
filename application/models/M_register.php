<?php
class M_register extends CI_Model
{
    function buat_akun($data)
    {
        return $this->db->insert("akun", $data);
    }
}
