<?php
class M_dashboard extends CI_Model
{
    function get_data_akun()
    {
        return $this->db->get('akun')->result_array();
    }

    function get_data_komen()
    {
        $data = $this->db->query("SELECT * FROM tb_comment INNER JOIN akun USING (id_akun) ORDER BY waktu DESC");
        return $data->result_array();
    }

    function get_data_postingan()
    {
        $this->db->order_by("waktu", "desc");
        $query = $this->db->get('post');
        return $query->result_array();
    }

    function tambah_data_post($data)
    {
        return $this->db->insert("post", $data);
    }

    function tambah_data_komentar($data)
    {
        return $this->db->insert("tb_comment", $data);
    }

    function get_data_like()
    {
        return $this->db->get('tb_like')->result_array();
    }

    function add_like_post($data)
    {
        return $this->db->insert("tb_like", $data);
    }

    function delete_like_post($id_akun, $id_post)
    {
        $query = $this->db->query("DELETE FROM tb_like WHERE id_akun = '$id_akun' and id_post = '$id_post'");
        return $query;
    }

    function delete_comment($id_comment)
    {
        $query = $this->db->query("DELETE FROM tb_comment WHERE id_comment = '$id_comment'");
        return $query;
    }

    function delete_postingan($id_post)
    {
        $query = $this->db->query("DELETE FROM post WHERE id_post = '$id_post'");
        return $query;
    }

    function delete_foto($id_post)
    {
        $data = $this->db->query("SELECT * FROM post WHERE id_post = '$id_post'")->row();
        $gambar = $data->foto_postingan;

        if ($gambar != "") {
            unlink(FCPATH . "assets/images/post/" . $gambar);
        }
    }
}
