

var GET_INITIAL_DATA     = 'GET_INITIAL_DATA'

var URL_GET_INITIAL_DATA = BASE_URL + '/answer/get_initial_data'

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
	        "student_id" : $(tr).find('td:eq(1)').text(),
	        "answer" :$(tr).find("input:text,select").val(),
	        "exam_id" : document.getElementById("exam-id").value
	    }
		
	}); 
	
	table_data = JSON.stringify(table_data)
	
//	console.log(table_data)
	
	call_ajax(SAVE,'answer='+table_data)
	
}


function call_ajax(operation, data_input) {

	var url_operation

	switch (operation) {
	case GET_INITIAL_DATA:
		url_operation = URL_GET_INITIAL_DATA
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
		
		switch (operation) {
		case GET_INITIAL_DATA:
			//display_answers(data.answer)
			display_student(data.student)
			display_test(data.test)
			break
		case SAVE:
			call_ajax(READ_ALL,global_info)
			break

		}
	});

}

function display_answers(answer) {
	
	//codigo para el boton cambie de nombre a SAVE
	var crbtn = document.createElement("button")
	crbtn.innerHTML = "Save";
	crbtn.setAttribute("onclick", "save_answer()")
	crbtn.setAttribute("class", "btn btn-sm btn-success")
	document.getElementById("saveupdate").innerHTML = ""
	document.getElementById("saveupdate").appendChild(crbtn);
	
	// codigo para cargar los valores
	document.getElementById("form-list-answer-body").innerHTML = "";

	for (i = 0; i < answer.length; i++) {

		var myTr = document.createElement("tr")

		for (answer_field in answer[i]) {

			var mytd = document.createElement("td")
			
			if (answer_field == 'score')
			{
				var myinput = document.createElement("input")
				myinput.setAttribute("value", answer[i][answer_field])
				mytd.appendChild(myinput)
			}
			else
			{//			input
				
				mytd.innerHTML = answer[i][answer_field]
			}
				
			myTr.appendChild(mytd)

		}
		var actionTd = document.createElement("td")
		
		var editBtn = document.createElement("button")
		editBtn.innerHTML = "Edit"
		editBtn.setAttribute("class", "btn btn-sm btn-primary")
		editBtn.setAttribute("onclick", "edit_answer(" + answer[i]['answer_id'] + ")")

		var deletebtn = document.createElement("button")
		deletebtn.innerHTML = "Delete"
		deletebtn.setAttribute("class", "btn btn-sm btn-danger")
		deletebtn.setAttribute("onclick", "delete_answer(" + answer[i]['answer_id'] + ")")

		actionTd.appendChild(editBtn)
		actionTd.appendChild(deletebtn)
		myTr.appendChild(actionTd)
		
		document.getElementById("form-list-answer-body").appendChild(myTr)
	}
	
}

function display_test(test) {
	document.getElementById("test-description").value = test[0]['description']
}

function display_student(student) {
	document.getElementById("student-description").value = student[0]['name'] + ' ' + student[0]['lastname']
}
