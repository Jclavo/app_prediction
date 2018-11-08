<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
<title>Student - CRUD</title>
<link
	href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css')?>"
	rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<!-- FORM  -->
			<div class="col-md-12">
				<form class="form-horizontal" id="form-edit-student">
					<fieldset>
						<!-- Form Name -->
						<legend>Student</legend>

						<!-- Text input-->
						<div class="form-group">
							<div class="col-md-4">
								<input id="student-id" name="student-id" type="hidden"
									placeholder="" class="form-control input-md" disabled>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="student-name">Name</label>
							<div class="col-md-4">
								<input id="student-name" name="student-name" type="text"
									placeholder="your student's name" class="form-control input-md"
									required>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="student-lastname">LastName</label>
							<div class="col-md-4">
								<input id="student-lastname" name="student-lastname" type="text"
									placeholder="your student's lastname"
									class="form-control input-md" required>
							</div>
						</div>

						<!-- Prepended text-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="student-cellphone">cellphone
								Number</label>
							<div class="col-md-4">
								<div class="input-group">
									<input id="student-cellphone" name="student-cellphone"
										class="form-control" type="text"
										placeholder="your student's cellphone">
								</div>
							</div>
						</div>

						<!-- Prepended text-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="student-course">Courses</label>
							<div class="col-md-4">
								<div class="input-group">
									<select 
										class="form-control" id="student-course">
									</select>
								</div>
							</div>
						</div>
						<!-- Button -->

					</fieldset>
				</form>
				<div class="form-group">
					<label class="col-md-4 control-label" for="btn-save"></label>
					<div class="col-md-4" id="saveupdate">
						<button id="btn-save" name="btn-save" class="btn btn-success"
							onclick="add_student()">Save</button>
					</div>
				</div>
			</div>

			<!-- LIST -->
			<div class=col-md-12>
				List of students
				<table class="table table-bordered table-condensed table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Lastname</th>
							<th>Cellphone</th>
							<th>Course id</th>
							<th>Course</th>
							<th>Actions</th>
						</tr>

					</thead>
					<tbody id="form-list-student-body">

					</tbody>
				</table>
			</div>
			<br> 
			<!-- view -->
		</div>
	</div>
	<script>
  		var BASE_URL = <?php echo json_encode(site_url()); ?>;</script>
	<script
		src="<?php echo base_url('assets/js/jquery/jquery-3.3.1.min.js')?>"></script>
	<script
		src="<?php echo base_url('assets/js/bootstrap/bootstrap.min.js')?>"></script>
	<script
		src="<?php echo base_url('application/views/student/student.js')?>"></script>

</body>
</html>