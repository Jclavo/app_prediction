
var READ_ALL_TEST = 'READ_ALL_TEST'
var READ_STUDENT_BY_TEST = 'READ_STUDENT_BY_TEST'


var URL_READ_ALL_TEST = BASE_URL + '/test/get_test'
var URL_READ_STUDENT_BY_TEST = BASE_URL + '/student/get_studentbytest'
var URL_ANSWER = BASE_URL + '/answer/index'

		
var global_data = {
		id : '',
		test_id : ''
	}

$(document).ready(function() {
	call_ajax(READ_ALL_TEST,global_data);

});


function call_ajax(operation, data_input) {

	var url_operation

	switch (operation) {

	case READ_STUDENT_BY_TEST:
		url_operation = URL_READ_STUDENT_BY_TEST
		break;
	case READ_ALL_TEST:
		url_operation = URL_READ_ALL_TEST
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
		$.notify(data.status['message'], data.status['type']);
		
		switch (operation) {
		case READ_ALL_TEST:
            //alert(data.test)
            select_tests(data.test)
			break
		case READ_STUDENT_BY_TEST:
            //alert(data.test)
            display_students(data.student)
			//call_ajax(READ_ALL,global_test)
			break
		}
	});

}

function select_tests(test){
	// codigo para cargar los valores
	document.getElementById("test_student-test").innerHTML = "";
	
	for (i = 0; i < test.length; i++) {
		var myTr = document.createElement("option")
		myTr.innerHTML = test[i]['description']
		myTr.setAttribute("value", test[i]['test_id'])
		document.getElementById("test_student-test").appendChild(myTr)
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
		
		var linkbtn = document.createElement("a")
		linkbtn.innerHTML = "Set Answer"
		linkbtn.setAttribute("class", "btn btn-sm btn-link")
		linkbtn.setAttribute("href", URL_ANSWER + '/' + student[i]['student_id'] + '/' + document.getElementById("test_student-test").value)

		
		actionTd.appendChild(linkbtn)
		myTr.appendChild(actionTd)
		
		document.getElementById("form-list-test_student-body").appendChild(myTr)
	}
	
}

function show_students() {
	
	global_data.test_id  = document.getElementById("test_student-test").value
	
	if(global_data.test_id == '')
	{
		alert('Fulfill required fields')
	}
	else{
		call_ajax(READ_STUDENT_BY_TEST,global_data)
	}
	
}

