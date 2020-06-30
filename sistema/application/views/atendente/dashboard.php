<div class="container-fluid padded">
	<div class="row-fluid">
        <div class="span30">
            <!-- find me in partials/action_nav_normal -->
            <!--big normal buttons-->
            <div class="action-nav-normal">
                <div class="row-fluid">
                    <div class="span2 action-nav-button">
                        <a href="<?php echo base_url();?>index.php?atendente/gerenciar_paciente">
                        <i class="icon-user"></i>
                        <span>Paciente</span>
                        </a>
                    </div>

                    <div class="span2 action-nav-button">
                        <a href="<?php echo base_url();?>index.php?atendente/gerenciar_agenda">
                        <i class="icon-calendar"></i>
                        <span>Agendamento</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!---DASHBOARD MENU BAR ENDS HERE-->
    </div>
  
</div>


<hr />
    <div class="row-fluid">
    
    	<!-----CALENDAR SCHEDULE STARTS-->
        <div class="span12">
            <div class="box">
                <div class="box-header">
                    <div class="title">
                        <i class="icon-calendar"></i> Agenda
                    </div>
                </div>
                <div class="box-content">
                    <div id="schedule_calendar">
                    </div>
                </div>
            </div>
        </div>
    	<!-----CALENDAR SCHEDULE ENDS-->
  
</div>



<script>
  $(document).ready(function() {

    // page is now ready, initialize the calendar...
				

    $("#schedule_calendar").fullCalendar({
            
	validRange: {
         start: '<?php echo date("Y-m-d"); ?>'
     },
			header: {
                left: 	"prev,next,today",
                center: "title",
                right: 	"month,agendaWeek,agendaDay"
            },
        
            
			defaultDate: Date(),
			navLinks: true,
			editable: false,
			droppable: false,
			eventLimit: false,
            events: [
					
					<?php 

						$this->db->order_by('timestamp' , 'asc');
						$this->db->order_by('hora' , 'asc');
						$agendas	=	$this->db->get('agenda')->result_array();
						foreach($agendas as $row):
						
						$paciente = $this->crud_model->get_type_name_by_id('paciente',$row['paciente_id'],'nome');
						$dataInicioY = date("Y", strtotime($row['timestamp']));
						$dataInicioM = date("m", strtotime($row['timestamp']));
						$dataInicioD = date("d", strtotime($row['timestamp']));
						$hora = date("H", strtotime($row['hora']));
						$min = date("i", strtotime($row['hora']));

$fullData = $dataInicioY."-".$dataInicioM."-".$dataInicioD."T".$hora.":".$min.":00";	
	?>
						
					{
						title: "<?=$paciente?>",
						start:  '<?php echo $fullData; ?>',
						allDay: false				
            		},
					
					<?php endforeach;?>
					
					],
					  timeFormat: 'H(:mm)' // uppercase H for 24-hour clock

        })
		


});
  </script>