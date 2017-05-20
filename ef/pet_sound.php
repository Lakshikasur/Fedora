<?php 

class pet_sound extends pet {

	var $pet = '';
	var $pet_sound = '';
	var $file_name = "pet_list.txt";


	public function get_pet_list() {
		$pet_list = array( "cat" => "Cat", "dog" => "Dog","cow" => "Cow","lion" => "Lion");
		return $pet_list;
	}


	public function select_pet($pet) {
		$this->pet = $pet;
		return $this->pet;
	}



	public function make_voice() {
		switch($this->pet) {
			case 'cat':
				$this->pet_sound = "Kwaw";
			break;
			case 'dog':
				$this->pet_sound = "bow";
			break;
			case 'cow':
				$this->pet_sound = "umbaa";
			break;
			case 'lion':
				$this->pet_sound = "Grrr";
			break;
			default:
				$this->pet_sound = "No pet selected";
			break;
		}
		return $this->pet_sound;
	}

	

	public function write_to_file() {
		$output		= $this->pet." - ".$this->pet_sound;
		//$myfile 	= fopen( $this->file_name, "rw") or die("Unable to open file!");
		$current 	= file_get_contents( $this->file_name);
		$current 	.= $output."\n";
		file_put_contents($this->file_name, $current);

		return $current;
	}


	public function get_file_output() {
		$current 	= file_get_contents( $this->file_name);
		return $current."\n";
	}
	
}

?>