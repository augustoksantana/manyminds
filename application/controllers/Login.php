<?php

    defined('BASEPATH') OR exit('Ação não permitida');

    class Login extends CI_Controller{

        public function index() {

            $data = array (
                'title'=>'Login',
            );
            $this->load->view('layout/header',$data);
            $this->load->view('login/index');
            $this->load->view('layout/footer');
        }
        
        public function auth() {
            $identity = html_escape($this->input->post('email'));
            $password = html_escape($this->input->post('password'));
            $remember = FALSE;
            if($this->ion_auth->login($identity,$password,$remember)) {
                redirect('/');
            } else {
                if ($this->ion_auth->is_max_login_attempts_exceeded($identity))
                {
                  $this->session->set_flashdata('error', 'Login bloqueado por 5 minutos');
                } else {
                    $this->session->set_flashdata('error','Verifique suas credenciais');
                }
                redirect($this->router->fetch_class());
            }
        }
        
        public function logout() {
            $this->ion_auth->logout();
            redirect($this->router->fetch_class());
        }
    }