<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<?php if(isset($edit_profile)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					Editar agenda
                    	</a></li>
						
					<li>
						<a href="#list_anexos" data-toggle="tab"><i class="icon-wrench"></i> 
					Exames Anexados
                   </a></li>

            <?php endif;?>
			
			<?php if(isset($impressao_profile)):?>
			<li class="active">
            	<a href="#edit_impressao" data-toggle="tab"><i class="icon-print"></i> 
					Impressao
                    	</a></li>

            <?php endif;?>
			
			
			<li class="<?php if(!isset($edit_profile) && !isset($impressao_profile))echo 'active';?>">
            	<a href="#agenda" data-toggle="tab"><i class="icon-align-justify"></i> 
					Agenda
                    	</a></li>
			
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">            
       
	   
	   
	   
	   
	   
	   
	   	   
	   
	   <!----EDITING FORM STARTS---->
        	<?php if(isset($edit_profile)):?>
			<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
                	<?php foreach($edit_profile as $row):?>
                    <?php echo form_open('medico/gerenciar_agenda/edit/do_update/'.$row['agenda_id'] , array('class' => 'form-horizontal validatable'));?>
                        <div class="padded">
                            
				<div class="control-group">
                                <label class="control-label">Paciente</label>
                                <div class="controls">
                                    <h3>
										<?php 
										$this->db->where('paciente_id', $row['paciente_id']);
										$pacientes	=	$this->db->get('paciente')->result_array();
										foreach($pacientes as $row2):
										
										echo $row2['nome'];
                                         
										endforeach;
										?>
										</h3>
										
										
								<input type="hidden" value="<?php echo $row['paciente_id']; ?>"  name="paciente_id"/>
								<input type="hidden" value="<?php echo $row['agenda_id']; ?>"  name="agenda_id"/>
								
                                </div>
                            </div>
							
							
							
							<div class="control-group">
                                <label class="control-label">Descriçao</label>
                                <div class="controls">
                                    <?php echo $row['descricao'];?>
                                </div>
                            </div>
							
							
                            <div class="control-group">
                                <label class="control-label">Data</label>
                                <div class="controls">

								<?php echo date("d/m/Y", strtotime($row['timestamp'])); ?>
								
								</div>
                            </div>
							
							<div class="control-group">
                                <label class="control-label">Horario</label>
                                <div class="controls">
                                    <?php echo $row['hora'];?>
                                </div>
                            </div>
							
							
							
                            <div class="control-group">
                                <label class="control-label">Historico</label>
                                <div class="controls">
                                    <div class="box closable-chat-box">
                                        <div class="box-content padded">
                                                <div class="chat-message-box">
                                                <textarea name="historico" id="ttt" rows="5" placeholder="Historico de caso do paciente"></textarea>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Medicaçao / Receituario / Prescriçao</label>
                                <div class="controls">
                                    <div class="box closable-chat-box">
                                        <div class="box-content padded">
                                                <div class="chat-message-box">
                                                <textarea name="medicacao" id="ttt" rows="5" placeholder="Medicamentos prescritos"></textarea>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Solicitaçoes de exames / laboratorio</label>
                                <div class="controls">
                                    <div class="box closable-chat-box">
                                        <div class="box-content padded">
                                                <div class="chat-message-box">
                                                <textarea name="descricao" id="ttt" rows="5" placeholder="Descriçoes de solicitaçoes de exames e laboratorio"></textarea>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
								
							
							<div class="control-group">
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <select class="chzn-select" name="status">
										
											<option selected value="Atendido">Atendido</option>
											
											<option value="Cancelou">Desistiu</option>
											
											<option value="Faltou">Faltou</option>
											
									</select>
                                </div>
                            </div>
                
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-blue">Salvar</button>
                        </div>
											
                    <?php echo form_close();?>
                    <?php endforeach;?>
                </div>
			</div>
			
			
				<hr>

  <!----TABLE LISTING STARTS--->
            <div class="tab-pane box <?php if(!isset($edit_profile))echo 'active';?>" id="list_anexos">
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div>Descriçao do arquivo</div></th>
                    		<th><div>Enviado em</div></th>
							<th><div>Opçoes</div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php 	
						$this->db->where('paciente_id' , $row['paciente_id']);
						$anexos	=	$this->db->get('anexos')->result_array();
						foreach($anexos as $row5):?>
                        <tr>
                            <td><?php echo $row5['anexos_id'];?></td>
							<td><?php echo $row5['descricao'];?></td>
							<td><?php echo date("d/m/Y", strtotime($row5['data_envio'])); ?></td>
							<td align="center">
                            	<a target="_blank" href="<?php echo base_url();?>/upload/<?=$row5['patch'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="Visualizar" class="btn btn-blue">
                                		<i class="icon-eye-open"></i>
                                </a>
                            	
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
			
			
            <?php endif;?>
            <!----EDITING FORM ENDS--->
			
			
			
			
	
	   <!----IMPRESSAO FORM STARTS---->
        	<?php if(isset($impressao_profile)):?>
			<div class="tab-pane box active" id="edit_impressao" style="padding: 5px">
                <div class="box-content">
                	<?php foreach($impressao_profile as $row):?>
                    <?php echo form_open('medico/gerenciar_agenda/edit_impressao/'.$row['agenda_id'] , array('class' => 'form-horizontal validatable'));?>
                        <div class="padded">
                 
				 
				 
				            
							<div class="control-group">
                                <label class="control-label"><strong>Paciente</strong></label>
                                <div class="controls">
                                    <h1>
										<?php 
										$this->db->where('paciente_id', $row['paciente_id']);
										$pacientes	=	$this->db->get('paciente')->result_array();
										foreach($pacientes as $row2):
										
										echo $row2['nome'];
                                         
										endforeach;
										?>
										</h1>
										
								
                                </div>
                            </div>
											
							
							<div class="control-group">
                                <label class="control-label"><strong>Descriçao</strong></label>
                                <div class="controls">
                                    <?php echo $row['descricao'];?><br><br>
                                </div>
                            </div>
							
							
                            <div class="control-group">
                                <label class="control-label"><strong>Data</strong></label>
                                <div class="controls">

								<?php echo date("d/m/Y", strtotime($row['timestamp'])); ?><br><br>
								
								</div>
                            </div>
							
							<div class="control-group">
                                <label class="control-label"><strong>Horario</strong></label>
                                <div class="controls">
                                    <?php echo $row['hora'];?><br><br>
                                </div>
                            </div>
							
							
							<?php 
										$this->db->where('agenda_id', $row['agenda_id']);
										$prescricao	=	$this->db->get('prescricao')->result_array();
										foreach($prescricao as $row3):
			
							?>
							<hr>
							
                            <div class="control-group">
                                <label class="control-label"><strong>Historico</strong></label>
                                <div class="controls">
                                   <?php echo $row3['historico']; ?><br><br>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Medicaçao / Receituario / Prescriçao</strong></label>
                                <div class="controls">
                                    <?php echo $row3['medicacao']; ?><br><br>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label"><strong>Solicitaçoes de exames / laboratorio</strong></label>
                                <div class="controls">
                                     <?php echo $row3['descricao']; ?><br><br>
                                </div>
                            </div>
							
							
							<div class="control-group">
                                <label class="control-label"><strong>Medico</strong></label>
                                <div class="controls">
                                    
										<?php 
										$this->db->where('medico_id', $row['medico_id']);
										$medicos	=	$this->db->get('medico')->result_array();
										foreach($medicos as $row4):
										
										echo "<h3>";
										echo $row4['nome'];
										echo "</h3>";
										
										echo "<h6>";
										echo $row4['perfil'];
										echo "</h6>";
                                         
										endforeach;
										?>
										
										
								
                                </div>
                            </div>
								
				 <?php endforeach; ?>
				 
				
							
                        </div>
					
                   </div>
				   
				<div class="form-actions">
                            <button id="imprimir" class="btn btn-blue"><i class="icon-print"></i>
                            </a> imprimir</button>
                </div>
				
				   <?php endforeach;?>
               
			
			
         <script>
        document.getElementById('imprimir').onclick = function() {
            var conteudo = document.getElementById('edit_impressao').innerHTML,
                tela_impressao = window.open('about:top');

            tela_impressao.document.write(conteudo);
            tela_impressao.window.print();
			tela_impressao.window.close();
        
        };
        </script>

		<?php endif;?>
            <!----IMPRESSAO FORM ENDS--->
			
			
		
			
			
			
	   
	   
	    <!----TABLE LISTING STARTS--->
            <div class="tab-pane box <?php if(!isset($edit_profile) && !isset($impressao_profile))echo 'active';?>" id="agenda">
			
       
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>Data</div></th>
							<th><div>Hora</div></th>
                    		<th><div>Paciente</div></th>
							<th><div>Descricao</div></th>
							<th><div>Status</div></th>
                    		<th><div>Opçoes</div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php 

						$this->db->where('medico_id' , $this->session->userdata('medico_id'));
					
						$this->db->order_by('timestamp', 'ASC');
						$agendas	=	$this->db->get('agenda')->result_array();
						foreach($agendas as $row):
						
						if($row['timestamp'] >= date("Y-m-d")){
						
						?>
						
						
						
                        <tr>
                            <td><?php echo date("d/m/Y", strtotime($row['timestamp'])); ?></td>
							<td><?php echo date("H:i", strtotime($row['hora'])); ?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('paciente',$row['paciente_id'],'nome');?></td>
							<td><?php echo $row['descricao'];?></td>
							<td><?php echo $row['status'];?></td>
							<td align="center">
							
							<?php if($row['status'] == "Atendido" OR $row['status'] == "Desistiu" OR $row['status'] == "Faltou"){ 
							?>
							
							
							
							
							<?php if($row['status'] == "Atendido"){ ?>
							<a  href="<?php echo base_url();?>index.php?medico/gerenciar_agenda/edit_impressao/<?php echo $row['agenda_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="Imprimir" class="btn btn-blue">
                                		<i class="icon-print"></i>
                            </a>
							
							<?php } ?>
							
							
							<?php } else { ?>
							
							<a  href="<?php echo base_url();?>index.php?medico/gerenciar_agenda/edit/<?php echo $row['agenda_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="Atender" class="btn btn-green">
                                		<i class="icon-stethoscope"></i>
                            </a>
							<?php } ?>
						
        					</td>
                        </tr>
                        <?php } endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----OTHER LISTING ENDS--->
			
   
            
		</div>
	</div>
</div>