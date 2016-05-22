<?php

	class Kmap{
		var $array_input; // tipe array
		var $jReturn; // return dari cekJK
		var $kReturn; // return dari cekJK
		var $array_output; // output

		function __construnct($array_input){
			$this->input = $array_input;
			$this->jml = count($this->input);			

		}

		function cekJK($presentState, $nextState){			
			if(($presentState == 0) && ($nextState == 0)){
				$jReturn = 0;
				$kReturn = 'x';
			}
			elseif(($presentState == 0) && ($nextState == 1)){
				$jReturn = 1;
				$kReturn = 'x';
			}
			elseif(($presentState == 1) && ($nextState == 0)){
				$jReturn = 'x';
				$kReturn = 1;
			}			
			elseif(($presentState == 1) && ($nextState == 1)){
				$jReturn = 'x';
				$kReturn = 0;
			}

			return array($jReturn, $kReturn);

		}

		function setJK(){		
			$array_output = array(0=>array(3,4),1);
			$start = 0;
			while($start < $this->jml){
				if($start+1 == $this->jml){
					$array_output[$this->jml-1] = cekJK($this->input[$this->jml-1], $this->input[0]);
										
				}
				else {
					$array_output[$start]= cekJK($this->input[$start], $this->input[$start+1]);					
					$start++;
				}
			}
			return $array_output;
		}

		function printOut(){	
			$arrayPrint = $this->setJK();		
			for($i=0; $i<count($arrayPrint); $i++){
				echo "J= ".$arrayPrint[$i][0]." | K= ".$arrayPrint[$i][1]."<br>";
			}

		}

	}

?>