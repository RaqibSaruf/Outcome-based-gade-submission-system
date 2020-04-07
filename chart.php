<!DOCTYPE HTML>

<?php 

include "include_script.php";

$precision=2;

?>


<html>

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

<?php 

$A_plus=0;$A=0;$A_minus=0;$B_plus=0;$B=0;$B_minus=0;$C_plus=0;$C=0;$C_minus=0;$D_plus=0;$D=0;$F=0;$I=0;

$total_student=0;

	
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
		
		if($grand_total>=($total_marks * 0.97))$A_plus ++;
		else if($grand_total>=($total_marks * 0.9) && $grand_total<($total_marks * 0.97))$A ++;
		else if($grand_total>=($total_marks * 0.87) && $grand_total<($total_marks * 0.9))$A_minus ++;
		else if($grand_total>=($total_marks * 0.83) && $grand_total<($total_marks * 0.87))$B_plus ++;
		else if($grand_total>=($total_marks * 0.8) && $grand_total<($total_marks * 0.83))$B ++;
		else if($grand_total>=($total_marks * 0.77) && $grand_total<($total_marks * 0.8))$B_minus ++;
		else if($grand_total>=($total_marks * 0.73) && $grand_total<($total_marks * 0.77))$C_plus ++;
		else if($grand_total>=($total_marks * 0.7) && $grand_total<($total_marks * 0.73))$C ++;
		else if($grand_total>=($total_marks * 0.67) && $grand_total<($total_marks * 0.7))$C_minus ++;
		else if($grand_total>=($total_marks * 0.63) && $grand_total<($total_marks * 0.67))$D_plus ++;
		else if($grand_total>=($total_marks * 0.6) && $grand_total<($total_marks * 0.63))$D ++;
		else if($grand_total < $total_marks * 0.6)$F ++;
		else $I ++;


		$total_student ++;

	}	

	

$per_A_plus=$A_plus/$total_student*100;
$per_A=$A/$total_student*100;
$per_A_minus=$A_minus/$total_student*100;
$per_B_plus=$B_plus/$total_student*100;
$per_B=$B/$total_student*100;
$per_B_minus=$B_minus/$total_student*100;
$per_C_plus=$C_plus/$total_student*100;
$per_C=$C/$total_student*100;
$per_C_minus=$C_minus/$total_student*100;
$per_D_plus=$D_plus/$total_student*100;
$per_D=$D/$total_student*100;
$per_F=$F/$total_student*100;
$per_I=$I/$total_student*100;

  


?>	

<script type="text/javascript">
	window.onload = function () {

		 CanvasJS.addColorSet("color",
                [
                "#4F81BC"                         
                ]);
	
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	colorSet: "color",
	title:{
		text: "Grade Distribution"
	},
	axisY:{
		title: "percentage of students"	
		},
	toolTip: {
		shared: true
	},
	data: [{
		type: "column",
		name: "student",
		toolTipContent: "{label} <br> <b>{name}:</b> {y}%",
		dataPoints: [
			{ y: <?php echo substr(number_format($per_A_plus, $precision+1, '.', ''), 0, -1); ?>, label: "A+" },
			{ y:  <?php echo substr(number_format($per_A, $precision+1, '.', ''), 0, -1); ?>, label: "A" },
			{ y:  <?php echo substr(number_format($per_A_minus, $precision+1, '.', ''), 0, -1); ?>, label: "A-" },
			{ y:  <?php echo substr(number_format($per_B_plus, $precision+1, '.', ''), 0, -1); ?>, label: "B+" },
			{ y:  <?php echo substr(number_format($per_B, $precision+1, '.', ''), 0, -1); ?>, label: "B" },
			{ y:  <?php echo substr(number_format($per_B_minus, $precision+1, '.', ''), 0, -1); ?>, label: "B-" },
			{ y: <?php echo substr(number_format($per_C_plus, $precision+1, '.', ''), 0, -1); ?>, label: "C+" },
			{ y:  <?php echo substr(number_format($per_C, $precision+1, '.', ''), 0, -1); ?>, label: "C" },
			{ y: <?php echo substr(number_format($per_C_minus, $precision+1, '.', ''), 0, -1); ?>, label: "C-" },
			{ y:  <?php echo substr(number_format($per_D_plus, $precision+1, '.', ''), 0, -1); ?>, label: "D+" },
			{ y: <?php echo substr(number_format($per_D, $precision+1, '.', ''), 0, -1); ?>, label: "D" },
			{ y:  <?php echo substr(number_format($per_F, $precision+1, '.', ''), 0, -1); ?>, label: "F" },
			{ y:  <?php echo substr(number_format($per_I, $precision+1, '.', ''), 0, -1); ?>, label: "I" }
		]
	},
	]
});
chart.render();


document.getElementById("printChart").addEventListener("click",function(){
    	chart.print();
    });  	


}
</script>


<head>



</head>

<body>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<button type="button" class="btn_class" onclick="javascript:history.back()">Back</button> 
<button type="button" class="btn_class" id="printChart">Print Chart</button>


<center><div id="chartContainer" style="height: 400px; width: 70%; "></div></center>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


</body>

</html>
