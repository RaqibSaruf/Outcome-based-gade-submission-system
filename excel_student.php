<?php 



require 'Classes/PHPExcel/IOFactory.php';


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grade_submission";



if(isset($_POST['upload'])){
	$inputfilename=$_FILES['file']['tmp_name'];
	$exceldata=array();

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	die("connection failed:".mysqli_connect_error());
}


try{
	$inputfiletype=PHPExcel_IOFactory::identify($inputfilename);
	$objReader=PHPExcel_IOFactory::createReader($inputfiletype);
	$objPHPExcel=$objReader->load($inputfilename);
}

catch(exception $e)
{
	die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
}

$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();


for($row = 1;$row<=$highestRow;$row++)
{
	$rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
	$sql="insert into student (name,student_id) values ('".$rowData[0][0]."','".$rowData[0][1]."') ";

	if(mysqli_query($conn,$sql)){
		$exceldata[]=$rowData[0];
	}else{
		echo "ERROR" .$sql."<br>".mysqli_error($conn);
	}


}

echo "<table border='1'>";

foreach($exceldata as $index => $excelraw){
	echo "<tr>";
	foreach($excelraw as $excelcolumn)
	{
		echo "<td>".$excelcolumn."</td>";
	}
	echo "</tr>";
}
echo " </table>";

mysqli_close($conn);








}



?>



<html>
	<head>Import from excel</head>
	<body>

	 <button class="btn_class"><a href="student_list.php" class="a_link">Done</a></button>

		<form action="" method="post"
			enctype="multipart/form-data">

			<input type="file" name="file" value="" >
			<input type="submit" name="upload" value="upload" >


			
		</form>
	</body>
</html>