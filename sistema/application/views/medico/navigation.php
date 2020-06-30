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
				<a href="<?php echo base_url();?>index.php?medico/dashboard" >
					<i class="icon-desktop icon-2x"></i>
					<span>Dashboard</span>
				</a>
		</li>
        
        <!------paciente----->
		<li class="<?php if($page_name == 'gerenciar_paciente')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?medico/gerenciar_paciente" >
					<i class="icon-user icon-2x"></i>
					<span>Paciente</span>
				</a>
		</li>
           
        <!------prescriçao----->
		<li class="<?php if($page_name == 'gerenciar_prescricao')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?medico/gerenciar_prescricao" >
					<i class="icon-stethoscope icon-2x"></i>
					<span>Historico de Atendimento</span>
				</a>
		</li>
        
      
 

		
		<!------agendamento--->
		<li class="<?php if($page_name == 'gerenciar_agenda')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?medico/gerenciar_agenda" >
					<i class="icon-calendar icon-2x"></i>
					<span>Agendamento</span>
				</a>
		</li>

		
		
	</ul>
	
</div>