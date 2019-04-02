var READ_ALL_TEST = 'READ_ALL_TEST'
var EXECUTE_KMEANS = 'EXECUTE_KMEANS'

var URL_READ_ALL_TEST = BASE_URL + '/test/get_test'
var URL_EXECUTE_KMEANS = BASE_URL + '/kmeans/execute_kmeans'
var URL_ANSWER = BASE_URL + '/answer/index'

var HISTOGRAMS_INFO

var list_borderColor = [ 'rgba(255,  99, 132,1)', 
						 'rgba( 54, 162, 235, 1)',
						 'rgba(255, 206,  86, 1)', 
						 'rgba( 75, 192, 192, 1)',
						 'rgba(153, 102, 255, 1)',
						 'rgba(255, 159,  64, 1)' ]

var list_backgroundColor = [ 'rgba(255,  99, 132, 0.2)',
							 'rgba( 54, 162, 235, 0.2)', 
							 'rgba(255, 206,  86, 0.2)',
							 'rgba( 75, 192, 192, 0.2)',
							 'rgba(153, 102, 255, 0.2)',
							 'rgba(255, 159,  64, 0.2)' ]

var global_data = {
	id : '',
	test_id : '',
	cluster_number : ''
}

$(document).ready(function() {
	call_ajax(READ_ALL_TEST, global_data);

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
			// alert(data.test)
			select_tests(data.test)
			break
		case EXECUTE_KMEANS:
			// alert(data.test)
			display_clusters(data.clusters)
			display_students(data.students)
			display_students_graph(data.students)
			display_histograms(data.total_alternatives, data.histograms)
			display_answers(data.answers)
			// call_ajax(READ_ALL,global_test)
			break
		}
	});

}

function select_tests(test) {
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

	global_data.test_id = document.getElementById("kmeans-test").value
	global_data.cluster_number = document.getElementById("kmeans-cluster_number").value

	if (global_data.test_id == '' && global_data.cluster_number == '' ) {
		alert('Fulfill required fields')
	} else {
		call_ajax(EXECUTE_KMEANS, global_data)
	}

}

function display_clusters(clusters) {

	// codigo para cargar los valores
	/*
	 * document.getElementById("form-list-kmeans-clusters").innerHTML = "";
	 * 
	 * for (i = 0; i < clusters.length; i++) {
	 * 
	 * var myTr = document.createElement("tr")
	 * 
	 * for (cluster_field in clusters[i]) {
	 * 
	 * var mytd = document.createElement("td") mytd.innerHTML =
	 * clusters[i][cluster_field] myTr.appendChild(mytd)
	 *  }
	 * 
	 * document.getElementById("form-list-kmeans-clusters").appendChild(myTr) }
	 */

	var myDiv
	var myP
	var myTable
	var myHead
	var myTr
	var myTh
	var myBody
	
	var alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"

	document.getElementById("clusters").innerHTML = "";
	for (i = 1; i < clusters.length; i++) {

		myDiv = document.createElement("div")
		myDiv.setAttribute("class", "col-md-12")
		myP = document.createElement("p")
		myP.innerHTML = 'Cluster ' + i

		myTable = document.createElement("table")
		myTable.setAttribute("class",
				"table table-bordered table-condensed table-hover")

		// Create Table Header
		myHead = document.createElement("thead")
		myTr = document.createElement("tr")
		myTh = document.createElement("th")
		myTh.innerHTML = 'Value'
		myTr.appendChild(myTh)
		myTh = document.createElement("th")
		myTh.innerHTML = 'Letter'
		myTr.appendChild(myTh)
		myHead.appendChild(myTr)
		myTable.appendChild(myHead)

		// Create Table Body
		myBody = document.createElement("tbody")
		myBody.setAttribute("id", "form-list-kmeans-clusters" + i)

	
		for (j = 0; j < clusters[i].length; j++) {

			myTr = document.createElement("tr")

			for (cluster_field in clusters[i][j]) {

				mytd = document.createElement("td")
				mytd.innerHTML = clusters[i][j][cluster_field]
				myTr.appendChild(mytd)

			}
			
			myBody.appendChild(myTr)
		}
		
		myTable.appendChild(myBody)

		myDiv.appendChild(myP)
		myDiv.appendChild(myTable)

		
		document.getElementById("clusters").appendChild(myDiv)

	}

}

