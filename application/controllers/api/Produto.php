<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Core_model', 'core_modal');
	}

	public function index()
	{
		$output = [];
		$dados = $this->core_modal->get_all('product');
		foreach($dados as $dado) {
			$data = [
                            'name' =>$dado->name,
                            'price' => (float)$dado->price,
                            'stock' => (int) $dado->stock,
                            'active' => $dado->active
                    ];
			$output[]=$dado;
		}
		$this->response($output, 200, true, null);
	}

	public function response($data, $code=200, $status = true, $message = null)
	{
		$data = (object) [
			'status' => $status,
			'message' => $message,
			'data' => $data
		];

		$this->output
			->set_content_type('application/json')
			->set_status_header($code)
			->set_output(json_encode($data));
	}

}
