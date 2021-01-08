<?php
class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_register');
    }

    public function index()
    {
        $this->load->view('V_register');
    }

    function register_akun()
    {
        $email = $this->input->post('email');
        $password_old = $this->input->post('password');
        $password = hash("sha256", $password_old);
        $nama = $this->input->post('nama');

        $data = array(
            "email" => $email,
            "password" => $password,
            "nama" => $nama,
        );

        $this->M_register->buat_akun($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Akun berhasil dibuat</div>');
        redirect('Register');
    }
}
