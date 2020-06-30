<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
        	<?php if(isset($edit_profile)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					Editar paciente
                    	</a></li>
            <?php endif;?>
			<li class="<?php if(!isset($edit_profile))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					Lista de pacientes
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
                    <?php echo form_open('admin/gerenciar_paciente/edit/do_update/'.$row['paciente_id'] , array('class' => 'form-horizontal validatable'));?>
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
                                <label class="control-label">Sexo</label>
                                <div class="controls">
                                    <select name="sexo" class="uniform" style="width:100%;">
                                    	<option value="male" <?php if($row['sexo']=='male')echo 'selected';?>>Masculino</option>
                                    	<option value="female" <?php if($row['sexo']=='female')echo 'selected';?>>Feminino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Data de Nascimento</label>
                                <div class="controls">
                                    <input type="date" name="data_nascimento" value="<?php echo $row['data_nascimento'];?>"/>
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
                            	<a href="<?php echo base_url();?>index.php?admin/gerenciar_paciente/edit/<?php echo $row['paciente_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="Editar" class="btn btn-blue">
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?admin/gerenciar_paciente/delete/<?php echo $row['paciente_id'];?>" onclick="return confirm('delete?')"
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
                    <?php echo form_open('admin/gerenciar_paciente/create/' , array('class' => 'form-horizontal validatable'));?>
                    <form method="post" action="<?php echo base_url();?>index.php?" class="form-horizontal validatable">
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label">Nome</label>
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
                                <label class="control-label">Sexo</label>
                                <div class="controls">
                                    <select name="sexo" class="uniform" style="width:100%;">
                                    	<option value="male">Masculino</option>
                                    	<option value="female">Feminino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Data de nascimento</label>
                                <div class="controls">
                                    <input type="date"   name="data_nascimento"/>
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
