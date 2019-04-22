

var GET_INITIAL_DATA     = 'GET_INITIAL_DATA'
var SAVE     = 'SAVE'

var URL_GET_INITIAL_DATA = BASE_URL + '/answer/get_initial_data'
var URL_SAVE = BASE_URL + '/answer/update_answer'

//var URL_READ_ALL_COURSE = BASE_URL + '/course/get_course'

var global_info = {
	student_id : '',
	test_id  : ''
	
}

$(document).ready(function() {
	
	global_info.student_id  = document.getElementById("student-id").value
	global_info.test_id  = document.getElementById("test-id").value
	
	call_ajax(GET_INITIAL_DATA,global_info);

});

function save_answer() {

	var table_data = new Array();
    
	$('#form-list-answer-body tr').each(function(row, tr){
		table_data[row]={
	        "answer_id" : $(tr).find('td:eq(0)').text(),
	        "selected_option" : $(tr).find('option:selected').val(),
	    }
		
	}); 
	
	table_data = JSON.stringify(table_data)
	
	console.log(table_data)
	
	call_ajax(SAVE,'answer='+table_data)
	
}


function call_ajax(operation, data_input) {

	var url_operation

	switch (operation) {
	case GET_INITIAL_DATA:
		url_operation = URL_GET_INITIAL_DATA
		break;
	case SAVE:
		url_operation = URL_SAVE
		break;
	default:
		break;
	}

	$.ajax({
		dataType : 'json',
		url : url_operation,
		data : data_input
	 // data : { name : 'xd', email : 'xd.xmom' }
	
	}).done(function(data) {
		// alert(data.answer);
		console.log(data)
		$.notify(data.status['message'], data.status['type']);
		switch (operation) {
		case GET_INITIAL_DATA:
			display_answers(data.answer,data.test)
			display_student(data.student)
			display_test(data.test)
			break
		case SAVE:
			call_ajax(GET_INITIAL_DATA,global_info)
			break

		}
	});

}

function display_answers(answer,test) {
	
	//codigo para el boton cambie de nombre a SAVE
//	var crbtn = document.createElement("button")
//	crbtn.innerHTML = "Save";
//	crbtn.setAttribute("onclick", "save_answer()")
//	crbtn.setAttribute("class", "btn btn-sm btn-success")
//	document.getElementById("saveupdate").innerHTML = ""
//	document.getElementById("saveupdate").appendChild(crbtn);
	
	// codigo para cargar los valores
	total_alternative = test[0]['total_alternative']
	
	document.getElementById("form-list-answer-body").innerHTML = "";

	for (i = 0; i < answer.length; i++) {

		var myTr = document.createElement("tr")

		for (answer_field in answer[i]) {

			var mytd = document.createElement("td")
			
			if (answer_field == 'selected_option')
			{
				var myselect = document.createElement("select")
				myselect .setAttribute("name", 'select' + answer[i]['answer_id'])
				
				for (j = 0; j <= total_alternative; j++) {
					
					var myoption = document.createElement("option")
					myoption.innerHTML = 'Option ' + j 
					myoption.setAttribute("value", j)
					
					if ( answer[i][answer_field] == j )
					{
						myoption.setAttribute("selected", 1)
					}
					
					myselect.appendChild(myoption)
				}
				
				mytd.appendChild(myselect)
//				document.getElementById('select' + answer[i]['answer_id']).value = answer[i][answer_field]

			}
			else
			{//			input
				
				mytd.innerHTML = answer[i][answer_field]
			}
				
			myTr.appendChild(mytd)

		}

		document.getElementById("form-list-answer-body").appendChild(myTr)
	}
	
}

function display_test(test) {
	document.getElementById("test-description").value = test[0]['description']
}

function display_student(student) {
	document.getElementById("student-description").value = student[0]['name'] + ' ' + student[0]['lastname']
}
