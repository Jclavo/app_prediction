var CREATE   = 'CREATE'
var READ_ALL = 'READ_ALL'
var DELETE 	 = 'DELETE'
var UPDATE 	 = 'UPDATE'
var READ 	 = 'READ'

var URL_CREATE 	 = BASE_URL + '/student/create_student'
var URL_READ_ALL = BASE_URL + '/student/get_student'
var URL_DELETE 	 = BASE_URL + '/student/delete_student'
var URL_UPDATE 	 = BASE_URL + '/student/update_student'
		
var global_student = {
		id : '',
		name : '',
		lastname : '',
	    cellphone : ''
	}


$(document).ready(function() {
	global_student.clear
	call_ajax(READ_ALL,global_student);

});

function add_student() {

	clear_global_student()
	global_student.name  = document.getElementById("student-name").value
	global_student.lastname  = document.getElementById("student-lastname").value
	global_student.cellphone  = document.getElementById("student-cellphone").value

	if(required_field(global_student.name,global_student.lastname))
	{
		call_ajax(CREATE,global_student);
	}
	
}

//Editing student
function edit_student(id_student) {

	clear_global_student()
	global_student.id = id_student
	call_ajax(READ,global_student)
	
}

//Updating student
function update_student() {
	
	clear_global_student()
	global_student.id 	  = document.getElementById("student-id").value
	global_student.name  = document.getElementById("student-name").value
	global_student.lastname  = document.getElementById("student-lastname").value
	global_student.cellphone  = document.getElementById("student-cellphone").value
	
	if(required_field(global_student.name,global_student.lastname))
	{
		call_ajax(UPDATE,global_student);
	}
	
	
}

// deleting student
function delete_student(id_student) {

	clear_global_student()
	global_student.id = id_student
	
	call_ajax(DELETE,global_student)
}

function call_ajax(operation, data_input) {
	/*
	 * $.ajax({ //data : parametros, url :
	 * favor..."); }, success : function(response) {
	 * //$("#resultado").html(response); alert(response);
	 * //alert(response['student']); //students = response; //alert(students.student); } });
	 */
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
		// alert(data.student);
		console.log(data)
		
		clear_global_student()
		switch (operation) {
		case CREATE:
			alert(data.status)
			call_ajax(READ_ALL,global_student)
			break
		case READ_ALL:
			display_students(data.student)
			break
		case DELETE:
			alert(data.status)
			call_ajax(READ_ALL,global_student)
			break;
		case READ:
			display_student(data.student)
			break
		case UPDATE:
			alert(data.status)
			call_ajax(READ_ALL,global_student)
			break
		default:
			break
		}
	});

}

function display_students(student) {
	
	//codigo para el boton cambie de nombre a SAVE
	var crbtn = document.createElement("button")
	crbtn.innerHTML = "Save";
	crbtn.setAttribute("onclick", "add_student()")
	crbtn.setAttribute("class", "btn btn-sm btn-success")
	document.getElementById("saveupdate").innerHTML = ""
	document.getElementById("saveupdate").appendChild(crbtn);
	
	// codigo para cargar los valores
	document.getElementById("form-list-student-body").innerHTML = "";

	for (i = 0; i < student.length; i++) {

		var myTr = document.createElement("tr")

		for (student_field in student[i]) {

			var mytd = document.createElement("td")
			mytd.innerHTML = student[i][student_field]
			myTr.appendChild(mytd)

		}
		var actionTd = document.createElement("td")
		
		var editBtn = document.createElement("button")
		editBtn.innerHTML = "Edit"
		editBtn.setAttribute("class", "btn btn-sm btn-primary")
		editBtn.setAttribute("onclick", "edit_student(" + student[i]['student_id'] + ")")

		var deletebtn = document.createElement("button")
		deletebtn.innerHTML = "Delete"
		deletebtn.setAttribute("class", "btn btn-sm btn-danger")
		deletebtn.setAttribute("onclick", "delete_student(" + student[i]['student_id'] + ")")

		actionTd.appendChild(editBtn)
		actionTd.appendChild(deletebtn)
		myTr.appendChild(actionTd)
		
		document.getElementById("form-list-student-body").appendChild(myTr)
	}
	
	document.getElementById("student-id").value = "";
	document.getElementById("student-name").value = "";
	document.getElementById("student-lastname").value = "";
	document.getElementById("student-cellphone").value = "";


}

function display_student(student) {
	
	var updatebtn = document.createElement("button")
	updatebtn.innerHTML = "Update";
	updatebtn.setAttribute("class", "btn btn-sm btn-success")
	updatebtn.setAttribute("onclick", "update_student()")

	document.getElementById("saveupdate").innerHTML = ""
	document.getElementById("saveupdate").appendChild(updatebtn)
	document.getElementById("student-id").value = student[0]['student_id']
	document.getElementById("student-name").value = student[0]['name']
	document.getElementById("student-lastname").value = student[0]['lastname']
	document.getElementById("student-cellphone").value = student[0]['cellphone']

}

function clear_global_student() {
	
	global_student.id	  = ''
	global_student.name  = ''
    global_student.lastname  = ''
    global_student.cellphone  = ''

}

function required_field(name,lastname){
	
	if (name == '' || lastname == '' )
	{
		alert('Fulfill required fields')
		return false
	}
	return true
}

/*
 * function call_ajax() {
 * 
 * $.ajax({ data : parametros, url : 'ejemplo_ajax_proceso.php', type : 'post',
 * beforeSend : function() { $("#resultado").html("Procesando, espere por
 * favor..."); }, success : function(response) { $("#resultado").html(response); }
 * }); }
 */