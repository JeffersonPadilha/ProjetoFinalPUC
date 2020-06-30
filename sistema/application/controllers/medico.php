<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/*	
 *	@author : Jefferson Padilha
 *	date	: 1 Janeiro, 2020
 *	Universitario de Tecnologia de Informacao
 *	São João de Meriti - RJ
 */

class Medico extends CI_Controller
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
		if ($this->session->userdata('medico_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		if ($this->session->userdata('medico_login') == 1)
			redirect(base_url() . 'index.php?medico/dashboard', 'refresh');
	}
	
	/***MEDICO DASHBOARD***/
	function dashboard()
	{
		if ($this->session->userdata('medico_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		$page_data['page_name']  = 'dashboard';
		$page_data['page_title'] = 'Medico Dashboard';
		$this->load->view('index', $page_data);
	}
	/***Gerenciar pacientes**/
	function gerenciar_paciente($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('medico_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
			$data['nome']                      = $this->input->post('nome');
			$data['email']                     = $this->input->post('email');
			$data['senha']                  = $this->input->post('senha');
			$data['endereco']                   = $this->input->post('endereco');
			$data['fone']                     = $this->input->post('fone');
			$data['sexo']                       = $this->input->post('sexo');
			$data['data_nascimento']                = $this->input->post('data_nascimento');
			$data['idade']                       = $this->input->post('idade');
			$data['data_cadastro'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
			$this->db->insert('paciente', $data);
			
			
			$this->session->set_flashdata('flash_message', 'Conta aberta');
			
			redirect(base_url() . 'index.php?medico/gerenciar_paciente', 'refresh');
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['nome']                      = $this->input->post('nome');
			$data['email']                     = $this->input->post('email');
			$data['senha']                  = $this->input->post('senha');
			$data['endereco']                   = $this->input->post('endereco');
			$data['fone']                     = $this->input->post('fone');
			$data['sexo']                       = $this->input->post('sexo');
			$data['data_nascimento']                = $this->input->post('data_nascimento');
			$data['idade']                       = $this->input->post('idade');
			
			$this->db->where('paciente_id', $param3);
			$this->db->update('paciente', $data);
			$this->session->set_flashdata('flash_message', 'Paciente atualizado');
			redirect(base_url() . 'index.php?medico/gerenciar_paciente', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('paciente', array(
				'paciente_id' => $param2
			))->result_array();
		}
		
		
		
		
		if ($param1 == 'delete') {
			$this->db->where('paciente_id', $param2);
			$this->db->delete('paciente');
			
			$this->session->set_flashdata('flash_message', 'Paciente apagado!');
			redirect(base_url() . 'index.php?medico/gerenciar_paciente', 'refresh');
		}
		$page_data['page_name']  = 'gerenciar_paciente';
		$page_data['page_title'] = 'Gerenciar paciente';
		$page_data['pacientes']   = $this->db->get('paciente')->result_array();
		$this->load->view('index', $page_data);
	}
	

	
	/***GERENCIAR PRESCRIÇOES******/
	function gerenciar_prescricao ($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('medico_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		
		if ($param1 == 'create') {
			$data['medico_id']                  = $this->session->userdata('medico_id');
			$data['paciente_id']                 = $this->input->post('paciente_id');
			$data['criacao_timestamp']         = date('Y-m-d H:i:s');
			$data['historico']               = $this->input->post('historico');
			$data['medicacao']                 = $this->input->post('medicacao');
			$data['descricao']                = $this->input->post('descricao');
			
			$this->db->insert('prescricao', $data);
			$this->session->set_flashdata('flash_message', 'Prescriçao criada com sucesso!');
			
			redirect(base_url() . 'index.php?medico/gerenciar_prescricao', 'refresh');
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['paciente_id']                 = $this->input->post('paciente_id');
			$data['historico']               = $this->input->post('historico');
			$data['medicacao']                 = $this->input->post('medicacao');
			$data['descricao']                = $this->input->post('descricao');
			
			$this->db->where('prescricao_id', $param3);
			$this->db->update('prescricao', $data);
			$this->session->set_flashdata('flash_message', 'Prescriçao atualizada');
			redirect(base_url() . 'index.php?medico/gerenciar_prescricao', 'refresh');
		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('prescricao', array(
				'prescricao_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('prescricao_id', $param2);
			$this->db->delete('prescricao');
			$this->session->set_flashdata('flash_message', 'Prescriçao apagada!');
			
			redirect(base_url() . 'index.php?medico/gerenciar_prescricao', 'refresh');
		}
		$page_data['page_name']     = 'gerenciar_prescricao';
		$page_data['page_title']    = "Gerenciar Prescriçao";
		
		$this->db->where('medico_id' , $this->session->userdata('medico_id'));
		$page_data['prescricoes'] = $this->db->get('prescricao')->result_array();
		$this->load->view('index', $page_data);
	}
	
	


/***CRIAR AGENDA**/
	function gerenciar_agenda($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('medico_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		


		
		if ($param1 == 'edit' && $param2 == 'do_update') {
			
			$data['status']  = $this->input->post('status');
			
			$this->db->where('agenda_id', $param3);
			$this->db->update('agenda', $data);
			
			$data['medico_id']                  = $this->session->userdata('medico_id');
			$data['paciente_id']                 = $this->input->post('paciente_id');
			$data['agenda_id']                 = $this->input->post('agenda_id');
			$data['criacao_timestamp']         = date('Y-m-d H:i:s');
			$data['historico']               = $this->input->post('historico');
			$data['medicacao']                 = $this->input->post('medicacao');
			$data['descricao']                = $this->input->post('descricao');
			$this->db->insert('prescricao', $data);
			
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));
			
			redirect(base_url() . 'index.php?medico/gerenciar_agenda', 'refresh');
		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('agenda', array(
				'agenda_id' => $param2
			))->result_array();
		}
		
		if ($param1 == 'edit_impressao') {
			$page_data['impressao_profile'] = $this->db->get_where('agenda', array(
				'agenda_id' => $param2
			))->result_array();
		}
		
		
		if ($param1 == 'delete') {
			$this->db->where('agenda_id', $param2);
			$this->db->delete('agenda');
			$this->session->set_flashdata('flash_message', get_phrase('report_deleted'));
			redirect(base_url() . 'index.php?medico/gerenciar_agenda', 'refresh');
		}
		$page_data['page_name']  = 'gerenciar_agenda';
		$page_data['page_title'] = get_phrase('gerenciar_agenda');
		$page_data['agendas']    = $this->db->get('agenda')->result_array();
		$this->load->view('index', $page_data);
	
	}
	
	
	
	
	/******GERENCIA SENHA DO PERFIL***/
	function gerenciar_perfil ($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('medico_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		if ($param1 == 'update_profile_info') {
			$data['nome']    = $this->input->post('nome');
			$data['email']   = $this->input->post('email');
			$data['endereco'] = $this->input->post('endereco');
			$data['fone']   = $this->input->post('fone');
			$data['perfil'] = $this->input->post('perfil');
			
			$this->db->where('medico_id', $this->session->userdata('medico_id'));
			$this->db->update('medico', $data);
			
			$this->session->set_flashdata('flash_message', 'Perfil atualizado com sucesso!');
			redirect(base_url() . 'index.php?medico/gerenciar_perfil/', 'refresh');
		}
		if ($param1 == 'change_password') {
			$data['password']             = $this->input->post('password');
			$data['new_password']         = $this->input->post('new_password');
			$data['confirm_new_password'] = $this->input->post('confirm_new_password');
			
			$current_password = $this->db->get_where('medico', array(
				'medico_id' => $this->session->userdata('medico_id')
			))->row()->senha;
			
			if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
				$this->db->where('medico_id', $this->session->userdata('medico_id'));
				$this->db->update('medico', array(
					'senha' => $data['new_password']
				));
				$this->session->set_flashdata('flash_message', 'Senha atualizada com sucesso!');
			} else {
				$this->session->set_flashdata('flash_message', 'Senha incompativel!');
			}
			redirect(base_url() . 'index.php?medico/gerenciar_perfil/', 'refresh');
		}
		$page_data['page_name']    = 'gerenciar_perfil';
		$page_data['page_title']   = 'Gerenciar perfil';
		$page_data['edit_profile'] = $this->db->get_where('medico', array(
			'medico_id' => $this->session->userdata('medico_id')
		))->result_array();
		$this->load->view('index', $page_data);
	}
}