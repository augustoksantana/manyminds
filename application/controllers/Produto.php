<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produto extends CI_Controller
{


	public function __construct(){
            parent::__construct();

            if (!$this->ion_auth->logged_in()) {
              redirect('login');                
            }
        }

	public function index()
	{
                $produto=$this->core_model->get_all('product');
                print_r($produto);
                $data = array(
                    'title' => 'Produtos',
                    'pageTitle' => 'Lista de produtos',
                    'pageSubTitle' => 'Grid de Manuteção',
                    'icon_title' => 'ik ik-codepen',
                    'product' => $this->core_model->get_all('product'), // get all pruduct 
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
		$this->load->view('produto/index',);
		$this->load->view('layout/footer',);
	}
        
        public function core($product_id = NULL){
        
            $user = $this->ion_auth->user()->row();
            if(!$product_id) {

                $this->form_validation->set_rules('name', 'Descrição do produto', 'trim|required|min_length[5]|max_length[50]');
                $this->form_validation->set_rules('price', 'Preço', 'trim|required');
                if ($this->form_validation->run()) {
                    $data = [
                            'name' => $this->input->post('name'),
                            'price' => (float) $this->input->post('price'),
                            'stock' => (int) $this->input->post('stock'),
                            'active' => 1,
                            'created_by' => $user->id,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    $data = html_escape($data);// Limpar o array
                    $data = $this->security->xss_clean($data);
                    if($this->core_model->insert('product',$data)) {
                        $this->session->set_flashdata('sucesso','Dados atualizado com sucesso');
                    } else {
                        $this->session->set_flashdata('error','Não foi possível atualizar os dados');
                    }
                    redirect($this->router->fetch_class());
                } else {
                    $data = array(
                        'title' => 'Cadastro de produtos',
                        'pageTitle' => 'Cadastro de usuários',
                        'icon_title' => 'ik ik-user',
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
                $this->load->view('produto/core');
                $this->load->view('layout/footer');

            } else {
                //Edita produto
                //verifica se produto e existe 
                if(!$this->core_model->getbyid('product',array('id='=>$product_id))) {
                   $this->session->set_flashdata('error','produto não existe');
                   redirect($this->router->fetch_class());
                } else {
                    $this->form_validation->set_rules('name', 'Descrição do produto', 'trim|required|min_length[5]|max_length[50]');
                    $this->form_validation->set_rules('price', 'Preço', 'trim|required');
                    if ($this->form_validation->run()) {
                        $data = [
                            'name' => $this->input->post('name'),
                            'price' => (float) $this->input->post('price'),
                            'stock' => (int) $this->input->post('stock'),
                            'active' => $this->input->post('active'),
                            'updated_at' => date('Y-m-d H:i:s')
                        ];
                        $data = html_escape($data);
                        $data = $this->security->xss_clean($data);
                        // Limpar o array
                        $this->core_model->update('product',array('id'=>$product_id),$data);
                        redirect($this->router->fetch_class());
                    } else {
                        $data = array(
                            'title' => 'Prodtudos',
                            'pageTitle' => 'Manutenção de Produtos',
                            'icon_title' => 'ik ik-user',
                            'product'=>$this->core_model->getbyid('product',array('id='=>$product_id)),
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
                    $this->load->view('produto/core');
                    $this->load->view('layout/footer');

                }
            }
        }
        
        public function activeProduct($product_id) {
            $product=$this->core_model->getbyid('product',array('id='=>$product_id));
            $this->core_model->active('product',array('id'=>$product_id),$product->active);
            redirect($this->router->fetch_class());
            
        }

	
}
