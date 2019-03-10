
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
            display_clusters(data.clusters)
            display_students(data.students)
            display_histograms(data.total_alternatives,data.histograms)
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

function display_histograms(total_alternatives,histograms) {
	
	// codigo para cargar los valores
	//HTML Header
/*	<th>question id</th>
							<th>question</th>
							<th>option id</th>
							<th>option</th>
							<th>Total choosen</th>
							<th>Sum cluster</th>
							<th>Percentage</th>
*/
	/*document.getElementById("form-list-kmeans-histograms").innerHTML = "";

	for (i = 0; i < histograms.length; i++) {

		var myTr = document.createElement("tr")

		for (histogram_field in histograms[i]) {

			var mytd = document.createElement("td")
			mytd.innerHTML = histograms[i][histogram_field]
			myTr.appendChild(mytd)

		}
		
		document.getElementById("form-list-kmeans-histograms").appendChild(myTr)
	}

	
	*/
	

	
	var j = 1
	var mytd
	var myTr
	
	while (j <= total_alternatives) {
		
		mytd = document.createElement("th")
		mytd.innerHTML = 'Option # ' + j
		document.getElementById("form-list-kmeans-histograms-header").appendChild(mytd)	
		
		j = j + 1
		
	}
	
	
	document.getElementById("form-list-kmeans-histograms-body").innerHTML = "";
	
	j = 0;
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
		
		if (j == 0) {
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
				document.getElementById("form-list-kmeans-histograms-body").appendChild(myTr)
				j = -1
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




