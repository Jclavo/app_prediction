
var READ_ALL_TEST = 'READ_ALL_TEST'
var READ_QUESTIONS_BY_TEST = 'READ_QUESTIONS_BY_TEST'
var SAVE     = 'SAVE'

var URL_READ_ALL_TEST = BASE_URL + '/test/get_test'
var URL_READ_QUESTIONS_BY_TEST = BASE_URL + '/question/get_questions'
var URL_SAVE = BASE_URL + '/question/update_correct_answer'

		
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

	case READ_QUESTIONS_BY_TEST:
		url_operation = URL_READ_QUESTIONS_BY_TEST
		break;
	case READ_ALL_TEST:
		url_operation = URL_READ_ALL_TEST
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
	
	}).done(function(data) {
		console.log(data)
		
		switch (operation) {
		case READ_ALL_TEST:
            //alert(data.test)
            select_tests(data.test)
			break
		case READ_QUESTIONS_BY_TEST:
            //alert(data.test)
            display_questions(data.questions,data.test)
			//call_ajax(READ_ALL,global_test)
		case SAVE:
            //alert(data.test)
            //display_questions(data.questions,data.test)
			call_ajax(READ_ALL_TEST,global_data)
			break
		}
	});

}

function select_tests(test){
	// codigo para cargar los valores
	document.getElementById("correct_question-test").innerHTML = "";
	
	for (i = 0; i < test.length; i++) {
		var myTr = document.createElement("option")
		myTr.innerHTML = test[i]['description']
		myTr.setAttribute("value", test[i]['test_id'])
		document.getElementById("correct_question-test").appendChild(myTr)
	}	
}

function display_questions(questions,test) {
	
	// codigo para cargar los valores
	
	total_alternative = test[0]['total_alternative']
	//total_alternative = 5
	
	document.getElementById("form-list-correct_question-body").innerHTML = "";

	for (i = 0; i < questions.length; i++) {

		var myTr = document.createElement("tr")

		for (question_field in questions[i]) {
			
			var mytd = document.createElement("td")

			if (question_field == "correct")
			{
				var myselect = document.createElement("select")
				myselect .setAttribute("name", 'select' + questions[i]['answer_id'])
				
				for (j = 0; j <= total_alternative; j++) {
					
					var myoption = document.createElement("option")
					myoption.innerHTML = 'Option ' + j 
					myoption.setAttribute("value", j)
					
					if ( questions[i][question_field] == j )
					{
						myoption.setAttribute("selected", 1)
					}
					
					myselect.appendChild(myoption)
				}
				
				mytd.appendChild(myselect)

			}
			else
			{//			input
				//if (question_field !== "predict" || question_field !== "test_id") {
				//if (question_field !== "predict") {
				mytd.innerHTML = questions[i][question_field]
				//}
				
			}
			
			myTr.appendChild(mytd)
			

		}
	
		document.getElementById("form-list-correct_question-body").appendChild(myTr)
	}
	
}

function show_questions() {
	
	global_data.test_id  = document.getElementById("correct_question-test").value
	
	if(global_data.test_id == '')
	{
		alert('Fulfill required fields')
	}
	else{
		call_ajax(READ_QUESTIONS_BY_TEST,global_data)
	}
	
}

function save_questions() {

	var table_data = new Array();
    
	$('#form-list-correct_question-body tr').each(function(row, tr){
		table_data[row]={
	        "question_id" : $(tr).find('td:eq(0)').text(),
	        "correct" : $(tr).find('option:selected').val(),
	    }
		
	}); 
	
	table_data = JSON.stringify(table_data)
	
	console.log(table_data)
	
	call_ajax(SAVE,'questions='+table_data)
	
}

