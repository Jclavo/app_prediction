var CREATE   = 'CREATE'
var READ_ALL = 'READ_ALL'
var DELETE 	 = 'DELETE'
var UPDATE 	 = 'UPDATE'
var READ 	 = 'READ'

var URL_CREATE 	 = BASE_URL + '/test/create_test'
var URL_READ_ALL = BASE_URL + '/test/get_test'
var URL_DELETE 	 = BASE_URL + '/test/delete_test'
var URL_UPDATE 	 = BASE_URL + '/test/update_test'

//var URL_READ_ALL_COURSE = BASE_URL + '/course/get_course'
		
var global_test = {
		id : '',
		description : '',
		total_question : '',
	    total_alternative : '',
	    course_id : ''
	}


$(document).ready(function() {
	global_test.clear
	call_ajax(READ_ALL,global_test);

});

function add_test() {

	clear_global_test()
	global_test.description  = document.getElementById("test-description").value
	global_test.total_question  = document.getElementById("test-total_question").value
	global_test.total_alternative  = document.getElementById("test-total_alternative").value
	global_test.course_id  = document.getElementById("test-course").value

	if(required_field(global_test.description) && 
	   required_field(global_test.total_question) &&
	   required_field(global_test.total_alternative) &&
	   required_field(global_test.course_id))
	{
		call_ajax(CREATE,global_test);
	}
	
}

//Editing test
function edit_test(id_test) {

	clear_global_test()
	global_test.id = id_test
	call_ajax(READ,global_test)
	
}

//Updating test
function update_test() {
	
	clear_global_test()
	global_test.id 	  = document.getElementById("test-id").value
	global_test.description  = document.getElementById("test-description").value
	
	global_test.course_id  = document.getElementById("test-course").value

	if(required_field(global_test.description) && 
	   required_field(global_test.course_id))
	{
		call_ajax(UPDATE,global_test);
	}
	
}

// deleting test
function delete_test(id_test) {

	clear_global_test()
	global_test.id = id_test
	
	call_ajax(DELETE,global_test)
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
		// alert(data.test);
		console.log(data)
		
		clear_global_test()
		switch (operation) {
		case CREATE:
			alert(data.status)
			call_ajax(READ_ALL,global_test)
			break
		case READ_ALL:
			display_tests(data.test)
			display_courses(data.course)
			break
		case DELETE:
			alert(data.status)
			call_ajax(READ_ALL,global_test)
			break;
		case READ:
			display_test(data.test)
			break
		case UPDATE:
			alert(data.status)
			call_ajax(READ_ALL,global_test)
			break
		default:
			break
		}
	});

}

function display_tests(test) {
	
	//codigo para el boton cambie de nombre a SAVE
	var crbtn = document.createElement("button")
	crbtn.innerHTML = "Save";
	crbtn.setAttribute("onclick", "add_test()")
	crbtn.setAttribute("class", "btn btn-sm btn-success")
	document.getElementById("saveupdate").innerHTML = ""
	document.getElementById("saveupdate").appendChild(crbtn);
	
	// codigo para cargar los valores
	document.getElementById("form-list-test-body").innerHTML = "";

	for (i = 0; i < test.length; i++) {

		var myTr = document.createElement("tr")

		for (test_field in test[i]) {

			var mytd = document.createElement("td")
			mytd.innerHTML = test[i][test_field]
			myTr.appendChild(mytd)

		}
		var actionTd = document.createElement("td")
		
		var editBtn = document.createElement("button")
		editBtn.innerHTML = "Edit"
		editBtn.setAttribute("class", "btn btn-sm btn-primary")
		editBtn.setAttribute("onclick", "edit_test(" + test[i]['test_id'] + ")")

		var deletebtn = document.createElement("button")
		deletebtn.innerHTML = "Delete"
		deletebtn.setAttribute("class", "btn btn-sm btn-danger")
		deletebtn.setAttribute("onclick", "delete_test(" + test[i]['test_id'] + ")")

/*		var linkbtn = document.createElement("a")
		linkbtn.innerHTML = "Students"
		linkbtn.setAttribute("class", "btn btn-sm btn-link")
		linkbtn.setAttribute("href", URL_GRADE + '/' + exam[i]['exam_id'] + '/' + exam[i]['course_id'])
*/
		actionTd.appendChild(editBtn)
		actionTd.appendChild(deletebtn)
	//	actionTd.appendChild(linkbtn)
		myTr.appendChild(actionTd)
		
		document.getElementById("form-list-test-body").appendChild(myTr)
	}
	
	document.getElementById("test-id").value = "";
	document.getElementById("test-description").value = "";
	document.getElementById("test-total_question").value = "";
	document.getElementById("test-total_alternative").value = "";

}

function display_test(test) {
	
	var updatebtn = document.createElement("button")
	updatebtn.innerHTML = "Update";
	updatebtn.setAttribute("class", "btn btn-sm btn-success")
	updatebtn.setAttribute("onclick", "update_test()")

	document.getElementById("saveupdate").innerHTML = ""
	document.getElementById("saveupdate").appendChild(updatebtn)
	document.getElementById("test-id").value = test[0]['test_id']
	document.getElementById("test-description").value = test[0]['description']
	document.getElementById("test-total_question").value = test[0]['total_question']
	document.getElementById("test-total_alternative").value = test[0]['total_alternative']
	document.getElementById("test-course").value = test[0]['course_id']
}

function display_courses(course){
	// codigo para cargar los valores
	document.getElementById("test-course").innerHTML = "";
	
	for (i = 0; i < course.length; i++) {
		var myTr = document.createElement("option")
		myTr.innerHTML = course[i]['description']
		myTr.setAttribute("value", course[i]['course_id'])
		document.getElementById("test-course").appendChild(myTr)
	}
	
}

function clear_global_test() {
	
	global_test.id	  = ''
	global_test.description  = ''
    global_test.total_question  = ''
	global_test.total_alternative  = ''
	
}

function required_field(field){
	
	if (field == '')
	{
		alert('Fulfill required fields')
		return false
	}
	return true
}
