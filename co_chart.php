<!DOCTYPE HTML>

<?php 

include "include_script.php";

$precision=2;

?>


<?php 


$sql="select count(*) as coun from student";
$info=$db->get_sql_array($sql);
foreach ($info as $key => $value)
	$total_std=$value['coun'];


$co1_attain=0;$co2_attain=0;$co3_attain=0;$co4_attain=0;
$per_co1=0;$per_co2=0;$per_co3=0;$per_co4=0;
$t_co1=0;$t_co2=0;$t_co3=0;$t_co4=0;
	
$sql="select * from student
		order by student_id
	";
$info=$db->get_sql_array($sql);
foreach ($info as $key => $value) {
			
			$student_name=$value['name'];
			$student_id=$value['student_id'];


		$t_a_co1=0;	$t_a_co2=0;	$t_a_co3=0;	$t_a_co4=0;
		$total_co1=0;$total_co2=0;$total_co3=0;	$total_co4=0;
		$grand_total=0;

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

	$co1=0;	$co2=0;	$co3=0;	$co4=0;	

		foreach($info1 as $key => $value){
			$co1=$value['co1'];
			$co2=$value['co2'];
			$co3=$value['co3'];
			$co4=$value['co4'];

			}
	
			$total_co1=$total_co1+($co1*$ratio);
			$total_co2=$total_co2+($co2*$ratio);
			$total_co3=$total_co3+($co3*$ratio);
			$total_co4=$total_co4+($co4*$ratio);

}

		$achived_co1=($total_co1 /$t_a_co1)*100;
		$achived_co2=($total_co2 /$t_a_co2)*100;
		$achived_co3=($total_co3 /$t_a_co3)*100;
		$achived_co4=($total_co4 /$t_a_co4)*100;

		if($achived_co1>=70)$t_co1++;
		if($achived_co2>=70)$t_co2++;
		if($achived_co3>=70)$t_co3++;
		if($achived_co4>=70)$t_co4++;

}

  $co1_attain=$t_co1/$total_std*100;
  $co2_attain=$t_co2/$total_std*100;
  $co3_attain=$t_co3/$total_std*100;
  $co4_attain=$t_co4/$total_std*100;
  		
?>


<script type="text/javascript">
	window.onload = function () {


 CanvasJS.addColorSet("color",
                [
                "#4F81BC"                         
                ]);


	
var chart = new CanvasJS.Chart("CO_chartContainer", {

	theme: "light1",
	animationEnabled: true,

	colorSet: "color",
	title:{
		text: "CO Attainment"
	},
	axisY:{
		title: "percentage of students",
		stripLines: [{
			value: 70,
			labelFontColor: "#EC5657",
			label: "Attained"
		}]
	},

	
	toolTip: {
		shared: true
		},
	data: [{
		type: "column",
		name: "student",
		toolTipContent: "{label} <br> <b>{name}:</b> {y}%",
		dataPoints: [
			{ y: <?php echo substr(number_format($co1_attain, $precision+1, '.', ''), 0, -1); ?> , label: "CO1" },
			{ y: <?php echo substr(number_format($co2_attain, $precision+1, '.', ''), 0, -1); ?> , label: "CO2" },
			{ y: <?php echo substr(number_format($co3_attain, $precision+1, '.', ''), 0, -1); ?> , label: "CO3" },
			{ y: <?php echo substr(number_format($co4_attain, $precision+1, '.', ''), 0, -1); ?> , label: "CO4" }
			
		]
	},
	]
});
chart.render();


document.getElementById("printCOChart").addEventListener("click",function(){
    	chart.print();
    });  	


}
</script>

<head>




</head>

<body>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<button type="button" class="btn_class" onclick="javascript:history.back()">Back</button> 
<button type="button" class="btn_class" id="printCOChart">Print Chart</button>


<center><div id="CO_chartContainer" style="height: 600px; width: 40%; "></div></center>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


</body>