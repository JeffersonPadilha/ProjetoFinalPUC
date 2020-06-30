<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
        	<?php if(isset($edit_profile)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					Departamentos
                    	</a></li>
            <?php endif;?>
			<li class="<?php if(!isset($edit_profile))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					Lista de departamentos
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
                    <?php echo form_open('admin/gerenciar_departamento/edit/do_update/'.$row['departamento_id'] , array('class' => 'form-horizontal validatable'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label">Nome do departamento</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="nome" value="<?php echo $row['nome'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Descriçao</label>
                                <div class="controls">
                                    <input type="text" class="" name="descricao" value="<?php echo $row['descricao'];?>"/>
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
                    		<th><div>Nome do departamento</div></th>
                    		<th><div>Descriçao</div></th>
                    		<th><div>Opçoes</div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($departamentos as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['nome'];?></td>
							<td><?php echo $row['descricao'];?></td>
							<td align="center">
                            	<a href="<?php echo base_url();?>index.php?admin/gerenciar_departamento/edit/<?php echo $row['departamento_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('edit');?>" class="btn btn-blue">
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?admin/gerenciar_departamento/delete/<?php echo $row['departamento_id'];?>" onclick="return confirm('delete?')"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('delete');?>" class="btn btn-red">
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
                	<?php echo form_open('admin/gerenciar_departamento/create' , array('class' =>'form-horizontal validatable'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label">Nome do departamento</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="nome"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Descriçao</label>
                                <div class="controls">
                                    <input type="text" class="" name="descricao"/>
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