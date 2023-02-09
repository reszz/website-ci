<?php
class login extends CI_Controller {
    public function index(){
        $this->load->view('v_login');
    }
    public function aksi(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');

        $where=array(
            'pengguna_username'=>$username,
            'pengguna_password'=>$password,
            'pengguna_status'=>1
        );

        $this->load->model('m_data');

        // cek kesesuaian login pada tabel pengguna
        $cek=$this->m_data->cek_login('pengguna',$where)->num_rows();
        // cek jika login benar
        if($cek>0){
            $data=$this->m_data->cek_login('pengguna',$where)->row();
            $data_session=array(
                'id'=>$data->pengguna_id,
                'username'=>$data->pengguna_username,
                'level'=>$data->pengguna_level,
                'status'=>'telah_login'
            );
            $this->session->set_userdata($data_session);

            // alihkan halaman ke halaman dashboard pengguna
            redirect(base_url().'dashboard');
        }else{
            redirect(base_url().'login?alert=gagal');
        }    
    }
}