action_url="result_action.php";

function set_value(id,val){
	document.getElementById(id).value=val;
}

/*function delete_fun(id){

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
}*/


function check_co1(id,ratio,co){
        co1=document.getElementById("co1_"+id).value;
        

        if(co1>co ){alert('Wrong');
            return;
        }
        else update(id,ratio);

}
function check_co2(id,ratio,co){
        co2=document.getElementById("co2_"+id).value;
        

        if(co2>co ){alert('Wrong');
            return;
        }
        else update(id,ratio);

}
function check_co3(id,ratio,co){
        co3=document.getElementById("co3_"+id).value;
        

        if(co3>co ){alert('Wrong');
            return;
        }
        else update(id,ratio);

}
function check_co4(id,ratio,co){
        co4=document.getElementById("co4_"+id).value;
        

        if(co4>co ){alert('Wrong');
            return;
        }
        else update(id,ratio);

}


function update(id,ratio){
	    co1=document.getElementById("co1_"+id).value;
        co2=document.getElementById("co2_"+id).value;
        co3=document.getElementById("co3_"+id).value;
        co4=document.getElementById("co4_"+id).value;
    if(co1=="" || co2=="" || co3=="" || co4=="")return;
        total=parseFloat(co1)+parseFloat(co2)+parseFloat(co3)+parseFloat(co4);
        obtained=parseFloat(total*ratio);

	var data1={
        "id": id,
        "co1": co1,
        "co2": co2,
        "co3": co3,
        "co4": co4
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
            set_value("ob_"+id,obtained);
        }
    }); 
	
}

/*function add(){

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

}*/

function show_table(){
    exam_id=document.getElementById("select_exam").value;
    if(exam_id==-1){
        document.getElementById('result_table').innerHTML="";
        return;
    }


    var data={
    	"get_table": exam_id
    }

    $.ajax({
        type: 'POST',
        url: action_url,
        data:data,
        success: function(response) {
           document.getElementById('result_table').innerHTML=response;
        }
    });  
}