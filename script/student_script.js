action_url="student_action.php";

function set_value(id,val){
	document.getElementById(id).value=val;
}

function delete_fun(id){

	id=parseInt(id);
	var data1={
		"id": id
	}
	var data={
    	"delete_fun": data1
    }
    $.ajax({
        type: 'POST',
        url: action_url,
        data:data,
        success: function(response) {
           show_table();
        }
    }); 
}

function update(id){
	   name=document.getElementById("name_"+id).value;
        student_id=document.getElementById("student_"+id).value;
	if(name=="" || student_id=="")return;
	var data1={
		"id": id,
		"name": name,
        "student_id": student_id
	}

	var data={
		"update_table": data1
	}

	console.log(data1);

	$.ajax({
        type: 'POST',
        url: action_url,
        data:data,
        success: function(response) {
            set_value("total_"+id,total);
            set_value("ratio_"+id,ratio);
        }
    }); 
	
}

function add(){

	var data={
    	"add_table": 1
    }

    $.ajax({
        type: 'POST',
        url: action_url,
        data:data,
        success: function(response) {
           show_table();
        }
    });  

}

function show_table(){
    
    var data={
    	"get_table": 1
    }

    $.ajax({
        type: 'POST',
        url: action_url,
        data:data,
        success: function(response) {
           document.getElementById('student_table').innerHTML=response;
        }
    });  
}