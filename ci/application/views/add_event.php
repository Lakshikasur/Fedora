<!--
<form action= "<?php echo base_url()?>index.php/login/add_event" method ="post">
-->
<?php echo validation_errors(); ?>
<?php echo form_open("login/add_event"); ?>

<table>
	<tr>
		<td>
			<label>Event Name</label>
		</td>
		<td>
			<input type="text" name="event_name" id= "event_name" value="<?php echo $this->input->post("event_name");?>" >
		</td>
	</tr>
	<tr>
		<td>
			<label>Event Description</label>
		</td>
		<td>
			<textarea cols="40" rows="10" name="event_des"></textarea>
		</td>
	</tr>
	<tr>
		<td>
			<label>Event Date</label>
		</td>
		<td>
			<input type ="text" name="event_date" value=""></textarea>
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
			<input type ="submit" value="Submit" name="btn_submit"></textarea>
		</td>
	</tr>

</table>

</form>



<script type="text/javascript">

$(document).ready(function() {
	$("#event_name").keyup(function(){
		if($("#event_name").val().length >= 4) {
			$.ajax({
				type:"POST",
				url: "<?php echo base_url();?>index.php/login/check_event",
				data:"event_name="+$("#event_name").val(),
				success:function(msg) {
					if( msg == "11") {
						alert("777");
					}	else {
						alert(msg);
					}					
				}
			})
			/*$.ajax({
	            type: "POST",
	            url: "<?php echo base_url();?>index.php/user/check_user",
	            data: "name="+$("#user_name").val(),
	            success: function(msg){
	            	*/
                /*
                if(msg=="true") {
                    $("#usr_verify").css({ "background-image": "url('<?php echo base_url();?>images/yes.png')" });
                } else {
                    $("#usr_verify").css({ "background-image": "url('<?php echo base_url();?>images/no.png')" });
                }
                
            }
        });
	*/
		}
	});
});


/*
$(document).ready(function(){
	$("#event_name1").keyup(function(){
		
        if($("#event_name1").val().length >= 4)
        {
        
		$.ajax({
            type: "POST",
            url: "<?php echo base_url();?>index.php/user/check_user",
            data: "name="+$("#user_name").val(),
            success: function(msg){
                if(msg=="true")
                {
                    $("#usr_verify").css({ "background-image": "url('<?php echo base_url();?>images/yes.png')" });
                }
                else
			    {
                    $("#usr_verify").css({ "background-image": "url('<?php echo base_url();?>images/no.png')" });
                }
            }
        });
		 
		}
        else 
		{
            $("#usr_verify").css({ "background-image": "none" });
        }
    });	
   
});
*/
</script>


<?php
/*
	$data = array(
              'name'        => 'username',
              'id'          => 'username',
              'value'       => 'johndoe',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );

	echo form_input($data);
	echo form_textarea($data);
	*/
?>

