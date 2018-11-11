var CREATE   = 'CREATE'
var READ_ALL = 'READ_ALL'
var DELETE 	 = 'DELETE'
var UPDATE 	 = 'UPDATE'
var READ 	 = 'READ'

var URL_CREATE 	 = BASE_URL + '/exam/create_exam'
var URL_READ_ALL = BASE_URL + '/exam/get_exam'
var URL_DELETE 	 = BASE_URL + '/exam/delete_exam'
var URL_UPDATE 	 = BASE_URL + '/exam/update_exam'

//var URL_READ_ALL_COURSE = BASE_URL + '/course/get_course'
		
var global_exam = {
		id : '',
		description : '',
		course_id : '' 
	}


$(document).ready(function() {
	global_exam.clear
	call_ajax(READ_ALL,global_exam);

});

function add_exam() {

	clear_global_exam()
	global_exam.description  = document.getElementById("exam-description").value
	global_exam.course_id  =   document.getElementById("exam-course").value

	if(required_field(global_exam.description,global_exam.course_id))
	{
		call_ajax(CREATE,global_exam);
	}
	
}

//Editing exam
function edit_exam(id_exam) {

	clear_global_exam()
	global_exam.id = id_exam
	call_ajax(READ,global_exam)
	
}

//Updating exam
function update_exam() {
	
	clear_global_exam()
	global_exam.id 	  = document.getElementById("exam-id").value
	global_exam.description  = document.getElementById("exam-description").value
//	global_exam.course_id  =   document.getElementById("exam-course").value

//	if(required_field(global_exam.description,global_exam.course_id))
//	{
		call_ajax(UPDATE,global_exam);
//	}	
}

// deleting exam
function delete_exam(id_exam) {

	clear_global_exam()
	global_exam.id = id_exam
	
	call_ajax(DELETE,global_exam)
}

function call_ajax(operation, data_input) {

	var url_operation

	switch (operation) {
	case CREATE:
		url_operation = URL_CREATE
		break;
	case READ_ALL:
		url_operation = URL_READ_ALL
		break;
	case READ:
		url_operation = URL_READ_ALL
		break;
	case DELETE:
		url_operation = URL_DELETE
		break;
	case UPDATE:
		url_operation = URL_UPDATE
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
		// alert(data.exam);
		console.log(data)
		
		clear_global_exam()
		switch (operation) {
		case CREATE:
			alert(data.status)
			call_ajax(READ_ALL,global_exam)
			break
		case READ_ALL:
			display_exams(data.exam)
			display_courses(data.course)
			break
		case DELETE:
			alert(data.status)
			call_ajax(READ_ALL,global_exam)
			break;
		case READ:
			display_exam(data.exam)
			break
		case UPDATE:
			alert(data.status)
			call_ajax(READ_ALL,global_exam)
			break
		default:
			break
		}
	});

}

function display_exams(exam) {
	
	//codigo para el boton cambie de nombre a SAVE
	var crbtn = document.createElement("button")
	crbtn.innerHTML = "Save";
	crbtn.setAttribute("onclick", "add_exam()")
	crbtn.setAttribute("class", "btn btn-sm btn-success")
	document.getElementById("saveupdate").innerHTML = ""
	document.getElementById("saveupdate").appendChild(crbtn);
	
	// codigo para cargar los valores
	document.getElementById("form-list-exam-body").innerHTML = "";

	for (i = 0; i < exam.length; i++) {

		var myTr = document.createElement("tr")

		for (exam_field in exam[i]) {

			var mytd = document.createElement("td")
			mytd.innerHTML = exam[i][exam_field]
			myTr.appendChild(mytd)

		}
		var actionTd = document.createElement("td")
		
		var editBtn = document.createElement("button")
		editBtn.innerHTML = "Edit"
		editBtn.setAttribute("class", "btn btn-sm btn-primary")
		editBtn.setAttribute("onclick", "edit_exam(" + exam[i]['exam_id'] + ")")

		var deletebtn = document.createElement("button")
		deletebtn.innerHTML = "Delete"
		deletebtn.setAttribute("class", "btn btn-sm btn-danger")
		deletebtn.setAttribute("onclick", "delete_exam(" + exam[i]['exam_id'] + ")")
		
		var linkbtn = document.createElement("button")
		linkbtn.innerHTML = "Grades"
		linkbtn.setAttribute("class", "btn btn-sm btn-success")
//		linkbtn.setAttribute("onclick", "delete_exam(" + exam[i]['exam_id'] + ")")

		
		actionTd.appendChild(editBtn)
		actionTd.appendChild(deletebtn)
		actionTd.appendChild(linkbtn)
		
		myTr.appendChild(actionTd)
		
		document.getElementById("form-list-exam-body").appendChild(myTr)
	}
	
	document.getElementById("exam-id").value = "";
	document.getElementById("exam-description").value = "";
}

function display_exam(exam) {
	
	var updatebtn = document.createElement("button")
	updatebtn.innerHTML = "Update";
	updatebtn.setAttribute("class", "btn btn-sm btn-success")
	updatebtn.setAttribute("onclick", "update_exam()")

	document.getElementById("saveupdate").innerHTML = ""
	document.getElementById("saveupdate").appendChild(updatebtn)
	document.getElementById("exam-id").value = exam[0]['exam_id']
	document.getElementById("exam-description").value = exam[0]['description']
	document.getElementById("exam-course").value = exam[0]['course_id']

}

function display_courses(course){
	// codigo para cargar los valores
	document.getElementById("exam-course").innerHTML = "";
	
	for (i = 0; i < course.length; i++) {
		var myTr = document.createElement("option")
		myTr.innerHTML = course[i]['description']
		myTr.setAttribute("value", course[i]['course_id'])
		document.getElementById("exam-course").appendChild(myTr)
	}	
}

function clear_global_exam() {
	
	global_exam.id	  = ''
	global_exam.description  = ''
    global_exam.course_id  = ''

}

function required_field(name,lastname){
	
	if (name == '' || lastname == '' )
	{
		alert('Fulfill required fields')
		return false
	}
	return true
}
