<!DOCTYPE>

<html>
    <head>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<?php include 'includes.php';?>
        <title><?php echo get_phrase('login');?></title>
    </head>
	<body>
		<?php if($this->session->flashdata('flash_message') != ""):?>
 		<script>
			$(document).ready(function() {
				Growl.info({title:"<?php echo $this->session->flashdata('flash_message');?>",text:" "})
			});
		</script>
        <?php endif;?>

        <div class="container">
            <div class="span4 offset4">
                <div class="padded">
                    <div class="login box" style="margin-top: 10px;">
                        <div class="box-header">
                            <span class="title"><?php echo get_phrase('login');?></span>
                        </div>
                        <div class="box-content padded">
                        <i class="m-icon-swapright m-icon-white"></i>
                        	<?php echo form_open('login' , array('class' => 'separate-sections'));?>
                                <div class="">
                                    
                                    <select class="validate[required]" name="login_type" style="width:100%;">
                                        <option value="">Selecione uma conta</option>
                                        <option value="admin">Administrador</option>
                                        <option value="medico">Medico</option>
                                        <option value="atendente">Atendente</option>
                                        
                                    </select>
    
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on" href="#">
                                    <i class="icon-envelope"></i>
                                    </span>
                                    <input name="email" type="text" placeholder="E.mail">
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on" href="#">
                                    <i class="icon-key"></i>
                                    </span>
                                    <input name="password" type="password" placeholder="Senha">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-blue btn-block" >
                                       Login
                                    </button>
                                </div>
                            <?php echo form_close();?>
                            <div>
                                <a  data-toggle="modal" href="#modal-simple">
                                    Esqueceu sua senha?
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php include 'application/views/footer.php';?>
                </div>
            </div>
        </div>
        
        
        <!-----------password reset form ------>
        <div id="modal-simple" class="modal hide fade">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h6 id="modal-tablesLabel">Resetar senha</h6>
          </div>
          <div class="modal-body">
            <?php echo form_open('login/reset_password');?>
            	<select class="validate[required]" name="account_type"  style="margin-bottom: 0px !important;">
                    <option value="">Selecione um conta</option>
                    <option value="admin">Administrador</option>
                    <option value="medico">Medico</option>
                    <option value="atendente">Atendente</option>
                </select>
                <input type="email" name="email"  placeholder="Email"  style="margin-bottom: 0px !important;"/>
                <input type="submit" value="Lembrar"  class="btn btn-blue btn-medium"/>
            <?php echo form_close();?>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Fechar</button>
          </div>
        </div>
        <!-----------password reset form ------>
        
        
	</body>
</html>