<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
<title>student_course - CRUD</title>
<link
	href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css')?>"
	rel="stylesheet">
</head>
<body>
	<div class="container">
		<!-- Text input-->
		<div class="form-group">
			<div class="col-md-4">
				<input id="student_course-id" name="student_course-id" type="hidden"
					placeholder="" class="form-control input-md" disabled>
			</div>
		</div>
		
		<div class="row">
			<!-- FORM  -->
			<div class="col-md-12">
				<form class="form-inline" id="form-edit-student_course">
						<!-- Form Name -->
						<legend><b>Enroll students in a course</b></legend>

						
						<!-- Prepended text-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="student_course-student"><b>Students:</b></label>
							<div class="col-md-8">
								<div class="input-group">
									<select 
										class="form-control" id="student_course-student">
									</select>
								</div>
							</div>
						</div>

						<!-- Prepended text-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="student_course-course"><b>Courses:</b></label>
							<div class="col-md-8">
								<div class="input-group">
									<select 
										class="form-control" id="student_course-course">
									</select>
								</div>
							</div>
						</div>
						<!-- Button -->
				</form>
				<div class="form-group">
					<label class="col-md-4 control-label" for="btn-save"></label>
					<div class="col-md-4" id="saveupdate">
						<button id="btn-save" name="btn-save" class="btn btn-success"
							onclick="add_student_course()">Save</button>
					</div>
				</div>
			</div>

			<!-- LIST -->
			<div class=col-md-12>
				<b>List of students registers in courses</b>
				<table class="table table-bordered table-condensed table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Student id</th>
							<th>Student</th>
							<th>Course id</th>
							<th>Course</th>
							<th>Actions</th>
						</tr>

					</thead>
					<tbody id="form-list-student_course-body">

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
		src="<?php echo base_url('assets/js/notify/notify.min.js')?>"></script>
	<script
		src="<?php echo base_url('application/views/student_course/student_course.js')?>"></script>

</body>
</html>