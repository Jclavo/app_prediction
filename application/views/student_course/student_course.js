var CREATE   = 'CREATE'
var READ_ALL = 'READ_ALL'
var DELETE 	 = 'DELETE'
var UPDATE 	 = 'UPDATE'
var READ 	 = 'READ'

var URL_CREATE 	 = BASE_URL + '/student_course/create_student_course'
var URL_READ_ALL = BASE_URL + '/student_course/get_student_course'
var URL_DELETE 	 = BASE_URL + '/student_course/delete_student_course'

		
var global_student_course = {
		id : '',
		student_id : '',
	    course_id : ''
	}

$(document).ready(function() {
	global_student_course.clear
	call_ajax(READ_ALL,global_student_course);

});

function add_student_course() {

	clear_global_student_course()
	
	global_student_course.student_id  = document.getElementById("student_course-student").value
	global_student_course.course_id  = document.getElementById("student_course-course").value

	if(required_field(global_student_course.student_id,global_student_course.course_id))
	{
		call_ajax(CREATE,global_student_course);
	}
	
}

// deleting student_course
function delete_student_course(id_student_course) {

	clear_global_student_course()
	global_student_course.id = id_student_course
	
	call_ajax(DELETE,global_student_course)
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
	case DELETE:
		url_operation = URL_DELETE
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
		// alert(data.student_course);
		console.log(data)
		$.notify(data.status['message'], data.status['type']);
		
		clear_global_student_course()
		switch (operation) {
		case CREATE:
			//alert(data.status)
			call_ajax(READ_ALL,global_student_course)
			break
		case READ_ALL:
			display_student_courses(data.student_course)
			display_courses(data.course)
			display_students(data.student)
			break
		case DELETE:
			//alert(data.status)
			call_ajax(READ_ALL,global_student_course)
			break;
		default:
			break
		}
	});

}

function display_student_courses(student_course) {
	
	//codigo para el boton cambie de nombre a SAVE
	var crbtn = document.createElement("button")
	crbtn.innerHTML = "Save";
	crbtn.setAttribute("onclick", "add_student_course()")
	crbtn.setAttribute("class", "btn btn-sm btn-success")
	document.getElementById("saveupdate").innerHTML = ""
	document.getElementById("saveupdate").appendChild(crbtn);
	
	// codigo para cargar los valores
	document.getElementById("form-list-student_course-body").innerHTML = "";

	for (i = 0; i < student_course.length; i++) {

		var myTr = document.createElement("tr")

		for (student_course_field in student_course[i]) {

			var mytd = document.createElement("td")
			mytd.innerHTML = student_course[i][student_course_field]
			myTr.appendChild(mytd)

		}
		var actionTd = document.createElement("td")
		
		var deletebtn = document.createElement("button")
		deletebtn.innerHTML = "Delete"
		deletebtn.setAttribute("class", "btn btn-sm btn-danger")
		deletebtn.setAttribute("onclick", "delete_student_course(" + student_course[i]['student_course_id'] + ")")

		actionTd.appendChild(deletebtn)
		myTr.appendChild(actionTd)
		
		document.getElementById("form-list-student_course-body").appendChild(myTr)
	}
	
}

function display_student_course(student_course) {
	
	var updatebtn = document.createElement("button")
	updatebtn.innerHTML = "Update";
	updatebtn.setAttribute("class", "btn btn-sm btn-success")
	updatebtn.setAttribute("onclick", "update_student_course()")

	document.getElementById("saveupdate").innerHTML = ""
	document.getElementById("saveupdate").appendChild(updatebtn)
	document.getElementById("student_course-id").value = student_course[0]['student_course_id']
	document.getElementById("student_course-student").value = student_course[0]['student_id']
	document.getElementById("student_course-course").value = student_course[0]['course_id']

}

function display_courses(course){
	// codigo para cargar los valores
	document.getElementById("student_course-course").innerHTML = "";
	
	for (i = 0; i < course.length; i++) {
		var myTr = document.createElement("option")
		myTr.innerHTML = course[i]['description']
		myTr.setAttribute("value", course[i]['course_id'])
		document.getElementById("student_course-course").appendChild(myTr)
	}
	
}

function display_students(student){
	// codigo para cargar los valores
	document.getElementById("student_course-student").innerHTML = "";
	
	for (i = 0; i < student.length; i++) {
		var myTr = document.createElement("option")
		myTr.innerHTML = student[i]['name'] + ' ' + student[i]['lastname']
		myTr.setAttribute("value", student[i]['student_id'])
		document.getElementById("student_course-student").appendChild(myTr)
	}
	
}

function clear_global_student_course() {
	
	global_student_course.id	  = ''
	global_student_course.student_id  = ''
    global_student_course.course_id  = ''

}

function required_field(field1,field2 ){
	
	if (field1 == '' || field2 == '')
	{
		alert('Fulfill required fields')
		return false
	}
	return true
}
