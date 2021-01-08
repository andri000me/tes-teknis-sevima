<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_dashboard');

        if ($this->session->userdata('account') == null) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['akun'] = $this->M_dashboard->get_data_akun();
        $data['postingan'] = $this->M_dashboard->get_data_postingan();
        $data['data_like'] = $this->M_dashboard->get_data_like();
        $data['data_komen'] = $this->M_dashboard->get_data_komen();
        $this->load->view('V_dashboard', $data);
    }

    function tambah_post()
    {
        $id_akun = $this->input->post('id_akun');
        $nama = $this->input->post('nama');
        $foto = $this->input->post('foto');
        $text = $this->input->post('text');
        $uniqe_id = uniqid();

        $nama_foto = $nama . "_" . $uniqe_id;

        // Set preference
        $config['upload_path']          = './assets/images/post/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 5120;
        $config['file_name']            = $nama_foto;

        $this->upload->initialize($config);

        // File upload
        if ($this->upload->do_upload('foto_postingan')) {
            $upload_data = $this->upload->data();
            $image = $upload_data["file_name"];

            $data = array(
                "id_akun" => $id_akun,
                "nama" => $nama,
                "foto" => $foto,
                "text" => $text,
                "foto_postingan" => $image
            );

            $this->M_dashboard->tambah_data_post($data);
        } else {
            $data = array(
                "id_akun" => $id_akun,
                "nama" => $nama,
                "foto" => $foto,
                "text" => $text,
            );

            $this->M_dashboard->tambah_data_post($data);
        }

        redirect('Dashboard');
    }

    function tambah_komentar()
    {
        $id_akun = $this->input->post('id_akun');
        $id_post = $this->input->post('id_post');
        $text = $this->input->post('text');

        $data = array(
            'id_akun' => $id_akun,
            'id_post' => $id_post,
            'text' => $text,
        );

        $this->M_dashboard->tambah_data_komentar($data);

        redirect('Dashboard');
    }

    function add_like()
    {
        $id_akun = $this->input->post('id_akun');
        $id_post = $this->input->post('id_post');

        $data = array(
            'id_post' => $id_post,
            'id_akun' => $id_akun,
        );

        $this->M_dashboard->add_like_post($data);

        redirect('Dashboard');
    }

    function delete_like()
    {
        $id_akun = $this->input->post('id_akun');
        $id_post = $this->input->post('id_post');

        $this->M_dashboard->delete_like_post($id_akun, $id_post);

        redirect('Dashboard');
    }

    function delete_comment()
    {
        $id_comment = $this->input->post('id_comment');

        $this->M_dashboard->delete_comment($id_comment);

        redirect('Dashboard');
    }

    function delete_postingan()
    {
        $id_post = $this->input->post('id_post');

        $this->M_dashboard->delete_foto($id_post);

        $this->M_dashboard->delete_postingan($id_post);

        redirect('Dashboard');
    }
}
