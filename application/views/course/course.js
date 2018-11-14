var CREATE   = 'CREATE'
var READ_ALL = 'READ_ALL'
var DELETE 	 = 'DELETE'
var UPDATE 	 = 'UPDATE'
var READ 	 = 'READ'

var URL_CREATE 	 = BASE_URL + '/course/create_course'
var URL_READ_ALL = BASE_URL + '/course/get_course'
var URL_DELETE 	 = BASE_URL + '/course/delete_course'
var URL_UPDATE 	 = BASE_URL + '/course/update_course'
		
var global_course = {
		id : '',
		description : '',
		started_date : '',
		flag_copy : '',
		course_copied : ''
	}


$(document).ready(function() {
	global_course.clear
	call_ajax(READ_ALL,global_course);

});

function add_course() {

	clear_global_course()
	global_course.description  	= document.getElementById("course-description").value
	global_course.started_date  = document.getElementById("course-started_date").value
	
	if($("#course-copy").is(":checked"))
	{
		global_course.flag_copy  = 'X'
	}
		
	global_course.course_copied  = document.getElementById("course-course").value
	
	console.log(global_course)
	
//	if(required_field(global_course.description,global_course.started_date))
//	{
//		call_ajax(CREATE,global_course);
//	}
	
}

//Editing course
function edit_course(id_course) {

	clear_global_course()
	global_course.id = id_course
	call_ajax(READ,global_course)
	
}

//Updating course
function update_course() {
	
	clear_global_course()
	global_course.id 	  = document.getElementById("course-id").value
	global_course.description  = document.getElementById("course-description").value
	global_course.started_date  = document.getElementById("course-started_date").value

	if(required_field(global_course.description,global_course.started_date))
	{
		call_ajax(UPDATE,global_course);
	}
}

// deleting course
function delete_course(id_course) {

	clear_global_course()
	global_course.id = id_course
	
	call_ajax(DELETE,global_course)
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
	 // data : { description : 'xd', email : 'xd.xmom' }
	
	}).done(function(data) {
		// alert(data.course);
		console.log(data)
		
		clear_global_course()
		switch (operation) {
		case CREATE:
			alert(data.status)
			call_ajax(READ_ALL,global_course)
			break
		case READ_ALL:
			display_courses(data.course)
			select_courses(data.course)
			break
		case DELETE:
			alert(data.status)
			call_ajax(READ_ALL,global_course)
			break;
		case READ:
			display_course(data.course)
			break
		case UPDATE:
			alert(data.status)
			call_ajax(READ_ALL,global_course)
			break
		default:
			break
		}
	});

}

function display_courses(course) {
	
	//codigo para el boton cambie de nombre a SAVE
	var crbtn = document.createElement("button")
	crbtn.innerHTML = "Save";
	crbtn.setAttribute("onclick", "add_course()")
	crbtn.setAttribute("class", "btn btn-sm btn-success")
	document.getElementById("saveupdate").innerHTML = ""
	document.getElementById("saveupdate").appendChild(crbtn);
	
	// codigo para cargar los valores
	document.getElementById("form-list-course-body").innerHTML = "";

	for (i = 0; i < course.length; i++) {

		var myTr = document.createElement("tr")

		for (course_field in course[i]) {

			var mytd = document.createElement("td")
			mytd.innerHTML = course[i][course_field]
			myTr.appendChild(mytd)

		}
		var actionTd = document.createElement("td")
		
		var editBtn = document.createElement("button")
		editBtn.innerHTML = "Edit"
		editBtn.setAttribute("class", "btn btn-sm btn-primary")
		editBtn.setAttribute("onclick", "edit_course(" + course[i]['course_id'] + ")")

		var deletebtn = document.createElement("button")
		deletebtn.innerHTML = "Delete"
		deletebtn.setAttribute("class", "btn btn-sm btn-danger")
		deletebtn.setAttribute("onclick", "delete_course(" + course[i]['course_id'] + ")")

		actionTd.appendChild(editBtn)
		actionTd.appendChild(deletebtn)
		myTr.appendChild(actionTd)
		
		document.getElementById("form-list-course-body").appendChild(myTr)
	}
	
	document.getElementById("course-id").value = "";
	document.getElementById("course-description").value = "";
	document.getElementById("course-started_date").value = "";

}

function display_course(course) {
	
	var updatebtn = document.createElement("button")
	updatebtn.innerHTML = "Update";
	updatebtn.setAttribute("class", "btn btn-sm btn-success")
	updatebtn.setAttribute("onclick", "update_course()")

	document.getElementById("saveupdate").innerHTML = ""
	document.getElementById("saveupdate").appendChild(updatebtn)
	document.getElementById("course-id").value = course[0]['course_id']
	document.getElementById("course-description").value = course[0]['description']
	document.getElementById("course-started_date").value = course[0]['started_date']

}

function select_courses(course){
	// codigo para cargar los valores
	document.getElementById("course-course").innerHTML = "";
	
	for (i = 0; i < course.length; i++) {
		var myTr = document.createElement("option")
		myTr.innerHTML = course[i]['description']
		myTr.setAttribute("value", course[i]['course_id'])
		document.getElementById("course-course").appendChild(myTr)
	}	
} 


function clear_global_course() {
	
	global_course.id	  = ''
	global_course.description  = ''
	global_course.started_date  = ''
    global_course.started_date  = ''
	global_course.flag_copy = ''
	global_course.course_copied = ''

}
  
function required_field(description,started_date){
	
	if (description == '' || started_date  == '' )
	{
		alert('Fulfill required fields')
		return false
	}
	return true
}