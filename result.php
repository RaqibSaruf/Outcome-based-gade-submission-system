
<?php 

include "include_script.php";

?>
<link rel="stylesheet" type="text/css" href="style/student_style.css">
<script type="text/javascript" src="script/result_script.js"></script>
<script type="text/javascript" src="script/ajax.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
	$sql="select * from assessment
			order by name ";
	$info=$db->get_sql_array($sql);
?>

		<select id="select_exam" onchange="show_table()">
			<option value="-1">Select Exam</option>
<?php
		foreach ($info as $key => $value) {
?>
			<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>	
<?php } ?>
		</select>

		<input type="button" class="btn_class" value="Done" onclick="location.reload();" />

		<button type="button" class="btn_class" onclick="javascript:history.back()">Back</button> 

			<div style="margin-bottom: 10px;"></div>
			<div id="result_table"></div>

