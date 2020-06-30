<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
        	<?php if(isset($edit_profile)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					Visualizar paciente
                    	</a></li>
						
					<li>
						<a href="#list_anexos" data-toggle="tab"><i class="icon-wrench"></i> 
					Exames Anexados
                    	</a></li>
						
            <?php endif;?>
			<li class="<?php if(!isset($edit_profile))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					Lista de pacientes
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
                    <?php echo form_open('medico/gerenciar_paciente/edit/do_update/'.$row['paciente_id'] , array('class' => 'form-horizontal validatable'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label">Nome</label>
                                <div class="controls">
                                    <?php echo $row['nome'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <?php echo $row['email'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Endereço</label>
                                <div class="controls">
                                    <?php echo $row['endereco'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Telefone</label>
                                <div class="controls">
                                  <?php echo $row['fone'];?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Sexo</label>
                                <div class="controls">
                                    <?php if($row['sexo']=='male'){ echo "Masculino"; } else { echo "Feminino"; } ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Data de Nascimento</label>
                                <div class="controls">
                                    <?php echo date("d/m/Y", strtotime($row['data_nascimento'])); ?>
                                </div>
                            </div>
                            
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
            
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box <?php if(!isset($edit_profile))echo 'active';?>" id="list">
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div>Nome do paciente</div></th>
                    		<th><div>Sexo</div></th>
                    		<th><div>DN</div></th>
                    		<th><div>Opçoes</div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($pacientes as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['nome'];?></td>
							<td><?php if($row['sexo'] == "male"){ echo "Masculino"; } else { echo "Feminino"; } ?></td>
							<td>
							
							<?php echo date("d/m/Y", strtotime($row['data_nascimento'])); ?>
							</td>
							<td align="center">
                            	<a href="<?php echo base_url();?>index.php?medico/gerenciar_paciente/edit/<?php echo $row['paciente_id'];?>"
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
            
          
            
		</div>
	</div>
</div>
