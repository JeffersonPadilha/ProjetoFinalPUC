<?php
if (!defined('BASEPATH'))
	exit('Acesso nao permitido!');

/*	
 *	@author : Jefferson Padilha
 *	date	: 1 Janeiro, 2020
 *	Universitario de Tecnologia de Informacao
 *	São João de Meriti - RJ
 */

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		/*controle de cache*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	}
	
	/***Função padrão, redireciona para a página de login se nenhum administrador ainda estiver conectado***/
	public function index()
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		if ($this->session->userdata('admin_login') == 1)
			redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
	}
	
	/***ADMIN DASHBOARD***/
	function dashboard()
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		$page_data['page_name']  = 'dashboard';
		$page_data['page_title'] = get_phrase('admin_dashboard');
		$this->load->view('index', $page_data);
	}
	
	/***DEPARTAMENTOS DE MÉDICOS********/
	function gerenciar_departamento($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
			$data['nome']        = $this->input->post('nome');
			$data['descricao'] = $this->input->post('descricao');
			$this->db->insert('departamento', $data);
			$this->session->set_flashdata('flash_message', get_phrase('departamento_opened'));
			redirect(base_url() . 'index.php?admin/gerenciar_departamento', 'refresh');
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['nome']        = $this->input->post('nome');
			$data['descricao'] = $this->input->post('descricao');
			$this->db->where('departamento_id', $param3);
			$this->db->update('departamento', $data);
			$this->session->set_flashdata('flash_message', get_phrase('departamento_updated'));
			redirect(base_url() . 'index.php?admin/gerenciar_departamento', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('departamento', array(
				'departamento_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('departamento_id', $param2);
			$this->db->delete('departamento');
			$this->session->set_flashdata('flash_message', get_phrase('departamento_deleted'));
			redirect(base_url() . 'index.php?admin/gerenciar_departamento', 'refresh');
		}
		$page_data['page_name']   = 'gerenciar_departamento';
		$page_data['page_title']  = get_phrase('gerenciar_departamento');
		$page_data['departamentos'] = $this->db->get('departamento')->result_array();
		$this->load->view('index', $page_data);
		
	}
	/***Gerenciar medicos**/
	function gerenciar_medico($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
			$data['nome']          = $this->input->post('nome');
			$data['email']         = $this->input->post('email');
			$data['senha']      = $this->input->post('senha');
			$data['endereco']       = $this->input->post('endereco');
			$data['fone']         = $this->input->post('fone');
			$data['departamento_id'] = $this->input->post('departamento_id');
			$data['perfil']       = $this->input->post('perfil');
			$this->db->insert('medico', $data);
			$this->session->set_flashdata('flash_message', get_phrase('account_opened'));
			
			redirect(base_url() . 'index.php?admin/gerenciar_medico', 'refresh');
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['nome']           = $this->input->post('nome');
			$data['email']			= $this->input->post('email');
			$data['senha']      	= $this->input->post('senha');
			$data['endereco']       = $this->input->post('endereco');
			$data['fone']			= $this->input->post('fone');
			$data['departamento_id']= $this->input->post('departamento_id');
			$data['perfil']       	= $this->input->post('perfil');
			
			$this->db->where('medico_id', $param3);
			$this->db->update('medico', $data);
			
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));
			
			redirect(base_url() . 'index.php?admin/gerenciar_medico', 'refresh');
		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('medico', array(
				'medico_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('medico_id', $param2);
			$this->db->delete('medico');
			$this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
			
			redirect(base_url() . 'index.php?admin/gerenciar_medico', 'refresh');
		}
		$page_data['page_name']  = 'gerenciar_medico';
		$page_data['page_title'] = get_phrase('gerenciar_medico');
		$page_data['medicos']    = $this->db->get('medico')->result_array();
		$this->load->view('index', $page_data);
		
	}
	
	/***Gerenciar pacientes**/
	function gerenciar_paciente($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
			$data['nome']                   = $this->input->post('nome');
			$data['email']                  = $this->input->post('email');
			$data['senha']                  = $this->input->post('senha');
			$data['endereco']               = $this->input->post('endereco');
			$data['fone']                   = $this->input->post('fone');
			$data['sexo']                   = $this->input->post('sexo');
			$data['data_nascimento']        = $this->input->post('data_nascimento');
			$data['idade']                  = $this->input->post('idade');
			$data['data_cadastro'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
			$this->db->insert('paciente', $data);

			$this->session->set_flashdata('flash_message', get_phrase('account_opened'));
			
			redirect(base_url() . 'index.php?admin/gerenciar_paciente', 'refresh');
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['nome']                   = $this->input->post('nome');
			$data['email']                  = $this->input->post('email');
			$data['senha']                  = $this->input->post('senha');
			$data['endereco']               = $this->input->post('endereco');
			$data['fone']                   = $this->input->post('fone');
			$data['sexo']                   = $this->input->post('sexo');
			$data['data_nascimento']        = $this->input->post('data_nascimento');
			$data['idade']                  = $this->input->post('idade');
		
			$this->db->where('paciente_id', $param3);
			$this->db->update('paciente', $data);
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));
			
			redirect(base_url() . 'index.php?admin/gerenciar_paciente', 'refresh');
		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('paciente', array(
				'paciente_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('paciente_id', $param2);
			$this->db->delete('paciente');
			$this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
			
			redirect(base_url() . 'index.php?admin/gerenciar_paciente', 'refresh');
		}
		$page_data['page_name']  = 'gerenciar_paciente';
		$page_data['page_title'] = get_phrase('gerenciar_paciente');
		$page_data['pacientes']   = $this->db->get('paciente')->result_array();
		$this->load->view('index', $page_data);
	}
	
	
	/***Gerenciar atendente**/
	function gerenciar_atendente($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
			$data['nome']     = $this->input->post('nome');
			$data['email']    = $this->input->post('email');
			$data['senha'] = $this->input->post('senha');
			$data['endereco']  = $this->input->post('endereco');
			$data['fone']    = $this->input->post('fone');
			$this->db->insert('atendente', $data);
			
			$this->session->set_flashdata('flash_message', get_phrase('account_opened'));
			
			redirect(base_url() . 'index.php?admin/gerenciar_atendente', 'refresh');
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['nome']     = $this->input->post('nome');
			$data['email']    = $this->input->post('email');
			$data['senha'] = $this->input->post('senha');
			$data['endereco']  = $this->input->post('endereco');
			$data['fone']    = $this->input->post('fone');
			$this->db->where('atendente_id', $param3);
			$this->db->update('atendente', $data);
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));
			
			redirect(base_url() . 'index.php?admin/gerenciar_atendente', 'refresh');
		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('atendente', array(
				'atendente_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('atendente_id', $param2);
			$this->db->delete('atendente');
			$this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
			
			redirect(base_url() . 'index.php?admin/gerenciar_atendente', 'refresh');
		}
		$page_data['page_name']  = 'gerenciar_atendente';
		$page_data['page_title'] = get_phrase('gerenciar_atendente');
		$page_data['atendentes']     = $this->db->get('atendente')->result_array();
		$this->load->view('index', $page_data);
		
	}
	


	
	/***CRIAR AGENDA**/
	function gerenciar_agenda($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
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
			redirect(base_url() . 'index.php?admin/gerenciar_agenda', 'refresh');
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
			
			redirect(base_url() . 'index.php?admin/gerenciar_agenda', 'refresh');
		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('agenda', array(
				'agenda_id' => $param2
			))->result_array();
		}
		
		
		if ($param1 == 'delete') {
			$this->db->where('agenda_id', $param2);
			$this->db->delete('agenda');
			$this->session->set_flashdata('flash_message', get_phrase('report_deleted'));
			redirect(base_url() . 'index.php?admin/gerenciar_agenda', 'refresh');
		}
		$page_data['page_name']  = 'gerenciar_agenda';
		$page_data['page_title'] = get_phrase('gerenciar_agenda');
		$page_data['agendas']    = $this->db->get('agenda')->result_array();
		$this->load->view('index', $page_data);
	
	}
	
	
	
	/******GERIR PRÓPRIO PERFIL E ALTERAR SENHA***/
	function gerenciar_perfil($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'update_profile_info') {
			$data['nome']    = $this->input->post('nome');
			$data['email']   = $this->input->post('email');
			$data['endereco'] = $this->input->post('endereco');
			$data['fone']   = $this->input->post('fone');
			
			$this->db->where('admin_id', $this->session->userdata('admin_id'));
			$this->db->update('admin', $data);
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));
			
			redirect(base_url() . 'index.php?admin/gerenciar_perfil/', 'refresh');
		}
		if ($param1 == 'change_password') {
			$data['password']             = $this->input->post('password');
			$data['new_password']         = $this->input->post('new_password');
			$data['confirm_new_password'] = $this->input->post('confirm_new_password');
			
			$current_password = $this->db->get_where('admin', array(
				'admin_id' => $this->session->userdata('admin_id')
			))->row()->senha;
			if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
				$this->db->where('admin_id', $this->session->userdata('admin_id'));
				$this->db->update('admin', array(
					'senha' => $data['new_password']
				));
				$this->session->set_flashdata('flash_message', get_phrase('password_updated'));
			} else {
				$this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
			}
			
			redirect(base_url() . 'index.php?admin/gerenciar_perfil/', 'refresh');
		}
		$page_data['page_name']    = 'gerenciar_perfil';
		$page_data['page_title']   = get_phrase('gerenciar_perfil');
		$page_data['edit_profile'] = $this->db->get_where('admin', array(
			'admin_id' => $this->session->userdata('admin_id')
		))->result_array();
		$this->load->view('index', $page_data);
	}
	
}