function display_students(students) {

	// codigo para cargar los valores
	/*document.getElementById("form-list-kmeans-students").innerHTML = "";

	for (i = 0; i < students.length; i++) {

		var myTr = document.createElement("tr")

		for (student_field in students[i]) {

			var mytd = document.createElement("td")
			mytd.innerHTML = students[i][student_field]
			myTr.appendChild(mytd)

		}

		document.getElementById("form-list-kmeans-students").appendChild(myTr)
	}*/
	
	var myDiv
	var myP
	var myTable
	var myHead
	var myTr
	var myTh
	var myBody

	document.getElementById("students").innerHTML = "";
	for (i = 1; i < students.length; i++) {

		myDiv = document.createElement("div")
		myDiv.setAttribute("class", "col-md-12")
		myP = document.createElement("p")
		myP.innerHTML = 'Cluster ' + i

		myTable = document.createElement("table")
		myTable.setAttribute("class",
				"table table-bordered table-condensed table-hover")

		// Create Table Header
		myHead = document.createElement("thead")
		myTr = document.createElement("tr")
		
		//Add Column  => Id
		myTh = document.createElement("th")
		myTh.innerHTML = 'Id'
		myTr.appendChild(myTh)
		
		//Add Column  => Name
		myTh = document.createElement("th")
		myTh.innerHTML = 'Name'
		myTr.appendChild(myTh)
		
		//Add Column  => Average
		myTh = document.createElement("th")
		myTh.innerHTML = 'Average'
		myTr.appendChild(myTh)
		
		//Add Column  => Cluster
		myTh = document.createElement("th")
		myTh.innerHTML = 'Cluster'
		myTr.appendChild(myTh)
		
		//Add Column  => Cluster value 
		myTh = document.createElement("th")
		myTh.innerHTML = 'Cluster Value'
		myTr.appendChild(myTh)
		
		//Add Column  => Index Cluster
		myTh = document.createElement("th")
		myTh.innerHTML = 'Index Cluster'
		myTr.appendChild(myTh)
		
		//Load Header
		myHead.appendChild(myTr)
		myTable.appendChild(myHead)

		// Create Table Body
		myBody = document.createElement("tbody")
		myBody.setAttribute("id", "form-list-kmeans-students" + i)

		for (j = 0; j < students[i].length; j++) {

			myTr = document.createElement("tr")

			for (student_field in students[i][j]) {

				mytd = document.createElement("td")
				mytd.innerHTML = students[i][j][student_field]
				myTr.appendChild(mytd)

			}
			
			myBody.appendChild(myTr)
		}
		
		myTable.appendChild(myBody)

		myDiv.appendChild(myP)
		myDiv.appendChild(myTable)

		document.getElementById("students").appendChild(myDiv)

	}
	
}

function display_students_graph(students) {
	
	var myDiv
	var myP
	var myCanvas
	
	document.getElementById("students-graph").innerHTML = "";

	
	//for (i = 1; i < students.length; i++) {
	for (i = 0; i < 2; i++) {
		
		myDiv = document.createElement("div")
		myDiv.setAttribute("class", "col-md-12")
		myP = document.createElement("p")
		myP.innerHTML = 'Cluster ' + i
		
		myCanvas = document.createElement("canvas")
		myCanvas.setAttribute("id", "scatterChart" + i)
		myCanvas.setAttribute("width","500")
		myCanvas.setAttribute("height","200")
		
		myDiv.appendChild(myP)
		myDiv.appendChild(myCanvas)

		document.getElementById("students-graph").appendChild(myDiv)
		
		var array_dataset = []
		var average_value = 0
		var cluster_center = 0
		var k = 0

		while (k < global_data.cluster_number) {
			
			var array_data = []
			
			for (j = 0; j < students[i].length; j++) {
						
				if (k == students[i][j]["index_cluster"]) {
					average_value = students[i][j]["average"]
					cluster_center = students[i][j]["cluster_value"]
					array_data.push({x:average_value, y:average_value});
					
				}
			}
			
		
			array_dataset.push({
				borderColor: list_borderColor[k],
				backgroundColor : list_backgroundColor[k],
				//label : 'Cluster ' + i,
				label : 'Cluster ' + cluster_center,
				data : array_data
			})
			
			
			k = k + 1
		}
		
		
		var ctxSc = 'ctxSc' + i
		
		ctxSc = document.getElementById("scatterChart" + i).getContext('2d');
		  var scatterData = {
		    datasets: array_dataset
		  }

		  	var xd = 'config' + i;
		  	xd = new Chart.Scatter(ctxSc, {
		    data: scatterData,
		    options: {
		      title: {
		        display: true,
		        text: 'Cluster # ..'
		      },
		      scales: {
		        xAxes: [{
		          type: 'linear',
		          position: 'bottom',
		          scaleLabel: {
		            labelString: 'X',
		            display: true,
		          }
		        }],
		        yAxes: [{
		          type: 'linear',
		          scaleLabel: {
		            labelString: 'Y',
		            display: true
		          }
		        }]
		      }
		    }
		  }); 
		  	
		// return;
			

	}
	
}

