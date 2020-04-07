<?php
include "include_script.php";

	if(isset($_POST['delete_fun'])){
		$data=$_POST['delete_fun'];
		$res=$db->sql_action("student","delete",$data);
		print_r($res);
}

	if(isset($_POST['update_table'])){
		$data=$_POST['update_table'];
		$id=$data['id'];
		$res=$db->sql_action("student","update",$data);
}

	if(isset($_POST['add_table'])){
		$data=array();
		$data['name']="-";
		$data['student_id']="Nil";
		$res=$db->sql_action("student","insert",$data);
		print_r($res);
}


	if(isset($_POST['get_table'])){
?>

		<table width="100%" cellspacing=0>
			<tr>
				<td class="td_class1">Name</td>
				<td class="td_class1">Student ID</td>
				<td class="td_class1">Delete</td>
			</tr>
<?php 
	$sql="
		select 
		id,name,student_id from student
		order by student_id
		";
		
	$info=$db->get_sql_array($sql);
		foreach ($info as $key => $value) {
			$id=$value['id'];
			$name=$value['name'];
			$student_id=$value['student_id'];
?>
			<tr>
				<td class="td_class2">
					<input type="text" onkeyup="update(<?php echo $id; ?>)" id="name_<?php echo $id; ?>" class="input_calss2" value="<?php echo $name; ?>">
				</td>
				<td class="td_class2">
					<input type="text" onkeyup="update(<?php echo $id; ?>)" id="student_<?php echo $id; ?>" class="input_calss1" value="<?php echo $student_id; ?>">
				</td>
		
				<td class="td_class2">
					<button onclick="delete_fun(<?php echo $id; ?>)">Delete</button>
				</td>
			</tr>
<?php } ?>
		</table>

<?php

}

?>