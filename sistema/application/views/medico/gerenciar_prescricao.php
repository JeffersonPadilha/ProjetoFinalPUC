<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
        	<?php if(isset($edit_profile)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					Editar prescriçao
                    	</a></li>
            <?php endif;?>
			<li class="<?php if(!isset($edit_profile))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					Lista de prescriçao
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					Adicionar
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
                    <?php echo form_open('medico/gerenciar_prescricao/edit/do_update/'.$row['prescricao_id'] , array('class' => 'form-horizontal validatable'));?>
                        <div class="padded">
                            
							
                            <div class="control-group">
                                <label class="control-label">Paciente</label>
                                <div class="controls">
                                    <select class="chzn-select" name="paciente_id">
										<?php 
										$this->db->order_by('data_cadastro' , 'asc');
										$pacientes	=	$this->db->get('paciente')->result_array();
										foreach($pacientes as $row2):
										?>
                                        	<option value="<?php echo $row2['paciente_id'];?>" <?php if($row2['paciente_id'] == $row['paciente_id'])echo 'selected';?>>
												<?php echo $row2['nome'];?>
                                            </option>
                                        <?php
										endforeach;
										?>
									</select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Historico</label>
                                <div class="controls">
                                    <div class="box closable-chat-box">
                                        <div class="box-content padded">
                                                <div class="chat-message-box">
                                                <textarea name="historico" id="ttt" rows="5" 
                                                	placeholder="Historico de caso do paciente"><?php echo $row['historico'];?></textarea>
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
                                                <textarea name="medicacao" id="ttt" rows="5" 
                                                	placeholder="Medicamentos prescritos"><?php echo $row['medicacao'];?></textarea>
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
                                                <textarea name="descricao" id="ttt" rows="5" 
                                                	placeholder="Descriçoes de solicitaçoes de exames e laboratorio"><?php echo $row['descricao'];?></textarea>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-blue">Editar</button>
                        </div>
                    <?php echo form_close();?>
        
                    <?php endforeach;?>
                </div>
			</div>
            <?php endif;?>
            <!----EDITING FORM ENDS--->
            
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box <?php if(!isset($edit_profile))echo 'active';?>" id="list">
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div>Paciente</div></th>
							<th><div>Data</div></th>
                    		<th><div>Opçoes</div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($prescricoes as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							
                           <td><?php echo $this->crud_model->get_type_name_by_id('paciente',$row['paciente_id'],'nome');?></td>
						   <td><?php echo date("d/m/Y H:i", strtotime($row['criacao_timestamp'])); ?></td>
							
							
							<td align="center">
                            	<a href="<?php echo base_url();?>index.php?medico/gerenciar_prescricao/edit/<?php echo $row['prescricao_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="Editar" class="btn btn-blue">
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?medico/gerenciar_prescricao/delete/<?php echo $row['prescricao_id'];?>" onclick="return confirm('delete?')"
                                	rel="tooltip" data-placement="top" data-original-title="Delete" class="btn btn-red">
                                		<i class="icon-trash"></i>
                                </a>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('medico/gerenciar_prescricao/create/' , array('class' => 'form-horizontal validatable'));?>
                        <div class="padded">
                           
						   
                            <div class="control-group">
                                <label class="control-label">Paciente</label>
                                <div class="controls">
                                    <select class="chzn-select" name="paciente_id">
										<?php 
										$this->db->order_by('data_cadastro' , 'asc');
										$pacientes	=	$this->db->get('paciente')->result_array();
										foreach($pacientes as $row):
										?>
                                        	<option value="<?php echo $row['paciente_id'];?>"><?php echo $row['nome'];?></option>
                                        <?php
										endforeach;
										?>
									</select>
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
                           
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-blue">Adicionar</button>
                        </div>
                    <?php echo form_close();?>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>

