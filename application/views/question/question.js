var GET_INITIAL_DATA = 'GET_INITIAL_DATA'
var SAVE = 'SAVE'

var URL_GET_INITIAL_DATA = BASE_URL + '/question/get_questions'
var URL_SAVE = BASE_URL + '/question/update_question'

// var URL_READ_ALL_COURSE = BASE_URL + '/course/get_course'

var global_info = {
	test_id : ''

}

$(document).ready(function() {

	global_info.test_id = document.getElementById("test-id").value

	call_ajax(GET_INITIAL_DATA, global_info);

});

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
			display_test_info(data.test)
			display_questions(data.questions, data.test)
			break
		case SAVE: 
			call_ajax(GET_INITIAL_DATA,global_info) 
			break
			
		}
	});

}

function display_test_info(test) {
	document.getElementById("test-id").value = test[0]['test_id']
	document.getElementById("test-description").value = test[0]['description']
}

function display_questions(questions, test) {

	// codigo para cargar los valores

	var myTr
	var mytd

	total_alternative = test[0]['total_alternative']
	total_alternative = parseInt(total_alternative) + 1

	document.getElementById("form-list-question-body").innerHTML = "";

	for (i = 0; i < questions.length; i++) {

		myTr = document.createElement("tr")
		mytd = document.createElement("td")
		mytd.innerHTML = questions[i]['question_id']
		myTr.appendChild(mytd)
		mytd = document.createElement("td")
		mytd.innerHTML = questions[i]['description']
		myTr.appendChild(mytd)

		// Create Select Optio
		mytd = document.createElement("td")
		var myselect = document.createElement("select")
		myselect.setAttribute("name", 'select' + questions[i]['answer_id'])

		for (j = 0; j <= total_alternative; j++) {

			var myoption = document.createElement("option")
			
			if (j == 0) {
				myoption.innerHTML = 'None'
			}
			else
			{
				myoption.innerHTML = 'Option ' + j
			}
			
			myoption.setAttribute("value", j)

			if (questions[i]['correct'] == j) {
				myoption.setAttribute("selected", 1)
			}

			myselect.appendChild(myoption)
		}

		mytd.appendChild(myselect)
		myTr.appendChild(mytd)

		/*
		 * for (cluster_field in clusters[i]) {
		 * 
		 * var mytd = document.createElement("td") mytd.innerHTML =
		 * clusters[i][cluster_field] myTr.appendChild(mytd) }
		 */

		document.getElementById("form-list-question-body").appendChild(myTr)
	}

}

function save_question() {
	
	var table_data = new Array();
    
	$('#form-list-question-body tr').each(function(row, tr){
		table_data[row]={
	        "question_id" : $(tr).find('td:eq(0)').text(),
	        "correct_answer" : $(tr).find('option:selected').val(),
	    }
		
	}); 
	
	table_data = JSON.stringify(table_data)
	
	// console.log(table_data)
	
	call_ajax(SAVE,'questions='+table_data)
	
}
