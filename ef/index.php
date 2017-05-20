<?php
include_once "pet.php";
include_once "pet_sound.php";

$petobj = new pet_sound();
$pet_list = $petobj->get_pet_list();

if( isset($_REQUEST['submit'])) {
	$selected_pet = $petobj->select_pet($_REQUEST["pet"]);
	$pet_sound = $petobj->make_voice();
	//echo $selected_pet." ".$pet_sound;
	$fileoutput = $petobj->write_to_file();
}

$file_content = $petobj->get_file_output();

?>



<!DOCTYPE html>
<html>
	<head>		
	</head>
	<body>
		<h4>Select Pet to get Sound</h4>
		<form action="index.php" method="POST">
			<select name="pet" method="post">
				<?php 
					foreach( $pet_list as $k=> $v) {
						echo '<option value="'.$k.'">'.$v.'</option>';
					}
				?>				
			</select>
			<br/>
			<input type="submit" name="submit" value="Submit">
		</form>
		<p>Pet List</p>
		<?php
		echo nl2br($file_content);
		?>
	</body>
</html>