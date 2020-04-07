<?php 

include "include_script.php";

?>
<link rel="stylesheet" type="text/css" href="style/student_style.css">
<script type="text/javascript" src="script/student_script.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<button class="btn_class" onclick="add()">Add Stduent</button>
	 <button class="btn_class"><a href="excel_student.php" class="a_link">Upload from excel</a></button>
	<button class="btn_class"><a href="home.php" class="a_link">Home</a></button> 
		

		<div style="margin-bottom: 10px;"></div>
		<div id="student_table"></div>


<script type="text/javascript">
	show_table();
</script>

