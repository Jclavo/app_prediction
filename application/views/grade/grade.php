<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
<title>grade - CRUD</title>
<link
	href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css')?>"
	rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<!-- FORM  -->
			<div class="col-md-12">
				<form class="form-inline" id="form-edit-grade">
						<!-- Form Name -->
						<legend>Assign grades to student</legend>

						<!-- Text input-->
						<div class="form-group">
							<div class="col-md-4">
								<input id="course-id" name="course-id" type="hidden"
									class="form-control input-md" 
									value="<?php echo $course_id;?>" disabled>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group row">
							<label class="col-md-4 control-label" for="course-description"><b>Course:</b></label>
							<div class="col-md-8">
								<input id="course-description" name="course-description" type="text"
									   class="form-control-plaintext">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-4">
								<input id="exam-id" name="exam-id" type="hidden"
									class="form-control input-md" 
									value="<?php echo $exam_id;?>" disabled>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group row">
							<label class="col-md-4 control-label" for="exam-description"><b>Exam:</b></label>
							<div class="col-md-8">
								<input id="exam-description" name="exam-description" type="text"
									   class="form-control-plaintext">
							</div>
						</div>
						<!-- Button -->
				</form>
				<div class="form-group">
					<label class="col-md-4 control-label" for="btn-save"></label>
					<div class="col-md-4" id="saveupdate">
						<button id="btn-save" name="btn-save" class="btn btn-success"
							onclick="add_grade()">Save</button>
					</div>
				</div>
			</div>

			<!-- LIST -->
			<div class=col-md-12>
				List of grades
				<table class="table table-bordered table-condensed table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Student Id</th>
							<th>Student</th>
							<th>Grade</th>
						</tr>

					</thead>
					<tbody id="form-list-grade-body">

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
		src="<?php echo base_url('application/views/grade/grade.js')?>"></script>

</body>
</html>