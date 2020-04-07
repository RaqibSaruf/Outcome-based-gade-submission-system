<?php 

include "include_script.php";

?>
<link rel="stylesheet" type="text/css" href="style/style.css">
<script type="text/javascript" src="script/assessment_script.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>


<meta name="viewport" content="width=device-width, initial-scale=1.0">


		<button class="btn_class" onclick="add()">Add Assessment</button>
		<input type="button" class="btn_class" value="Done" onclick="location.reload();" />
	 	<button type="button" class="btn_class" onclick="javascript:history.back()">Back</button> 

		<div style="margin-bottom: 10px;"></div>
		<center><div id="load"></div></center>
		<div id="assessment_table"></div>


<script type="text/javascript">
	show_table();
</script>



