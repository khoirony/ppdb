<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;

        $ceksiswa = $this->db->get_where('data_siswa', ['id_user' => $user['id']])->num_rows();
        if ($ceksiswa != 1) {
            $data['ceksiswa'] = '<h3 class="text-danger font-weight-bold">Belum Terisi</h3>';
        } else {
            $data['ceksiswa'] = '<h3 class="text-warning font-weight-bold">Sudah Terisi</h3>';
        }

        $cekortu = $this->db->get_where('data_ortu', ['id_user' => $user['id']])->num_rows();
        if ($cekortu != 1) {
            $data['cekortu'] = '<h3 class="text-danger font-weight-bold">Belum Terisi</h3>';
        } else {
            $data['cekortu'] = '<h3 class="text-warning font-weight-bold">Sudah Terisi</h3>';
        }

        $ceksekolah = $this->db->get_where('data_sekolah', ['id_user' => $user['id']])->num_rows();
        if ($ceksekolah != 1) {
            $data['ceksekolah'] = '<h3 class="text-danger font-weight-bold">Belum Terisi</h3>';
        } else {
            $data['ceksekolah'] = '<h3 class="text-warning font-weight-bold">Sudah Terisi</h3>';
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('User/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambahsiswa()
    {
        $this->form_validation->set_rules('nama', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('nisn', 'NISN', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('anak_ke', 'Anak ke', 'required');
        $this->form_validation->set_rules('jumlah_saudara', 'Jumlah Saudara', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('hobi', 'Hobi', 'required');
        $this->form_validation->set_rules('cita_cita', 'Cita Cita', 'required');
        $this->form_validation->set_rules('jarak_rumah', 'Jarak Rumah', 'required');
        $this->form_validation->set_rules('transportasi', 'Trasportasi', 'required');

        $data['title'] = 'Data Siswa';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $ceksiswa = $this->db->get_where('data_siswa', ['id_user' => $user['id']])->num_rows();
        $siswa = $this->db->get_where('data_siswa', ['id_user' => $user['id']])->row_array();
        $data['siswa'] = $siswa;

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            if ($ceksiswa != 1) {
                $this->load->view('User/tambahsiswa', $data);
            } else {
                $this->load->view('User/datasiswa', $data);
            }
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_lengkap' => htmlspecialchars($this->input->post('nama', true)),
                'nisn' => htmlspecialchars($this->input->post('nisn', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'jk' => htmlspecialchars($this->input->post('jk', true)),
                'anak_ke' => htmlspecialchars($this->input->post('anak_ke', true)),
                'jumlah_saudara' => htmlspecialchars($this->input->post('jumlah_saudara', true)),
                'agama' => htmlspecialchars($this->input->post('agama', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'hobi' => htmlspecialchars($this->input->post('hobi', true)),
                'cita_cita' => htmlspecialchars($this->input->post('cita_cita', true)),
                'jarak_rumah' => htmlspecialchars($this->input->post('jarak_rumah', true)),
                'transportasi' => htmlspecialchars($this->input->post('transportasi', true)),
                'id_user' => $user['id'],
            ];

            $this->db->insert('data_siswa', $data);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Siswa Berhasil Ditambahkan!</div>');
            redirect('User/tambahsiswa');
        }
    }

    public function updatesiswa($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('nisn', 'NISN', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('anak_ke', 'Anak ke', 'required');
        $this->form_validation->set_rules('jumlah_saudara', 'Jumlah Saudara', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('hobi', 'Hobi', 'required');
        $this->form_validation->set_rules('cita_cita', 'Cita Cita', 'required');
        $this->form_validation->set_rules('jarak_rumah', 'Jarak Rumah', 'required');
        $this->form_validation->set_rules('transportasi', 'Trasportasi', 'required');

        $data['title'] = 'Data Siswa';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $data['siswa'] = $this->db->get_where('data_siswa', ['id_user' => $user['id']])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('User/updatesiswa', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_lengkap' => htmlspecialchars($this->input->post('nama', true)),
                'nisn' => htmlspecialchars($this->input->post('nisn', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'jk' => htmlspecialchars($this->input->post('jk', true)),
                'anak_ke' => htmlspecialchars($this->input->post('anak_ke', true)),
                'jumlah_saudara' => htmlspecialchars($this->input->post('jumlah_saudara', true)),
                'agama' => htmlspecialchars($this->input->post('agama', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'hobi' => htmlspecialchars($this->input->post('hobi', true)),
                'cita_cita' => htmlspecialchars($this->input->post('cita_cita', true)),
                'jarak_rumah' => htmlspecialchars($this->input->post('jarak_rumah', true)),
                'transportasi' => htmlspecialchars($this->input->post('transportasi', true)),
            ];

            $this->db->set($data);
            $this->db->where('id_siswa', $id);
            $this->db->update('data_siswa');

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Siswa Berhasil Ditambahkan!</div>');
            redirect('User/tambahsiswa');
        }
    }

    public function tambahortu()
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

        $data['title'] = 'Data Orang Tua';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $cekortu = $this->db->get_where('data_ortu', ['id_user' => $user['id']])->num_rows();
        $ortu = $this->db->get_where('data_ortu', ['id_user' => $user['id']])->row_array();
        $data['ortu'] = $ortu;

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            if ($cekortu != 1) {
                $this->load->view('User/tambahortu', $data);
            } else {
                $this->load->view('User/dataortu', $data);
            }
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
                'id_user' => $user['id'],
            ];

            $this->db->insert('data_ortu', $data);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Orang Tua Berhasil Ditambahkan!</div>');
            redirect('User/tambahortu');
        }
    }

    public function updateortu($id)
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

        $data['title'] = 'Data Orang Tua';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $data['ortu'] = $this->db->get_where('data_ortu', ['id_ortu' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('User/updateortu', $data);
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
                'id_user' => $user['id'],
            ];

            $this->db->set($data);
            $this->db->where('id_ortu', $id);
            $this->db->update('data_ortu');

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Orang Tua Berhasil Ditambahkan!</div>');
            redirect('User/tambahortu');
        }
    }

    public function tambahsekolah()
    {
        $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required');
        $this->form_validation->set_rules('alamat_sekolah', 'Alamat Sekolah', 'required');
        $this->form_validation->set_rules('status_sekolah', 'Status Sekolah', 'required');
        $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'required');
        $this->form_validation->set_rules('nomor_ijazah', 'Nomor Ijazah', 'required');
        $this->form_validation->set_rules('jalur', 'Jalur Pendaftaran', 'required');

        $data['title'] = 'Data Sekolah';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $ceksekolah = $this->db->get_where('data_sekolah', ['id_user' => $user['id']])->num_rows();
        $sekolah = $this->db->get_where('data_sekolah', ['id_user' => $user['id']])->row_array();
        $data['sekolah'] = $sekolah;

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            if ($ceksekolah != 1) {
                $this->load->view('User/tambahsekolah', $data);
            } else {
                $this->load->view('User/datasekolah', $data);
            }
            $this->load->view('templates/footer');
        } else {
            $data = [
                'asal_sekolah' => htmlspecialchars($this->input->post('asal_sekolah', true)),
                'alamat_sekolah' => htmlspecialchars($this->input->post('alamat_sekolah', true)),
                'status_sekolah' => htmlspecialchars($this->input->post('status_sekolah', true)),
                'tahun_lulus' => htmlspecialchars($this->input->post('tahun_lulus', true)),
                'nomor_ijazah' => htmlspecialchars($this->input->post('nomor_ijazah', true)),
                'jalur_pendaftaran' => htmlspecialchars($this->input->post('jalur', true)),
                'id_user' => $user['id'],
            ];

            $this->db->insert('data_sekolah', $data);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Orang Tua Berhasil Ditambahkan!</div>');
            redirect('User/tambahsekolah');
        }
    }

    public function setting()
    {
        $data['title'] = 'Pengaturan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('User/setting', $data);
        $this->load->view('templates/footer');
    }
}
