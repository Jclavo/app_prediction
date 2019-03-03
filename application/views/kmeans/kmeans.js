
var READ_ALL_TEST = 'READ_ALL_TEST'
var EXECUTE_KMEANS = 'EXECUTE_KMEANS'


var URL_READ_ALL_TEST = BASE_URL + '/test/get_test'
var URL_EXECUTE_KMEANS = BASE_URL + '/kmeans/execute_kmeans'
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

	case EXECUTE_KMEANS:
		url_operation = URL_EXECUTE_KMEANS
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
		
		switch (operation) {
		case READ_ALL_TEST:
            //alert(data.test)
            select_tests(data.test)
			break
		case EXECUTE_KMEANS:
            //alert(data.test)
            display_students(data.student)
			//call_ajax(READ_ALL,global_test)
			break
		}
	});

}

function select_tests(test){
	// codigo para cargar los valores
	document.getElementById("kmeans-test").innerHTML = "";
	
	for (i = 0; i < test.length; i++) {
		var myTr = document.createElement("option")
		myTr.innerHTML = test[i]['description']
		myTr.setAttribute("value", test[i]['test_id'])
		document.getElementById("kmeans-test").appendChild(myTr)
	}	
}


/*
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
*/

function execute_kmeans() {
	
global_data.test_id  = document.getElementById("kmeans-test").value
	
	if(global_data.test_id == '')
	{
		alert('Fulfill required fields')
	}
	else{
		call_ajax(EXECUTE_KMEANS,global_data)
	}

}


