<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
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

    public function lihat($id){
        $data['title'] = 'Verifikasi Data Siswa';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $data['siswa'] = $this->db->get_where('data_siswa', ['id_user' => $id])->row_array();
        $data['ortu'] = $this->db->get_where('data_ortu', ['id_user' => $id])->row_array();
        $data['cekortu'] = $this->db->get_where('data_ortu', ['id_user' => $id])->num_rows();
        $data['sekolah'] = $this->db->get_where('data_sekolah', ['id_user' => $id])->row_array();
        $data['ceksekolah'] = $this->db->get_where('data_sekolah', ['id_user' => $id])->num_rows();
        $data['berkas'] = $this->db->get_where('data_berkas', ['id_user' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lihat', $data);
        $this->load->view('templates/footer');
    }

    public function editsiswa($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('nisn', 'NISN', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');


        $data['title'] = 'Verifikasi Data Siswa';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $siswa = $this->db->get_where('data_siswa', ['id_siswa' => $id])->row_array();
        $data['siswa'] = $siswa;

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editsiswa', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_siswa' => $this->input->post('id'),
                'nama_lengkap' => htmlspecialchars($this->input->post('nama', true)),
                'nisn' => htmlspecialchars($this->input->post('nisn', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'jk' => htmlspecialchars($this->input->post('jk', true)),
            ];

            $this->db->set($data);
            $this->db->where('id_siswa', $this->input->post('id'));
            $this->db->update('data_siswa');

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Siswa Berhasil Ditambahkan!</div>');
            redirect('Admin/lihat/'. $siswa['id_user']);
        }
    }

    public function editortu($id)
    {
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('pendidikan_ayah', 'Pendidikan Ayah', 'required');
        $this->form_validation->set_rules('pendidikan_ibu', 'Pendidikan Ibu', 'required');
        $this->form_validation->set_rules('pekerjaan_ayah', 'Pekerjaan Ayah', 'required');
        $this->form_validation->set_rules('pekerjaan_ibu', 'Pekerjaan Ibu', 'required');
        $this->form_validation->set_rules('penghasilan', 'Penghasilan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Ortu', 'required');
        $this->form_validation->set_rules('nomor', 'Nomor Telp Ortu', 'required|trim');

        $data['title'] = 'Verifikasi Data Siswa';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $ortu = $this->db->get_where('data_ortu', ['id_ortu' => $id])->row_array();
        $data['ortu'] = $ortu;

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editortu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_ayah' => htmlspecialchars($this->input->post('nama_ayah', true)),
                'nama_ibu' => htmlspecialchars($this->input->post('nama_ibu', true)),
                'pendidikan_ayah' => htmlspecialchars($this->input->post('pendidikan_ayah', true)),
                'pendidikan_ibu' => htmlspecialchars($this->input->post('pendidikan_ibu', true)),
                'pekerjaan_ayah' => htmlspecialchars($this->input->post('pekerjaan_ayah', true)),
                'pekerjaan_ibu' => htmlspecialchars($this->input->post('pekerjaan_ibu', true)),
                'penghasilan_perbulan' => htmlspecialchars($this->input->post('penghasilan', true)),
                'alamat_ortu' => htmlspecialchars($this->input->post('alamat', true)),
                'nomor_ortu' => htmlspecialchars($this->input->post('nomor', true)),
            ];

            $this->db->set($data);
            $this->db->where('id_ortu', $id);
            $this->db->update('data_ortu');

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Orang Tua Berhasil Ditambahkan!</div>');
            redirect('admin/lihat/'. $ortu['id_user']);
        }
    }

    public function setujui($id)
    {
        $data = [
            'status_verif' => 1,
            'status_lulus' => 0,
        ];
        $this->db->set($data);
        $this->db->where('id_siswa', $id);
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
        $this->db->where('id_siswa', $id);
        $this->db->update('data_siswa');
        redirect('Admin/verif');
    }

    public function hapusdata($id)
    {
        $where = array('id_siswa' => $id);
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
        $this->db->where('id_siswa', $id);
        $this->db->update('data_siswa');
        redirect('Admin/pengumuman');
    }

    public function tidaklulus($id)
    {
        $data = [
            'status_lulus' => 0,
        ];
        $this->db->set($data);
        $this->db->where('id_siswa', $id);
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
