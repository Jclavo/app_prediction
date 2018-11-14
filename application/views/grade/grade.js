
var READ_ALL = 'READ_ALL'
var SAVE     = 'SAVE'

var URL_SAVE 	 = BASE_URL + '/grade/update_grade'
var URL_READ_ALL = BASE_URL + '/grade/get_grade'

//var URL_READ_ALL_COURSE = BASE_URL + '/course/get_course'

var global_info = {
	course_id : '',
	exam_id   : ''
}

$(document).ready(function() {
	
	global_info.course_id  = document.getElementById("course-id").value
	global_info.exam_id  = document.getElementById("exam-id").value
	call_ajax(READ_ALL,global_info);

});

function save_grade() {

	var table_data = new Array();
    
	$('#form-list-grade-body tr').each(function(row, tr){
		table_data[row]={
	        "student_id" : $(tr).find('td:eq(1)').text(),
	        "grade" :$(tr).find("input:text,select").val(),
	        "exam_id" : document.getElementById("exam-id").value
	    }
		
	}); 
	
	table_data = JSON.stringify(table_data)
	
//	console.log(table_data)
	
	call_ajax(SAVE,'grade='+table_data)
	
}


function call_ajax(operation, data_input) {

	var url_operation

	switch (operation) {
	case READ_ALL:
		url_operation = URL_READ_ALL
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
		// alert(data.grade);
		console.log(data)
		
		switch (operation) {
		case READ_ALL:
			display_grades(data.grade)
			display_course(data.course)
			display_exam(data.exam)
			break
		case SAVE:
			call_ajax(READ_ALL,global_info)
			break

		}
	});

}

function display_grades(grade) {
	
	//codigo para el boton cambie de nombre a SAVE
	var crbtn = document.createElement("button")
	crbtn.innerHTML = "Save";
	crbtn.setAttribute("onclick", "save_grade()")
	crbtn.setAttribute("class", "btn btn-sm btn-success")
	document.getElementById("saveupdate").innerHTML = ""
	document.getElementById("saveupdate").appendChild(crbtn);
	
	// codigo para cargar los valores
	document.getElementById("form-list-grade-body").innerHTML = "";

	for (i = 0; i < grade.length; i++) {

		var myTr = document.createElement("tr")

		for (grade_field in grade[i]) {

			var mytd = document.createElement("td")
			
			if (grade_field == 'score')
			{
				var myinput = document.createElement("input")
				myinput.setAttribute("value", grade[i][grade_field])
				mytd.appendChild(myinput)
			}
			else
			{//			input
				
				mytd.innerHTML = grade[i][grade_field]
			}
				
			myTr.appendChild(mytd)

		}
		var actionTd = document.createElement("td")
		
		var editBtn = document.createElement("button")
		editBtn.innerHTML = "Edit"
		editBtn.setAttribute("class", "btn btn-sm btn-primary")
		editBtn.setAttribute("onclick", "edit_grade(" + grade[i]['grade_id'] + ")")

		var deletebtn = document.createElement("button")
		deletebtn.innerHTML = "Delete"
		deletebtn.setAttribute("class", "btn btn-sm btn-danger")
		deletebtn.setAttribute("onclick", "delete_grade(" + grade[i]['grade_id'] + ")")

		actionTd.appendChild(editBtn)
		actionTd.appendChild(deletebtn)
		myTr.appendChild(actionTd)
		
		document.getElementById("form-list-grade-body").appendChild(myTr)
	}
	
}

function display_course(course) {
	document.getElementById("course-description").value = course[0]['description']
}

function display_exam(exam) {
	document.getElementById("exam-description").value = exam[0]['description']
}
