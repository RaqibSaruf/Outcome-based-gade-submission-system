<?php 

include "include_script.php";

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



<script type="text/javascript" src="script/final_script.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<button type="button" class="btn_class" onclick="javascript:history.back()">Back</button> 


<input type="button" name="btnprint" value="Print" onclick="PrintMe('DivID')"/>


     






<?php

$total_marks=0;


$sql="select 
	    id,exam_in_taken,(co1+co2+co3+co4)/exam_in_taken as ratio
		from assessment";
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
	<link rel="stylesheet" type="text/css" href="style/final.css">
	<table class="table_style" cellspacing=0>
		<tr>
			<td class="td_class1">Student ID</td>
			<td class="td_class1">Student Name</td>
			<td class="td_class1">Grand Total (<?php echo $total_marks; ?>) </td>
			<td class="td_class1">Letter Grade</td>
			
			
		</tr>

<?php 




	
$sql="select * from student
		order by student_id
	";
$info=$db->get_sql_array($sql);
foreach ($info as $key => $value) {
			
			$student_name=$value['name'];
			$student_id=$value['student_id'];


		$grand_total=0;



$sql="select 
	    id,(co1+co2+co3+co4)/exam_in_taken as ratio
		from assessment";
	$ex_info=$db->get_sql_array($sql);
	foreach($ex_info as $key => $value){
		$a_id=$value['id'];
		$ratio=$value['ratio'];


	
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

			$total=(float)$co1+$co2+$co3+$co4;
			$obtained=$total*$ratio;
			$grand_total=$grand_total+$obtained;

}


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
			
			
		<tr>
			<td class="td_class2"><?php echo $student_id; ?></td>
			<td class="td_class2"><?php echo $student_name; ?></td>
			<td class="td_class2"><?php echo $grand_total; ?></td>
			<td class="td_class2"><?php echo $letter_grade; ?></td>
			
		</tr>





<?php


	}
	

?>

	
		


</table>

</div>