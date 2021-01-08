<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_login');
    }

    public function index()
    {
        $data['akun'] = $this->M_login->get_data_akun();
        $this->load->view('V_login', $data);
    }

    function login_akun()
    {
        $email = $this->input->post('email');
        $password_old = $this->input->post('password');
        $password = hash("sha256", $password_old);

        $data = array(
            'email' => $email,
            'password' => $password
        );

        $result = $this->M_login->cek_akun($data);

        if ($result) {
            $data_account = array(
                'id_akun' => $result->id_akun,
            );

            $this->session->set_userdata('account', $data_account);

            redirect('Dashboard');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Login gagal !</div>');
            redirect('Login');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect("Login");
    }
}
