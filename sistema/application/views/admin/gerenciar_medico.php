<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
        	<?php if(isset($edit_profile)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
				Editar Medico
                    	</a></li>
            <?php endif;?>
			<li class="<?php if(!isset($edit_profile))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					Lista de medicos
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
                    <?php echo form_open('admin/gerenciar_medico/edit/do_update/'.$row['medico_id'] , array('class' => 'form-horizontal validatable'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label">Nome</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="nome" value="<?php echo $row['nome'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="email" value="<?php echo $row['email'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Senha</label>
                                <div class="controls">
                                    <input type="password" class="validate[required]" name="senha" value="<?php echo $row['senha'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Endereço</label>
                                <div class="controls">
                                    <input type="text" class="" name="endereco" value="<?php echo $row['endereco'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Telefone</label>
                                <div class="controls">
                                    <input type="text" class="" name="fone" value="<?php echo $row['fone'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Departamento</label>
                                <div class="controls">
                                    <select name="departamento_id" class="uniform" style="width:100%;">
                                    	<?php 
										$departments = $this->db->get('departamento')->result_array();
										foreach($departments as $row2):
										?>
                                    		<option value="<?php echo $row2['departamento_id'];?>"
                                            	<?php if($row['departamento_id'] == $row2['departamento_id'])echo 'selected';?>>
													<?php echo $row2['nome'];?>
                                                    	</option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Perfil</label>
                                <div class="controls">
                                    <input type="text" class="" name="perfil" value="<?php echo $row['perfil'];?>"/>
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
                    		<th><div>Nome do medico</div></th>
                    		<th><div>Email</div></th>
							<th><div>Endereço</div></th>
							<th><div>Fone</div></th>
                    		<th><div>Opçoes</div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($medicos as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['nome'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['endereco'];?></td>
							<td><?php echo $row['fone'];?></td>
						
							<td align="center">
                            	<a href="<?php echo base_url();?>index.php?admin/gerenciar_medico/edit/<?php echo $row['medico_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="Editar" class="btn btn-blue">
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?admin/gerenciar_medico/delete/<?php echo $row['medico_id'];?>" onclick="return confirm('delete?')"
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
                    <?php echo form_open('admin/gerenciar_medico/create/' , array('class' => 'form-horizontal validatable'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('nome');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="nome"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="email"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Senha</label>
                                <div class="controls">
                                    <input type="password" class="validate[required]" name="senha"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Endereço</label>
                                <div class="controls">
                                    <input type="text" class="" name="endereco"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Telefone</label>
                                <div class="controls">
                                    <input type="text" class="" name="fone"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Departamento</label>
                                <div class="controls">
                                    <select name="departamento_id" class="uniform" style="width:100%;">
                                    	<?php 
										$departments = $this->db->get('departamento')->result_array();
										foreach($departments as $row):
										?>
                                    		<option value="<?php echo $row['departamento_id'];?>"><?php echo $row['nome'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Perfil</label>
                                <div class="controls">
                                    <input type="text" class="" name="perfil"/>
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