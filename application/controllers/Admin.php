<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hitung_siswa'] = $this->db->get('data_siswa')->num_rows();
        $data['hitung_lulus'] = $this->db->get_where('data_siswa', ['status_lulus' => 1])->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function verif()
    {
        $data['title'] = 'Verifikasi Data Siswa';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $data['data_siswa'] = $this->db->get('data_siswa')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/verif', $data);
        $this->load->view('templates/footer');
    }

    public function caridata()
    {
        $data['title'] = 'Verifikasi Data Siswa';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;

        $query = "SELECT * FROM data_siswa where nama_lengkap like '" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/caridata', $data);
        $this->load->view('templates/footer');
    }

    public function tambahdata()
    {
        $this->form_validation->set_rules('no_peserta', 'No Peserta', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('nisn', 'NISN', 'required|trim');
        $this->form_validation->set_rules('ttl', 'Tempat Tgl Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');


        $data['title'] = 'Verifikasi Data Siswa';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambahdata', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'no_peserta' => htmlspecialchars($this->input->post('no_peserta', true)),
                'nama_lengkap' => htmlspecialchars($this->input->post('nama', true)),
                'nisn' => htmlspecialchars($this->input->post('nisn', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'jk' => htmlspecialchars($this->input->post('jk', true)),
            ];

            $this->db->insert('data_siswa', $data);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Siswa Berhasil Ditambahkan!</div>');
            redirect('Admin/verif');
        }
    }

    public function editdata($id)
    {
        $this->form_validation->set_rules('no_peserta', 'No Peserta', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('nisn', 'NISN', 'required|trim');
        $this->form_validation->set_rules('ttl', 'Tempat Tgl Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');


        $data['title'] = 'Verifikasi Data Siswa';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $data['siswa'] = $this->db->get_where('data_siswa', ['id' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editdata', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'no_peserta' => htmlspecialchars($this->input->post('no_peserta', true)),
                'nama_lengkap' => htmlspecialchars($this->input->post('nama', true)),
                'nisn' => htmlspecialchars($this->input->post('nisn', true)),
                'ttl' => htmlspecialchars($this->input->post('ttl', true)),
                'jk' => htmlspecialchars($this->input->post('jk', true)),
            ];

            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('data_siswa');

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Siswa Berhasil Ditambahkan!</div>');
            redirect('Admin/verif');
        }
    }

    public function setujui($id)
    {
        $data = [
            'status_verif' => 1,
            'status_lulus' => 0,
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('data_siswa');
        redirect('Admin/verif');
    }

    public function batalkan($id)
    {
        $data = [
            'status_verif' => 0,
            'status_lulus' => 0,
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('data_siswa');
        redirect('Admin/verif');
    }

    public function hapusdata($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('data_siswa');
        redirect('Admin/verif');
    }

    public function pengumuman()
    {
        $data['title'] = 'Setting Pengumuman';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $data['data_siswa'] = $this->db->get_where('data_siswa', ['status_verif' => 1])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pengumuman', $data);
        $this->load->view('templates/footer');
    }

    public function lulus($id)
    {
        $data = [
            'status_lulus' => 1,
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('data_siswa');
        redirect('Admin/pengumuman');
    }

    public function tidaklulus($id)
    {
        $data = [
            'status_lulus' => 0,
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('data_siswa');
        redirect('Admin/pengumuman');
    }

    public function cetak()
    {
        $data['title'] = 'Cetak Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/cetak', $data);
        $this->load->view('templates/footer');
    }

    public function setting()
    {
        $data['title'] = 'Pengaturan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/setting', $data);
        $this->load->view('templates/footer');
    }
}