function display_answers(answers) {

	// codigo para cargar los valores
	document.getElementById("form-list-kmeans-answers-body").innerHTML = "";
	
	total_questions = answers.length
	correct_answers = 0
	//incorrect_answers = 0
	
	for (i = 0; i < total_questions; i++) {

		var myTr = document.createElement("tr")

		for (answer_field in answers[i]) {

			if (answer_field != 'test_id') {
				var mytd = document.createElement("td")

				if (answer_field == 'matched') {
					var linkbtn = document.createElement("button")
					if (answers[i][answer_field] == 0) { //
						linkbtn.setAttribute("class", "btn btn-danger")
						//incorrect_answers = incorrect_answers + 1
					} else {
						linkbtn.setAttribute("class", "btn btn-success")
						correct_answers = correct_answers + 1
					}

					mytd.appendChild(linkbtn)
				} else {

					mytd.innerHTML = answers[i][answer_field]

				}
				myTr.appendChild(mytd)
			}

		}

		document.getElementById("form-list-kmeans-answers-body").appendChild(
				myTr)
	}
	
	
	//Display Percent (Correct and incorrect Answers)
	percentage_correct = (correct_answers / total_questions ) * 100
	percentage_incorrect = 100 - percentage_correct
	
	var ctxP = document.getElementById("pieChart").getContext('2d');
	  var myPieChart = new Chart(ctxP, {
	    type: 'pie',
	    data: {
	      labels: ["Incorrect", "Correct"],
	      datasets: [{
	        data: [percentage_incorrect, percentage_correct],
	        backgroundColor: ["#F7464A", "#46BFBD"],
	        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
	      }]
	    },
	    options: {
	      responsive: true
	    }
	  });

}

