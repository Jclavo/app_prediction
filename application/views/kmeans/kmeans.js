
var READ_ALL_TEST = 'READ_ALL_TEST'
var EXECUTE_KMEANS = 'EXECUTE_KMEANS'


var URL_READ_ALL_TEST = BASE_URL + '/test/get_test'
var URL_EXECUTE_KMEANS = BASE_URL + '/kmeans/execute_kmeans'
var URL_ANSWER = BASE_URL + '/answer/index'

var HISTOGRAMS_INFO
		
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
            display_clusters(data.clusters)
            display_students(data.students)
            display_histograms(data.total_alternatives,data.histograms)
            display_answers(data.answers)
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

function display_clusters(clusters) {
	
	// codigo para cargar los valores
	document.getElementById("form-list-kmeans-clusters").innerHTML = "";

	for (i = 0; i < clusters.length; i++) {

		var myTr = document.createElement("tr")

		for (cluster_field in clusters[i]) {

			var mytd = document.createElement("td")
			mytd.innerHTML = clusters[i][cluster_field]
			myTr.appendChild(mytd)

		}
		
		document.getElementById("form-list-kmeans-clusters").appendChild(myTr)
	}
	
}

function display_students(students) {
	
	// codigo para cargar los valores
	document.getElementById("form-list-kmeans-students").innerHTML = "";

	for (i = 0; i < students.length; i++) {

		var myTr = document.createElement("tr")

		for (student_field in students[i]) {

			var mytd = document.createElement("td")
			mytd.innerHTML = students[i][student_field]
			myTr.appendChild(mytd)

		}
		
		document.getElementById("form-list-kmeans-students").appendChild(myTr)
	}
	
}

function display_answers(answers) {
	
	// codigo para cargar los valores
	document.getElementById("form-list-kmeans-answers-body").innerHTML = "";

	for (i = 0; i < answers.length; i++) {

		var myTr = document.createElement("tr")

		for (answer_field in answers[i]) {

			if (answer_field != 'test_id') {
				var mytd = document.createElement("td")
				
				if (answer_field == 'matched') {
					var linkbtn = document.createElement("button")
					if (answers[i][answer_field] == 0) { //
						linkbtn.setAttribute("class", "btn btn-danger")
					}
					else {
						linkbtn.setAttribute("class", "btn btn-success")
					}
					
					mytd.appendChild(linkbtn)
				}
				else {
					
					mytd.innerHTML = answers[i][answer_field]
					
				}
				myTr.appendChild(mytd)	
			}
			
		}
		
		document.getElementById("form-list-kmeans-answers-body").appendChild(myTr)
	}
	
}


