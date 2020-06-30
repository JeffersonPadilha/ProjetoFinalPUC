<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<?php if(isset($edit_profile)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					Editar agenda
                    	</a></li>
            <?php endif;?>
			<li class="<?php if(!isset($edit_profile))echo 'active';?>">
            	<a href="#agenda" data-toggle="tab"><i class="icon-align-justify"></i> 
					Agenda
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
                    <?php echo form_open('admin/gerenciar_agenda/edit/do_update/'.$row['agenda_id'] , array('class' => 'form-horizontal validatable'));?>
                        <div class="padded">
                            
							
							<div class="control-group">
                                <label class="control-label">Descriçao</label>
                                <div class="controls">
                                    <input type="text" name="descricao" class="validate[required]" required value="<?php echo $row['descricao'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Data</label>
                                <div class="controls">
                                   
                                <input type="date" name="timestamp" class="validate[required]" required value="<?php echo $row['timestamp'];?>"/>
								
								</div>
                            </div>
							
							<div class="control-group">
                                <label class="control-label">Horario</label>
                                <div class="controls">
                                    
									<select class="chzn-select" name="hora">
										<?php 
										for ($h=8; $h <=18; $h++){
											
											if($h.":00" == $row['hora'] ){
												echo "<option  selected value=\"$h:00\" >$h:00</option>";
											}
											else {
												echo "<option value=\"$h:00\" >$h:00</option>";
											}
											
										} 
										?>
										
                                        
									</select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Medico</label>
                                <div class="controls">
                                    <select class="chzn-select" name="medico_id">
                                    		<option value="">Selecionar</option>
										<?php 
										$medicos	=	$this->db->get('medico')->result_array();
										foreach($medicos as $row2):
										?>
                                        	<option value="<?php echo $row2['medico_id'];?>" <?php if($row2['medico_id'] == $row['medico_id'])echo 'selected';?>>
												<?php echo $row2['nome'];?>
                                            </option>
                                        <?php
										endforeach;
										?>
									</select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Paciente</label>
                                <div class="controls">
                                    <select class="chzn-select" name="paciente_id">
                                    		<option value="">Selecionar</option>
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
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <select class="chzn-select" name="status">
                                    		<option value="">Selecionar</option>
										
                                        	<option value="Agendado" <?php if($row['status'] == "Agendado") { echo 'selected'; } ?>>Agendado</option>

											<option value="Atendido" <?php if($row['status'] == "Atendido") { echo 'selected'; } ?>>Atendido</option>
											
											<option value="Cancelou" <?php if($row['status'] == "Desistiu") { echo 'selected'; } ?>>Desistiu</option>
											
											<option value="Faltou" <?php if($row['status'] == "Faltou") { echo 'selected'; } ?>>Faltou</option>
											
									</select>
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
            <div class="tab-pane box <?php if(!isset($edit_profile))echo 'active';?>" id="agenda">
			
       
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>Data</div></th>
							<th><div>Hora</div></th>
                    		<th><div>Paciente</div></th>
							<th><div>Descricao</div></th>
                    		<th><div>Medico</div></th>
							<th><div>Status</div></th>
                    		<th><div>Opçoes</div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php 

						$this->db->order_by('timestamp' , 'asc');
						$agendas	=	$this->db->get('agenda')->result_array();
						foreach($agendas as $row):
						?>
						
						
						
                        <tr>
                            <td><?php echo date("d/m/Y", strtotime($row['timestamp'])); ?></td>
							<td><?php echo date("H:i", strtotime($row['hora'])); ?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('paciente',$row['paciente_id'],'nome');?></td>
							<td><?php echo $row['descricao'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('medico',$row['medico_id'],'nome');?></td>
							<td><?php echo $row['status'];?></td>
							<td align="center">
							
							<a href="<?php echo base_url();?>index.php?admin/gerenciar_agenda/edit/<?php echo $row['agenda_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="Editar" class="btn btn-blue">
                                		<i class="icon-wrench"></i>
                                </a>
							
                            	<a href="<?php echo base_url();?>index.php?admin/gerenciar_agenda/delete/<?php echo $row['agenda_id'];?>" onclick="return confirm('delete?')"
                                	rel="tooltip" data-placement="top" data-original-title="Delete" class="btn btn-red">
                                		<i class="icon-trash"></i>
                                </a>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----OTHER LISTING ENDS--->
			
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('admin/gerenciar_agenda/create/' , array('class' => 'form-horizontal validatable'));?>
                        <div class="padded">
                           
                            <div class="control-group">
                                <label class="control-label">Descriçao</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" required name="descricao"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Data</label>
                                <div class="controls">
                                    <input type="date" class="validate[required]" name="timestamp" required/>
                                </div>
                            </div>
							
							<div class="control-group">
                                <label class="control-label">Horario</label>
                                <div class="controls">
                                   <select class="chzn-select" name="hora">
										<?php 
										for ($h=8; $h <=18; $h++){
											
											echo "<option value=\"$h:00\" >$h:00</option>";
											
										} 
										?>
										
                                        
									</select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Medico</label>
                                <div class="controls">
                                    <select class="chzn-select" name="medico_id">
                                    		<option value="">Selecionar</option>
										<?php 
										$medicos	=	$this->db->get('medico')->result_array();
										foreach($medicos as $row2):
										?>
                                        	<option value="<?php echo $row2['medico_id'];?>" ><?php echo $row2['nome'];?></option>
                                        <?php
										endforeach;
										?>
									</select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('paciente');?></label>
                                <div class="controls">
                                    <select class="chzn-select" name="paciente_id">
                                    		<option value="">Selecionar</option>
										<?php 
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
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <select class="chzn-select" name="status">
                                    		<option value="">Selecionar</option>
                                        	<option value="Agendado">Agendado</option>
											<option value="Atendido">Atendido</option>	
											<option value="Desistiu">Desistiu</option>
											<option value="Faltou">Faltou</option>
									</select>
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