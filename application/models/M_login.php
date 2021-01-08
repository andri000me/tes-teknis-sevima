<?php
class M_login extends CI_Model
{

    function get_data_akun()
    {
        return $this->db->get('akun')->result_array();
    }

    function cek_akun($data_account)
    {
        $query = $this->db->get_where('akun', $data_account);
        if ($query->num_rows() != 0) {
            return $query->row();
        } else {
            return array();
        }
    }
}
