<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
<title>exam - CRUD</title>
<link
	href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css')?>"
	rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<!-- FORM  -->
			<div class="col-md-12">
				<form class="form-horizontal" id="form-edit-exam">
					<fieldset>
						<!-- Form Name -->
						<legend>exam</legend>

						<!-- Text input-->
						<div class="form-group">
							<div class="col-md-4">
								<input id="exam-id" name="exam-id" type="hidden"
									placeholder="" class="form-control input-md" disabled>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="exam-description">Description</label>
							<div class="col-md-4">
								<input id="exam-description" name="exam-description" type="text"
									placeholder="your exam's description" class="form-control input-md" required>
							</div>
						</div>

						<!-- Prepended text-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="exam-course">Courses</label>
							<div class="col-md-4">
								<div class="input-group">
									<select 
										class="form-control" id="exam-course">
									</select>
								</div>
							</div>
						</div>
						
					</fieldset>
				</form>
				<div class="form-group">
					<label class="col-md-4 control-label" for="btn-save"></label>
					<div class="col-md-4" id="saveupdate">
						<button id="btn-save" name="btn-save" class="btn btn-success"
							onclick="add_exam()">Save</button>
					</div>
				</div>
			</div>

			<!-- LIST -->
			<div class=col-md-12>
				List of exams
				<table class="table table-bordered table-condensed table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Description</th>
							<th>Class Id</th>
							<th>Description</th>
							<th>Actions</th>
						</tr>

					</thead>
					<tbody id="form-list-exam-body">

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
		src="<?php echo base_url('application/views/exam/exam.js')?>"></script>

</body>
</html>