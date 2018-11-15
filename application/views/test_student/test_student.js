
var READ_ALL_COURSE = 'READ_ALL_COURSE'
var READ_STUDENT_BY_COURSE = 'READ_STUDENT_BY_COURSE'


var URL_READ_ALL_COURSE = BASE_URL + '/course/get_course'
var URL_READ_STUDENT_BY_COURSE = BASE_URL + '/student/get_studentbycourse'

		
var global_data = {
		id : '',
		course_id : ''
	}

$(document).ready(function() {
	call_ajax(READ_ALL_COURSE,global_data);

});


function call_ajax(operation, data_input) {

	var url_operation

	switch (operation) {

	case READ_ALL_COURSE:
		url_operation = URL_READ_ALL_COURSE
		break;
	case READ_STUDENT_BY_COURSE:
		url_operation = URL_READ_STUDENT_BY_COURSE
		break;
	default:
		break;
	}

	$.ajax({
		dataType : 'json',
		url : url_operation,
		data : data_input
	
	}).done(function(data) {
		console.log(data)
		
		switch (operation) {
		case READ_ALL_COURSE:
            //alert(data.course)
            select_courses(data.course)
			break
		case READ_STUDENT_BY_COURSE:
            //alert(data.course)
            display_students(data.student)
			//call_ajax(READ_ALL,global_course)
			break
		}
	});

}

function select_courses(course){
	// codigo para cargar los valores
	document.getElementById("test_student-course").innerHTML = "";
	
	for (i = 0; i < course.length; i++) {
		var myTr = document.createElement("option")
		myTr.innerHTML = course[i]['description']
		myTr.setAttribute("value", course[i]['course_id'])
		document.getElementById("test_student-course").appendChild(myTr)
	}	
}

function display_students(student) {
	
	// codigo para cargar los valores
	document.getElementById("form-list-test_student-body").innerHTML = "";

	for (i = 0; i < student.length; i++) {

		var myTr = document.createElement("tr")

		for (student_field in student[i]) {

			var mytd = document.createElement("td")
			mytd.innerHTML = student[i][student_field]
			myTr.appendChild(mytd)

		}
		var actionTd = document.createElement("td")
		
		/*var editBtn = document.createElement("button")
		editBtn.innerHTML = "Edit"
		editBtn.setAttribute("class", "btn btn-sm btn-primary")
		editBtn.setAttribute("onclick", "edit_student(" + student[i]['student_id'] + ")")

		var deletebtn = document.createElement("button")
		deletebtn.innerHTML = "Delete"
		deletebtn.setAttribute("class", "btn btn-sm btn-danger")
		deletebtn.setAttribute("onclick", "delete_student(" + student[i]['student_id'] + ")")

		actionTd.appendChild(editBtn)
		actionTd.appendChild(deletebtn)*/
		myTr.appendChild(actionTd)
		
		document.getElementById("form-list-test_student-body").appendChild(myTr)
	}
	
}

function show_students() {
	
	global_data.course_id  = document.getElementById("test_student-course").value
	
	if(global_data.course_id == '')
	{
		alert('Fulfill required fields')
	}
	else{
		call_ajax(READ_STUDENT_BY_COURSE,global_data)
	}
	
}