function display_histograms(total_alternatives,histograms) {
	
	HISTOGRAMS_INFO = histograms //Send info to global variable
	// codigo para cargar los valores
	//HTML Header

	var j = 1
	var mytd
	var myTr
	
	//document.getElementById("form-list-kmeans-histograms-header").innerHTML = "";
	
	while (j <= total_alternatives) {
		
		mytd = document.createElement("th")
		mytd.innerHTML = 'Option # ' + j
		document.getElementById("form-list-kmeans-histograms-header").appendChild(mytd)	
		
		if (j == total_alternatives) {
			mytd = document.createElement("th")
			mytd.innerHTML = 'Link' 
			document.getElementById("form-list-kmeans-histograms-header").appendChild(mytd)	
		}
		
		j = j + 1
		
	}
	
	
	document.getElementById("form-list-kmeans-histograms-body").innerHTML = "";
	
	j = 1;
	for (i = 0; i < histograms.length; i++) {

		/*switch (j) {
		case 0:
				myTr = document.createElement("tr")
				mytd = document.createElement("td")
				mytd.innerHTML = histograms[i]['question_id']
				myTr.appendChild(mytd)
				mytd = document.createElement("td")
				mytd.innerHTML = histograms[i]['question_description']
				myTr.appendChild(mytd)
			break;
		case total_alternatives:
		
			document.getElementById("form-list-kmeans-histograms-body").appendChild(myTr)
			j = -1
		break;

		default:
			mytd = document.createElement("td")
			mytd.innerHTML = histograms[i]['total_checked']
			myTr.appendChild(mytd)
			break;
		}
		
		j = j + 1;
		*/
		
		if (j == 1) {
			myTr = document.createElement("tr")
			mytd = document.createElement("td")
			mytd.innerHTML = histograms[i]['question_id']
			myTr.appendChild(mytd)
			mytd = document.createElement("td")
			mytd.innerHTML = histograms[i]['question_description']
			myTr.appendChild(mytd)
			mytd = document.createElement("td")
			mytd.innerHTML = histograms[i]['total_checked']
			myTr.appendChild(mytd)

		}
		else {
			if (j == total_alternatives) {
				
				mytd = document.createElement("td")
				mytd.innerHTML = histograms[i]['total_checked']
				myTr.appendChild(mytd)
								
				mytd = document.createElement("td")
				//var linkbtn = document.createElement("button")
				var linkbtn = document.createElement("a")
				linkbtn.innerHTML = "Show"
				linkbtn.setAttribute("class", "btn btn-primary")
				linkbtn.setAttribute("data-toggle", "modal")
				linkbtn.setAttribute("data-target", "#myModal")
				//linkbtn.setAttribute("id_question", histograms[i]['question_id'])
				linkbtn.setAttribute("onclick", "show_details_answer(" + histograms[i]['question_id'] + ");")
				
				onclick="SleepTime(2000);"
				
				//linkbtn.setAttribute("href", URL_GRADE + '/' + exam[i]['exam_id'] + '/' + exam[i]['course_id'])
				mytd.appendChild(linkbtn)
				myTr.appendChild(mytd)

				document.getElementById("form-list-kmeans-histograms-body").appendChild(myTr)
				j = 0
			}
			else {
				mytd = document.createElement("td")
				mytd.innerHTML = histograms[i]['total_checked']
				myTr.appendChild(mytd)
			}
		}
		j = j + 1
		
	}
	
}

/*
function show_details_answer(question_id) {
	
	document.getElementById("form-list-kmeans-histograms-details").innerHTML = "";

	for (i = 0; i < HISTOGRAMS_INFO.length; i++) {
		
		if (HISTOGRAMS_INFO[i]['question_id'] != question_id) {
			continue;
		}

		var myTr = document.createElement("tr")

		for (histogram_field in HISTOGRAMS_INFO[i]) {

			var mytd = document.createElement("td")
			mytd.innerHTML = HISTOGRAMS_INFO[i][histogram_field]
			myTr.appendChild(mytd)

		}
		
		document.getElementById("form-list-kmeans-histograms-details").appendChild(myTr)
	}
}
*/

function show_details_answer(question_id) {
	
	//document.getElementById("form-list-kmeans-histograms-details").innerHTML = "";
	
	array_labels = []
	array_data = []
	
	j = 1
	for (i = 0; i < HISTOGRAMS_INFO.length; i++) {
		
		if (HISTOGRAMS_INFO[i]['question_id'] != question_id) {
			continue;
		}

	   array_data.push(HISTOGRAMS_INFO[i]['total_checked'])
		
		array_labels.push('Option # '+j)
		
		j = j + 1
		
		//document.getElementById("form-list-kmeans-histograms-details").appendChild(myTr)
	}
	
	var ctx = document.getElementById("myChart").getContext('2d');
	  var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	      //labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
	      labels: array_labels,
	      datasets: [{
	        label: '# of Answers',
	        //data: [12, 19, 3, 5, 2, 3],
	        data: array_data,
	        backgroundColor: [
	          'rgba(255, 99, 132, 0.2)',
	          'rgba(54, 162, 235, 0.2)',
	          'rgba(255, 206, 86, 0.2)',
	          'rgba(75, 192, 192, 0.2)',
	          'rgba(153, 102, 255, 0.2)',
	          'rgba(255, 159, 64, 0.2)'
	        ],
	        borderColor: [
	          'rgba(255,99,132,1)',
	          'rgba(54, 162, 235, 1)',
	          'rgba(255, 206, 86, 1)',
	          'rgba(75, 192, 192, 1)',
	          'rgba(153, 102, 255, 1)',
	          'rgba(255, 159, 64, 1)'
	        ],
	        borderWidth: 1
	      }]
	    },
	    options: {
	      scales: {
	        yAxes: [{
	          ticks: {
	            beginAtZero: true
	          }
	        }]
	      }
	    }
	  });
}





