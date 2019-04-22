<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
<title>course - CRUD</title>
<link
	href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css')?>"
	rel="stylesheet">
</head>
<body>
	<div class="container">
    	<!-- FORM  -->
    	<!-- Text input-->
    	<div class="form-group">
    		<div class="col-md-3">
    			<input id="course-id" name="course-id" type="hidden"
    				placeholder="" class="form-control input-md" disabled>
    		</div>
    	</div>
		<div class="row">

			<div class="col-md-12">
				<form class="form-inline" id="form-edit-course">
						<!-- Form description -->
						<legend>Course</legend>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="course-description">Description</label>
							<div class="col-md-3">
								<input id="course-description" name="course-description" type="text"
									placeholder="your course's description" class="form-control input-md" required>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="course-started_date">Started Date</label>
							<div class="col-md-3">
								<input id="course-started_date" name="course-started_date" type="date"
									placeholder="your course's started date"
									class="form-control input-md" required>
							</div>
						</div>
						
						<!-- Select  -->
						<div class="form-group">
							<label class="col-md-3 control-label" for="course-course">Courses</label>
							<div class="col-md-9">
								<div class="input-group">
									<select 
										class="form-control" id="course-course">
									</select>
								</div>
							</div>
						</div>

						<!-- Button -->
				</form>
				<div class="form-group">
					<label class="col-md-6 control-label" for="btn-save"></label>
					<div class="col-md-6" id="saveupdate">
						<button id="btn-save" name="btn-save" class="btn btn-success btn-lg"
							onclick="add_course()">Save</button>
					</div>
				
    				<div class="form-check">
                        <input type="checkbox" class="form-check-input" id="course-copy">
                        <label class="form-check-label" for="course-copy">Copy students from an existing course </label>
                    </div>
                </div>
			</div>

			<!-- LIST -->
			<div class=col-md-12>
				List of courses
				<table class="table table-bordered table-condensed table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Description</th>
							<th>Started Date</th>
							<th>Actions</th>
						</tr>

					</thead>
					<tbody id="form-list-course-body">

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
		src="<?php echo base_url('application/views/course/course.js')?>"></script>

</body>
</html>