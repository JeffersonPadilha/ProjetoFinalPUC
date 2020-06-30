<div class="sidebar-background">
	<div class="primary-sidebar-background">
	</div>
</div>
<div class="primary-sidebar">
	<!-- Main nav -->
    <br />

	<ul class="nav nav-collapse collapse nav-collapse-primary">
    
        
        <!------dashboard----->
		<li class="<?php if($page_name == 'dashboard')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?atendente/dashboard" >
					<i class="icon-desktop icon-2x"></i>
					<span><?php echo get_phrase('dashboard');?></span>
				</a>
		</li>
        
        <!------Paciente----->
		<li class="<?php if($page_name == 'gerenciar_paciente')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?atendente/gerenciar_paciente" >
					<i class="icon-user icon-2x"></i>
					<span>Paciente</span>
				</a>
		</li>
        
      
		

		<!-------Agenda-------->
		<li class="<?php if($page_name == 'gerenciar_agenda')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?atendente/gerenciar_agenda" >
					<i class="icon-calendar icon-2x"></i>
					<span>Agendamento</span>
				</a>
		</li>

	</ul>
	
</div>