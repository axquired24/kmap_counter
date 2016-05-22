<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Array SisDig</title>
	<link rel="stylesheet" href="../bs3_dist/css/bootstrap.min.css" />
	<style>
		body{
			padding-top: 60px;
			padding-bottom: 60px;
						
		}
		thead>th{
			text-align: center;
		}
		tbody>tr>td{
			text-align: center;
		}

		strong {
			color: blue;
		}
	</style>
</head>
<body>

	<div class="container">
		<?php
			// include("baseClass.php");
			// $A = array(0,0,0,0,1,1);

			// $jkA = new Kmap($A);
			// $exe = $jkA->setJK();

			// echo "Maka hasil A :<br>";
			// printOut($exe);	

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

			function setJK($array_input){

				$jml = count($array_input);
				$array_output = array(0,1);
				$start = 0;
				while($start < $jml){
					if($start+1 == $jml){
						$array_output[$jml-1] = cekJK($array_input[$jml-1], $array_input[0]);
						break;
					}
					else {
						$array_output[$start]= cekJK($array_input[$start], $array_input[$start+1]);					
						$start++;
					}
				}
				return $array_output;
				}

			function printOut($arrayPrint, $var, $digit){			
				for($i=0; $i<count($arrayPrint); $i++){
					echo $digit[$i]." | J(".$var.") = <strong>".$arrayPrint[$i][0]."</strong> | K(".$var.") = <strong>".$arrayPrint[$i][1]."</strong><br>";			
				}

			}

			function tablePrint($in, $var, $digit){
				for($i=0; $i<count($in); $i++){
				echo"
					<tr>
						<td>".$digit[$i]."</td>
						<td><strong>".$in[$i][0]."</strong></td>
						<td>".$in[$i][1]."</td>
					</tr>
				";
				}
			}

			//Cara Pake: Tinggal ganti digit2 ini sesuai tabel

			$A = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1);		
			$B = array(0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,0,0,0);
			$C = array(0,0,0,0,0,0,0,1,0,0,0,0,0,0,1,1,0,0,0);
			$D = array(0,0,0,0,1,1,1,0,0,0,0,1,1,1,0,0,0,0,0);
			$E = array(0,0,1,1,0,1,1,0,0,0,1,0,0,1,0,0,0,1,1);
			$F = array(0,1,0,1,1,0,1,1,0,1,1,0,1,1,0,1,1,0,1);
			// $A = array(0,0,0,0,1,1);
			// $B = array(0,0,0,1,0,0);
			// $C = array(0,0,1,0,0,0);
			// $D = array(0,1,0,1,0,0);
			// $E = array(0,0,0,0,0,1);
			// $F = array(0,1,1,1,0,1);

			$input = array($A,$B,$C,$D,$E,$F);
			$var = array("A", "B", "C", "D", "E", "F");
			// $digit = array(0,5,10,15,20,23);
			$digit = array(0,1,2,3,5,6,7,9,10,11,13,14,15,17,18,19,21,22,23);

			//Udah sampe sini aja, yang bawah ngga usah di edit


			// For JK 1
			for($i=0; $i<count($input); $i++){	
		?>

		<div class="row">
			<div class="col-md-2">
				<?php							

						echo "<h2>".$var[$i]."</h2>";
						$ex = setJK($input[$i]);
						echo"
							<table class='table table-striped table-bordered'>
								<thead>
									<th>Digit</th>
									<th>J(".$var[$i].")</th>
									<th>K(".$var[$i].")</th>
								</thead>
								<tbody>
						";
								tablePrint($ex, $var[$i], $digit);	
						echo"
								</tbody>
							</table>
						";					
				?>

			</div> <!-- col-md-2 -->
			<?php }; // END FOR JK 1 ?>

			<div class="col-md-9">	
			</div> <!-- col-md-9 -->			
		</div> <!-- row -->
		<hr>

		

		<!-- ................................batas table ................. -->

		<h2>Urutan Table pada digit desimal</h2>
		<table class="axtable table table-striped table-bordered table-responsive">
			<thead>
				<th><sub>ABC</sub> / <sup>DEF</sup></th>
				<th>000</th>
				<th>001</th>
				<th>011</th>
				<th>010</th>
				<th>110</th>
				<th>111</th>
				<th>101</th>
				<th>100</th>
			</thead>
			<tbody>
				<tr>
					<td>000</td>
					<td>0</td>
					<td>1</td>
					<td>3</td>
					<td>2</td>
					<td>4</td>
					<td>5</td>
					<td>7</td>
					<td>6</td>
				</tr>
				<tr>
					<td>001</td>
					<td>8</td>
					<td>9</td>
					<td>11</td>
					<td>10</td>
					<td>12</td>
					<td>13</td>
					<td>15</td>
					<td>14</td>
				</tr>
				<tr>
					<td>011</td>
					<td>16</td>
					<td>17</td>
					<td>19</td>
					<td>18</td>
					<td>20</td>
					<td>21</td>
					<td>23</td>
					<td>22</td>
				</tr>
				<tr>
					<td>010</td>
					<td>24</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
				</tr>
				<tr>
					<td>110</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
				</tr>
				<tr>
					<td>111</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
				</tr>
				<tr>
					<td>101</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
				</tr>
				<tr>
					<td>100</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
					<td>d</td>
				</tr>
			</tbody>
		</table>

	</div>		<!-- container -->

</body>
</html>