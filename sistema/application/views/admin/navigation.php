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
				<a href="<?php echo base_url();?>index.php?admin/dashboard" >
					<i class="icon-desktop icon-2x"></i>
					<span>Dashboard</span>
				</a>
		</li>
        
        <!------departmentos----->
		<li class="<?php if($page_name == 'gerenciar_departamento')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?admin/gerenciar_departamento" >
					<i class="icon-sitemap icon-2x"></i>
					<span>Departamento</span>
				</a>
		</li>
        
        <!------medico----->
		<li class="<?php if($page_name == 'gerenciar_medico')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?admin/gerenciar_medico" >
					<i class="icon-user-md icon-2x"></i>
					<span>Medico</span>
				</a>
		</li>
        
        <!------patiente----->
		<li class="<?php if($page_name == 'gerenciar_paciente')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?admin/gerenciar_paciente" >
					<i class="icon-user icon-2x"></i>
					<span>Paciente</span>
				</a>
		</li>
        
        <!------atendente----->
		<li class="<?php if($page_name == 'gerenciar_atendente')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?admin/gerenciar_atendente" >
					<i class="icon-phone icon-2x"></i>
					<span>Atendente</span>
				</a>
				
		</li>
		
		
		
		        
        <!------agendamento----->
		<li class="<?php if($page_name == 'view_report')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?admin/gerenciar_agenda" >
					<i class="icon-calendar icon-2x"></i>
					<span>Agendamento</span>
				</a>
		</li>
  
		
	</ul>
	
</div>