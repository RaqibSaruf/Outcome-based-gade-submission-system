<?php 

include "include_script.php";

$precision=2;


?>


<script language="javascript">
function PrintMe(divName){
   var printContents = document.getElementById(divName).innerHTML;
   w=1150;
   h=750;
   var left = (screen.width/2)-(w/2);
   var top = (screen.height/2)-(h/2);
   myWindow=window.open('', '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);;
   myWindow.document.write(printContents);
   myWindow.document.close();
   myWindow.focus();
   myWindow.print();
   myWindow.close();
 }
</script>




<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<button type="button" class="btn_class" onclick="javascript:history.back()">Back</button> 
<input type="button" name="btnprint" value="Print" onclick="PrintMe('DivID')"/>



<?php



$total_marks=0;


$sql="select 
	    id,name,exam_in_taken,(co1+co2+co3+co4)/exam_in_taken as ratio
		from assessment
		order by name";
	$ex_info=$db->get_sql_array($sql);
	foreach($ex_info as $key => $value){
		$a_id=$value['id'];
		$exam_in=$value['exam_in_taken'];
		$ratio=$value['ratio'];

		$obtained=$exam_in * $ratio ;

	$total_marks=$total_marks+$obtained;
}		
?>

<div id="DivID">
<link rel="stylesheet" type="text/css" href="style/tabular.css">

<table class="table_style" cellspacing=0>

		<caption>Course Achivement measurement Sheet</caption>


		<tr>
			<td class="td_class1" colspan="2" rowspan="2"></td>
			<td class="td_class1" colspan="4">CO Distribution</td>
			<td class="td_class1" colspan="8">Individual CO Achivement(Thershold value is 70%)</td>
			<td class="td_class1" rowspan="3">Letter Grade</td>

		</tr>


		<tr>
			
			<td class="td_class1">CO1</td>
			<td class="td_class1">CO2</td>
			<td class="td_class1">CO3</td>
			<td class="td_class1">CO4</td>
			<td class="td_class1">CO1</td>
			<td class="td_class1">CO2</td>
			<td class="td_class1">CO3</td>
			<td class="td_class1">CO4</td>
			<td class="td_class1">CO1</td>
			<td class="td_class1">CO2</td>
			<td class="td_class1">CO3</td>
			<td class="td_class1">CO4</td>
			


    	</tr>

<?php 

		$t1=0;
		$t2=0;$t3=0;$t4=0;

		$sql="select co1,co2,co3,co4
			from assessment";

			$info=$db->get_sql_array($sql);
			foreach($info as $key => $value){
				$t1=$t1+$value['co1'];
				$t2=$t2+$value['co2'];
				$t3=$t3+$value['co3'];
				$t4=$t4+$value['co4'];
			}



?>




		<tr>
			<td class="td_class1">Student ID</td>
			<td class="td_class1">Student Name</td>
			<td class="td_class1"><?php echo $t1; ?></td>
			<td class="td_class1"><?php echo $t2; ?></td>
			<td class="td_class1"><?php echo $t3; ?></td>
			<td class="td_class1"><?php echo $t4; ?></td>
			<td class="td_class1">100%</td>
			<td class="td_class1">100%</td>
			<td class="td_class1">100%</td>
			<td class="td_class1">100%</td>
			<td class="td_class1" colspan="4">If CO achived(>=70%)then 1,else 0</td>

		</tr>


<?php 




	
$sql="select * from student
		order by student_id
	";
$info=$db->get_sql_array($sql);
foreach ($info as $key => $value) {
			
			$student_name=$value['name'];
			$student_id=$value['student_id'];


		$t_a_co1=0;
		$t_a_co2=0;
		$t_a_co3=0;
		$t_a_co4=0;
		$total_co1=0;
		$total_co2=0;
		$total_co3=0;
		$total_co4=0;
		$grand_total=0;

?>

		<tr>
			<td class="td_class2"><?php echo $student_id; ?></td>
			<td class="td_class2"><?php echo $student_name; ?></td>

<?php

$sql="select 
	    id,(co1+co2+co3+co4)/exam_in_taken as ratio,co1,co2,co3,co4
		from assessment
		order by name";
	$ex_info=$db->get_sql_array($sql);
	foreach($ex_info as $key => $value){
		$a_id=$value['id'];
		$ratio=$value['ratio'];
		$a_co1=$value['co1'];
		$a_co2=$value['co2'];
		$a_co3=$value['co3'];
		$a_co4=$value['co4'];


		$t_a_co1=$t_a_co1+$a_co1;
		$t_a_co2=$t_a_co2+$a_co2;
		$t_a_co3=$t_a_co3+$a_co3;
		$t_a_co4=$t_a_co4+$a_co4;




	
	$sql="select * from result where student_id='$student_id' and a_id=$a_id";
	$info1=$db->get_sql_array($sql);

	$co1=0;
	$co2=0;
	$co3=0;
	$co4=0;
	

		foreach($info1 as $key => $value){
			$co1=$value['co1'];
			$co2=$value['co2'];
			$co3=$value['co3'];
			$co4=$value['co4'];


			}



?>
		
		

		
<?php	
			$total=(float)$co1+$co2+$co3+$co4;
			$obtained=$total*$ratio;
			$total_co1=$total_co1+($co1*$ratio);
			$total_co2=$total_co2+($co2*$ratio);
			$total_co3=$total_co3+($co3*$ratio);
			$total_co4=$total_co4+($co4*$ratio);

			$grand_total=$grand_total+$obtained;


			$letter_grade="-";
		if($grand_total>=($total_marks * 0.97))$letter_grade="A+";
		else if($grand_total>=($total_marks * 0.9) && $grand_total<($total_marks * 0.97))$letter_grade="A";
		else if($grand_total>=($total_marks * 0.87) && $grand_total<($total_marks * 0.9))$letter_grade="A-";
		else if($grand_total>=($total_marks * 0.83) && $grand_total<($total_marks * 0.87))$letter_grade="B+";
		else if($grand_total>=($total_marks * 0.8) && $grand_total<($total_marks * 0.83))$letter_grade="B";
		else if($grand_total>=($total_marks * 0.77) && $grand_total<($total_marks * 0.8))$letter_grade="B-";
		else if($grand_total>=($total_marks * 0.73) && $grand_total<($total_marks * 0.77))$letter_grade="C+";
		else if($grand_total>=($total_marks * 0.7) && $grand_total<($total_marks * 0.73))$letter_grade="C";
		else if($grand_total>=($total_marks * 0.67) && $grand_total<($total_marks * 0.7))$letter_grade="C-";
		else if($grand_total>=($total_marks * 0.63) && $grand_total<($total_marks * 0.67))$letter_grade="D+";
		else if($grand_total>=($total_marks * 0.6) && $grand_total<($total_marks * 0.63))$letter_grade="D";
		else if($grand_total < $total_marks * 0.6)$letter_grade="F";
		else $letter_grade="I";

			

?>

		
		



<?php

}


		$achived_co1=($total_co1 /$t_a_co1)*100;
		$achived_co2=($total_co2 /$t_a_co2)*100;
		$achived_co3=($total_co3 /$t_a_co3)*100;
		$achived_co4=($total_co4 /$t_a_co4)*100;


?>
			<td class="td_class2"><?php echo $total_co1; ?></td>
			<td class="td_class2"><?php echo $total_co2; ?></td>
			<td class="td_class2"><?php echo $total_co3; ?></td>
			<td class="td_class2"><?php echo $total_co4; ?></td>

			<td class="td_class2"><?php echo substr(number_format($achived_co1, $precision+1, '.', ''), 0, -1); ?></td>
			<td class="td_class2"><?php echo substr(number_format($achived_co2, $precision+1, '.', ''), 0, -1); ?></td>
			<td class="td_class2"><?php echo substr(number_format($achived_co3, $precision+1, '.', ''), 0, -1); ?></td>
			<td class="td_class2"><?php echo substr(number_format($achived_co4, $precision+1, '.', ''), 0, -1); ?></td>
			


<?php 

	$mark1=0;
	$mark2=0;
	$mark3=0;
	$mark4=0;
	
	if($achived_co1 >= 70)$mark1=1;
	else $mark1=0;
	if($achived_co2 >= 70)$mark2=1;
	else $mark2=0;
	if($achived_co3 >= 70)$mark3=1;
	else $mark3=0;
	if($achived_co4 >= 70)$mark4=1;
	else $mark4=0;




?>

			<td class="td_class2"><?php echo $mark1; ?></td>
			<td class="td_class2"><?php echo $mark2; ?></td>
			<td class="td_class2"><?php echo $mark3; ?></td>
			<td class="td_class2"><?php echo $mark4; ?></td>
			<td class="td_class2"><?php echo $letter_grade; ?></td>
		
			
			
		</tr>





		

<?php 
}

?>





	</table>
</div>