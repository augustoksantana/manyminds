<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Usuarios extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
          redirect('login');                
        }
    }
    
    public function index(){

        $data = array(
            'title' => 'Usuários',
            'pageTitle' => 'Lista de usuários',
            'pageSubTitle' => 'Grid de Manuteção',
            'icon_title' => 'ik ik-users',
            'users' => $this->ion_auth->users()->result(), // get all users 
            'styles' => array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css'
            ),
            'scripts' => array(
                'plugins/datatables.net/js/jquery.dataTables.min.js',
                'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'plugins/datatables.net/js/manyminds.js'
            )
        );

        $this->load->view('layout/header',$data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');

    }
    
    public function core($user_id = NULL){
        
        if(!$user_id) {
            $this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[5]|max_length[50]|is_unique[users.username]');
            $this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[5]|max_length[55]');
            $this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[5]|max_length[55]');
            $this->form_validation->set_rules('password', 'Senha', 'trim|min_length[8]|required');
            $this->form_validation->set_rules('confirmpassword', 'Confirmação de senha', 'trim|matches[password]|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|is_unique[users.email]');
            if ($this->form_validation->run()) {
                $additional_data = elements(
                    array(
                        'first_name',
                        'last_name',
                    ),$this->input->post()
                );
                $data = html_escape($data);// Limpar o array
                $data = $this->security->xss_clean($data);
                if( $user_id= $this->ion_auth->register(html_escape($this->input->post('username')), 
                        html_escape($this->input->post('password')),
                        html_escape($this->input->post('email')), 
                        html_escape($additional_data), 
                        html_escape($this->input->post('usergroup')))) {
                    $this->session->set_flashdata('sucesso','Dados atualizado com sucesso');
                } else {
                    $this->session->set_flashdata('error','Não foi possível atualizar os dados');
                }
                redirect($this->router->fetch_class());
            } else {
                $data = array(
                    'title' => 'Cadastro de Usuários',
                    'pageTitle' => 'Cadastro de usuários',
                    'icon_title' => 'ik ik-user',
                    'groups' => $this->ion_auth->groups()->result(),
                    'styles' => array(
                        'plugins/select2/dist/css/select2.min.css',
                    ),
                    'scripts' => array(
                        'plugins/select2/dist/js/select2.min.js',
                        'js/forms.js'
                    )
                );
                    
            }
                
            $this->load->view('layout/header',$data);
            $this->load->view('usuarios/core');
            $this->load->view('layout/footer');
            
        } else {
            //Edita usuário
            //verifica se usuário e existe 
            if(!$this->ion_auth->user($user_id)->row()) {
               $this->session->set_flashdata('error','Usuário não existe');
               redirect($this->router->fetch_class());
            } else {
                $group_user=$this->ion_auth->get_users_groups($user_id)->result();
                $usergroups='';
                foreach ($group_user as $gu){
                    if($usergroups!='') $usergroups=$usergroups.',';
                    $usergroups=$usergroups.$gu->id;
                }
                $this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[5]|max_length[50]|callback_username_check');
                $this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[5]|max_length[55]');
                $this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[5]|max_length[55]');
                $this->form_validation->set_rules('password', 'Senha', 'trim|min_length[8]');
                $this->form_validation->set_rules('confirmpassword', 'Confirmação de senha', 'trim|matches[password]');
                $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|callback_email_check');
                if ($this->form_validation->run()) {
                    $data = elements(
                        array(
                            'first_name',
                            'last_name',
                            'username',
                            'email',
                            'password',
                            'active',
                        ),$this->input->post()
                    );
                    
                    $password = $this->input->post('password');
                    if(!$password) {
                        unset($data['password']);
                    } 
                    $data = html_escape($data);
                    // Limpar o array
                    $data = $this->security->xss_clean($data);
                    if($this->ion_auth->update($user_id,$data)) {
                        $this->update_user_group();
                        $this->session->set_flashdata('sucesso','Dados atualizado com sucesso');
                    } else {
                        $this->session->set_flashdata('error','Não foi possível atualizar os dados');
                    }
                    redirect($this->router->fetch_class());
                } else {
                    $data = array(
                        'title' => 'Editar Usuários',
                        'pageTitle' => 'Edição de usuários',
                        'icon_title' => 'ik ik-user',
                        'user' => $this->ion_auth->user($user_id)->row(), // Busca dados de usuário
                        'groups' => $this->ion_auth->groups()->result(),
                        'user_groups'=>$usergroups,
                        'styles' => array(
                            'plugins/select2/dist/css/select2.min.css',
                        ),
                        'scripts' => array(
                            'plugins/select2/dist/js/select2.min.js',
                            'js/forms.js'
                        )
                    );
                    
                }
                
                $this->load->view('layout/header',$data);
                $this->load->view('usuarios/core');
                $this->load->view('layout/footer');

            }
        }
    }
    
    public function username_check($username) {
        $userid = $this->input->post('usuario_id');
        if($this->core_model->getbyid('users',array('username'=> $username, 'id!='=>$userid))) {
            $this->form_validation->set_message('username_check','Usuário já existe');
            return false;
        } else {
            return true;
        }
    }
    
    public function email_check($email) {
        $userid = $this->input->post('usuario_id');
        if($this->core_model->getbyid('users',array('email'=> $email, 'id!='=>$userid))) {
            $this->form_validation->set_message('email_check','Email já está sendo utilizado');
            return false;
        } else {
            return true;
        }
    }
    
    public function update_user_group() {
        $userid = $this->input->post('usuario_id');
        $group_user=$this->ion_auth->get_users_groups($userid)->result();
        $usergeoupform = $this->input->post('usergroup');
        $userid = $this->input->post('usuario_id');
        foreach ($group_user as $g) {
            if(array_search($g->id,$usergeoupform)===false){
                $this->ion_auth->remove_from_group($g->id, $userid);
            }
        }
        foreach ($usergeoupform as $g) {
            if ($this->ion_auth->in_group($g,$userid)===false) {
                $this->ion_auth->add_to_group($g, $userid);
            }
        }
    }
    
    public function active_user($user_id) {
        $user=$this->ion_auth->user($user_id)->row();
        if ($user->active) {
            $data=array('active'=>0);
        } else {
            $data=array('active'=>1);
        }if($this->ion_auth->update($user->id,$data)) {
            $this->session->set_flashdata('sucesso','Dados atualizado com sucesso');
        } else {
            $this->session->set_flashdata('error','Não foi possível atualizar os dados');
        }
        redirect($this->router->fetch_class());
        
    }
} 