function display_histograms(total_alternatives, histograms) {

	HISTOGRAMS_INFO = histograms // Send info to global variable
	// codigo para cargar los valores
	// HTML Header

	var j = 1
	var mytd
	var myTr

	// document.getElementById("form-list-kmeans-histograms-header").innerHTML =
	// "";

	while (j <= total_alternatives) {

		mytd = document.createElement("th")
		mytd.innerHTML = 'Option # ' + j
		document.getElementById("form-list-kmeans-histograms-header")
				.appendChild(mytd)

		if (j == total_alternatives) {
			mytd = document.createElement("th")
			mytd.innerHTML = 'Link'
			document.getElementById("form-list-kmeans-histograms-header")
					.appendChild(mytd)
		}

		j = j + 1

	}

	document.getElementById("form-list-kmeans-histograms-body").innerHTML = "";

	j = 1;
	for (i = 0; i < histograms.length; i++) {

		/*
		 * switch (j) { case 0: myTr = document.createElement("tr") mytd =
		 * document.createElement("td") mytd.innerHTML =
		 * histograms[i]['question_id'] myTr.appendChild(mytd) mytd =
		 * document.createElement("td") mytd.innerHTML =
		 * histograms[i]['question_description'] myTr.appendChild(mytd) break;
		 * case total_alternatives:
		 * 
		 * document.getElementById("form-list-kmeans-histograms-body").appendChild(myTr)
		 * j = -1 break;
		 * 
		 * default: mytd = document.createElement("td") mytd.innerHTML =
		 * histograms[i]['total_checked'] myTr.appendChild(mytd) break; }
		 * 
		 * j = j + 1;
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

		} else {
			if (j == total_alternatives) {

				mytd = document.createElement("td")
				mytd.innerHTML = histograms[i]['total_checked']
				myTr.appendChild(mytd)

				mytd = document.createElement("td")
				// var linkbtn = document.createElement("button")
				var linkbtn = document.createElement("a")
				linkbtn.innerHTML = "Show"
				linkbtn.setAttribute("class", "btn btn-primary")
				linkbtn.setAttribute("data-toggle", "modal")
				linkbtn.setAttribute("data-target", "#myModal")
				// linkbtn.setAttribute("id_question",
				// histograms[i]['question_id'])
				linkbtn.setAttribute("onclick", "show_details_answer("
						+ histograms[i]['question_id'] + ");")

				onclick = "SleepTime(2000);"

				// linkbtn.setAttribute("href", URL_GRADE + '/' +
				// exam[i]['exam_id'] + '/' + exam[i]['course_id'])
				mytd.appendChild(linkbtn)
				myTr.appendChild(mytd)

				document.getElementById("form-list-kmeans-histograms-body")
						.appendChild(myTr)
				j = 0
			} else {
				mytd = document.createElement("td")
				mytd.innerHTML = histograms[i]['total_checked']
				myTr.appendChild(mytd)
			}
		}
		j = j + 1

	}

}

/*
 * function show_details_answer(question_id) {
 * 
 * document.getElementById("form-list-kmeans-histograms-details").innerHTML =
 * "";
 * 
 * for (i = 0; i < HISTOGRAMS_INFO.length; i++) {
 * 
 * if (HISTOGRAMS_INFO[i]['question_id'] != question_id) { continue; }
 * 
 * var myTr = document.createElement("tr")
 * 
 * for (histogram_field in HISTOGRAMS_INFO[i]) {
 * 
 * var mytd = document.createElement("td") mytd.innerHTML =
 * HISTOGRAMS_INFO[i][histogram_field] myTr.appendChild(mytd)
 *  }
 * 
 * document.getElementById("form-list-kmeans-histograms-details").appendChild(myTr) } }
 */

function show_details_answer(question_id) {

	// document.getElementById("form-list-kmeans-histograms-details").innerHTML
	// = "";

	array_labels = []
	array_data = []
	array_data_percent = []

	j = 1
	for (i = 0; i < HISTOGRAMS_INFO.length; i++) {

		if (HISTOGRAMS_INFO[i]['question_id'] != question_id) {
			continue;
		}

		array_data.push(HISTOGRAMS_INFO[i]['total_checked'])
		
		array_data_percent.push(HISTOGRAMS_INFO[i]['percentage'])
		
		array_labels.push('Option # ' + j)

		j = j + 1

		// document.getElementById("form-list-kmeans-histograms-details").appendChild(myTr)
	}

	//TOTAL ANSWERS CHART
	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
		type : 'bar',
		data : {
			// labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
			labels : array_labels,
			datasets : [ {
				label : '# of Answers',
				// data: [12, 19, 3, 5, 2, 3],
				data : array_data,
				/*backgroundColor : [ 'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)' ],
				borderColor : [ 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)' ],*/
				backgroundColor : list_backgroundColor,
				borderColor : list_borderColor,
				borderWidth : 1
			} ]
		},
		options : {
			scales : {
				yAxes : [ {
					ticks : {
						beginAtZero : true
					}
				} ]
			}
		}
	});
	
	//PERCENTAGE ANSWERS CHART
	//polar
	  var ctxPA = document.getElementById("polarChart").getContext('2d');
	  var myPolarChart = new Chart(ctxPA, {
	    type: 'polarArea',
	    data: {
	      labels: array_labels,
	      datasets: [{
	        data: array_data_percent,
	        /*backgroundColor: ['rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)'
	        ],
	        hoverBackgroundColor: ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)',
				'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)',
				'rgba(153, 102, 255, 1)'
	        ]*/
	        backgroundColor: list_borderColor,
	        hoverBackgroundColor: list_backgroundColor
	      }]
	    },
	    options: {
	      responsive: true
	    }
	  });
}
