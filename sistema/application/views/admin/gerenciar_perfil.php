<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">

			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					Atualizar Perfil
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
        	<!----EDITING FORM STARTS---->
			<div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content padded">
					<?php 
                    foreach($edit_profile as $row):
                        ?>
                        <?php echo form_open('admin/gerenciar_perfil/update_profile_info/' , array('class' => 'form-horizontal validatable'));?>
                                <div class="control-group">
                                    <label class="control-label">Nome</label>
                                    <div class="controls">
                                        <input type="text" class="" name="nome" value="<?php echo $row['nome'];?>"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input type="text" class="" name="email" value="<?php echo $row['email'];?>"/>
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
                                <div class="form-actions">
                            		<button type="submit" class="btn btn-blue">Atualizar</button>
                        		</div>
                        <?php echo form_close();?>
						<?php
                    endforeach;
                    ?>
                </div>
			</div>
            <!----EDITING FORM ENDS--->
            
		</div>
	</div>
</div>


<!--password-->
<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">

			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-lock"></i> 
					Atualizar senha
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
        	<!----EDITING FORM STARTS---->
			<div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content padded">
					<?php 
                    foreach($edit_profile as $row):
                        ?>
                        <?php echo form_open('admin/gerenciar_perfil/change_password/' , array('class' => 'form-horizontal validatable'));?>
                                <div class="control-group">
                                    <label class="control-label">Senha antiga</label>
                                    <div class="controls">
                                        <input type="password" class="" name="password" value=""/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nova senha</label>
                                    <div class="controls">
                                        <input type="password" class="" name="new_password" value=""/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Repita nova senha</label>
                                    <div class="controls">
                                        <input type="password" class="" name="confirm_new_password" value=""/>
                                    </div>
                                </div>
                                <div class="form-actions">
                            		<button type="submit" class="btn btn-blue">Atualizar</button>
                        		</div>
                        <?php echo form_close();?>
						<?php
                    endforeach;
                    ?>
                </div>
			</div>
            <!----EDITING FORM ENDS--->
            
		</div>
	</div>
</div>