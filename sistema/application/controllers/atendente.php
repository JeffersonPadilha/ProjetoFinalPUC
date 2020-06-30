<?php
if (!defined('BASEPATH'))
	exit('Acesso nao permitido!');

/*	
 *	@author : Jefferson Padilha
 *	date	: 1 Janeiro, 2020
 *	Universitario de Tecnologia de Informacao
 *	São João de Meriti - RJ
 */

class Atendente extends CI_Controller
{
	
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		/*cache control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	}
	
	/***Função padrão, redireciona para a página de login, se nenhuma atendente ainda estiver conectada***/
	public function index()
	{
		if ($this->session->userdata('atendente_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		if ($this->session->userdata('atendente_login') == 1)
			redirect(base_url() . 'index.php?atendente/dashboard', 'refresh');
	}
	
	/***atendente DASHBOARD***/
	function dashboard()
	{
		if ($this->session->userdata('atendente_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		$page_data['page_name']  = 'dashboard';
		$page_data['page_title'] = get_phrase('atendente_dashboard');
		$this->load->view('index', $page_data);
	}
	
	
	/***Gerenciar pacientes**/
	function gerenciar_paciente($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('atendente_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
			$data['nome']       = $this->input->post('nome');
			$data['email']      = $this->input->post('email');
			$data['senha']      = $this->input->post('senha');
			$data['endereco']   = $this->input->post('endereco');
			$data['fone']       = $this->input->post('fone');
			$data['sexo']        = $this->input->post('sexo');
			$data['data_nascimento']  = $this->input->post('data_nascimento');
			$data['idade']            = $this->input->post('idade');
			$data['data_cadastro'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
			$this->db->insert('paciente', $data);
			
			
			$this->session->set_flashdata('flash_message', get_phrase('account_opened'));
			redirect(base_url() . 'index.php?atendente/gerenciar_paciente', 'refresh');
		}
		
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['nome']       = $this->input->post('nome');
			$data['email']      = $this->input->post('email');
			$data['senha']      = $this->input->post('senha');
			$data['endereco']   = $this->input->post('endereco');
			$data['fone']       = $this->input->post('fone');
			$data['sexo']        = $this->input->post('sexo');
			$data['data_nascimento']  = $this->input->post('data_nascimento');
			$data['idade']            = $this->input->post('idade');
			
			$this->db->where('paciente_id', $param3);
			$this->db->update('paciente', $data);
			
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));
			redirect(base_url() . 'index.php?atendente/gerenciar_paciente', 'refresh');
			
			
		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('paciente', array(
				'paciente_id' => $param2
			))->result_array();
		}
		
		if ($param1 == 'delete') {
			$this->db->where('paciente_id', $param2);
			$this->db->delete('paciente');
			$this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
			redirect(base_url() . 'index.php?atendente/gerenciar_paciente', 'refresh');
		}
		$page_data['page_name']  = 'gerenciar_paciente';
		$page_data['page_title'] = get_phrase('gerenciar_paciente');
		$page_data['pacientes']   = $this->db->get('paciente')->result_array();
		$this->load->view('index', $page_data);
	}
	

	
	/***CRIAR AGENDA**/
	function gerenciar_agenda($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('atendente_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		

		if ($param1 == 'create') {
			$data['descricao'] = $this->input->post('descricao');
			$data['timestamp']   = $this->input->post('timestamp');
			$data['hora']   = $this->input->post('hora');
			$data['medico_id']   = $this->input->post('medico_id');
			$data['paciente_id']  = $this->input->post('paciente_id');
			$data['status']  = $this->input->post('status');
			$this->db->insert('agenda', $data);
			$this->session->set_flashdata('flash_message', 'Agenda criada!');
			redirect(base_url() . 'index.php?atendente/gerenciar_agenda', 'refresh');
		}
		
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['descricao'] = $this->input->post('descricao');
			$data['timestamp']   = $this->input->post('timestamp');
			$data['hora']   = $this->input->post('hora');
			$data['medico_id']   = $this->input->post('medico_id');
			$data['paciente_id']  = $this->input->post('paciente_id');
			$data['status']  = $this->input->post('status');
			$this->db->where('agenda_id', $param3);
			$this->db->update('agenda', $data);
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));
			
			redirect(base_url() . 'index.php?atendente/gerenciar_agenda', 'refresh');
		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('agenda', array(
				'agenda_id' => $param2
			))->result_array();
		}
		
		
		if ($param1 == 'delete') {
			$this->db->where('agenda_id', $param2);
			$this->db->delete('agenda');
			$this->session->set_flashdata('flash_message', get_phrase('report_deleted'));
			redirect(base_url() . 'index.php?atendente/gerenciar_agenda', 'refresh');
		}
		$page_data['page_name']  = 'gerenciar_agenda';
		$page_data['page_title'] = get_phrase('gerenciar_agenda');
		$page_data['agendas']    = $this->db->get('agenda')->result_array();
		$this->load->view('index', $page_data);
	
	}
	
	
	
	
	

	
	/******GERIR PRÓPRIO PERFIL E ALTERAR SENHA***/
	function gerenciar_perfil($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('atendente_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'update_profile_info') {
			$data['nome']    = $this->input->post('nome');
			$data['email']   = $this->input->post('email');
			$data['endereco'] = $this->input->post('endereco');
			$data['fone']   = $this->input->post('fone');
			
			$this->db->where('atendente_id', $this->session->userdata('atendente_id'));
			$this->db->update('atendente', $data);
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));
			redirect(base_url() . 'index.php?atendente/gerenciar_perfil/', 'refresh');
		}
		if ($param1 == 'change_password') {
			$data['password']             = $this->input->post('password');
			$data['new_password']         = $this->input->post('new_password');
			$data['confirm_new_password'] = $this->input->post('confirm_new_password');
			
			$current_password = $this->db->get_where('atendente', array(
				'atendente_id' => $this->session->userdata('atendente_id')
			))->row()->senha;
			if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
				$this->db->where('atendente_id', $this->session->userdata('atendente_id'));
				$this->db->update('atendente', array(
					'senha' => $data['new_password']
				));
				$this->session->set_flashdata('flash_message', get_phrase('password_updated'));
			} else {
				$this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
			}
			redirect(base_url() . 'index.php?atendente/gerenciar_perfil/', 'refresh');
		}
		$page_data['page_name']    = 'gerenciar_perfil';
		$page_data['page_title']   = get_phrase('gerenciar_perfil');
		$page_data['edit_profile'] = $this->db->get_where('atendente', array(
			'atendente_id' => $this->session->userdata('atendente_id')
		))->result_array();
		$this->load->view('index', $page_data);
	}
	
}
