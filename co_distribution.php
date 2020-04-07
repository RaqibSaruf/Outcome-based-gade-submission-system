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



<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<button type="button" class="btn_class" onclick="javascript:history.back()">Back</button> 

<input type="button" name="btnprint" value="Print" onclick="PrintMe('DivID')"/>


<div id="DivID">
<link rel="stylesheet" type="text/css" href="style/tabular.css">
<table class="table_style" cellspacing=0>

		<caption>Course Outcome measurement Sheet</caption>


		<tr>
			<td colspan="2" class="td_class1"></td>
<?php

$sql="select 
	    id,name
		from assessment
		order by name";
	$ex_info=$db->get_sql_array($sql);
	foreach($ex_info as $key => $value){
		$a_id=$value['id'];
		
		
?>
		<td class="td_class1" colspan="5"><?php echo $value['name']; ?> </td>
		

<?php  } ?>

			<td class="td_class1" ></td>

    	</tr>





		<tr>
			<td class="td_class1">Student ID</td>
			<td class="td_class1">Student Name</td>
<?php

$total_marks=0;


$sql="select 
	    id,name,exam_in_taken,(co1+co2+co3+co4)/exam_in_taken as ratio,co1,co2,co3,co4
		from assessment
		order by name";
	$ex_info=$db->get_sql_array($sql);
	foreach($ex_info as $key => $value){
		$a_id=$value['id'];
		$exam_in=$value['exam_in_taken'];
		$ratio=$value['ratio'];

		$obtained=$exam_in * $ratio ;

	$total_marks=$total_marks+$obtained;
		
?>
		<td class="td_class1">co1 (<?php echo $value['co1']; ?>)</td>
		<td class="td_class1">co2 (<?php echo $value['co2']; ?>)</td>
		<td class="td_class1">co3 (<?php echo $value['co3']; ?>)</td>
		<td class="td_class1">co4 (<?php echo $value['co4']; ?>)</td>
		<td class="td_class1">Total (<?php echo $obtained; ?>)</td>

<?php  } ?>
		<td class="td_class1">Grand Total (<?php echo $total_marks; ?>)</td>
		
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
?>

		<tr>
			<td class="td_class2"><?php echo $student_id; ?></td>
			<td class="td_class2"><?php echo $student_name; ?></td>

<?php

$sql="select 
	    id,(co1+co2+co3+co4)/exam_in_taken as ratio
		from assessment
		order by name";
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

?>
		
		

		
<?php	
			$total=(float)$co1+$co2+$co3+$co4;
			$obtained=$total*$ratio;

			$grand_total=$grand_total+$obtained;

			

?>

		<td class="td_class2"><?php echo $co1*$ratio; ?></td>
		<td class="td_class2"><?php echo $co2*$ratio; ?></td>
		<td class="td_class2"><?php echo $co3*$ratio; ?></td>
		<td class="td_class2"><?php echo $co4*$ratio; ?></td>
		<td class="td_class2"><?php echo $obtained; ?></td>


<?php

}

?>

		
			<td class="td_class2"><?php echo $grand_total; ?></td>
			
		</tr>





		

<?php 
}

?>





	</table>
</div>