<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
<title>test - CRUD</title>
<link
	href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css')?>"
	rel="stylesheet">
</head>
<body>
	<div class="container">
			<!-- Text input-->
		<div class="form-group">
			<div class="col-md-4">
				<input id="test-id" name="test-id" type="hidden"
					placeholder="" class="form-control input-md" disabled>
			</div>
		</div>
		<div class="row">
			<!-- FORM  -->
			<div class="col-md-12">
				
				<form class="form-horizontal" id="form-edit-test">
						<legend>Test</legend>
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="test-description">Description:</label>
							<div class="col-md-4">
								<input id="test-description" name="test-description" type="text"
									placeholder="your test's description" class="form-control input-md" required>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="test-total_question">Questions:</label>
							<div class="col-md-4">
								<input id="test-total_question" name="test-total_question" type="number"
									class="form-control input-md" required>
							</div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="test-total_alternative">Options:</label>
							<div class="col-md-4">
								<input id="test-total_alternative" name="test-total_alternative" type="number"
									class="form-control input-md" required>
							</div>
						</div>
						<!-- Button -->
						<!-- Select-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="test-course">Courses</label>
							<div class="col-md-4">
								<div class="input-group">
									<select 
										class="form-control" id="test-course">
									</select>
								</div>
							</div>
						</div>
				</form>
					
				<div class="form-group">
					<label class="col-md-4 control-label" for="btn-save"></label>
					<div class="col-md-4" id="saveupdate">
						<button id="btn-save" name="btn-save" class="btn btn-success"
							onclick="add_test()">Save</button>
					</div>
				</div>
			</div>

			<!-- LIST -->
			<div class=col-md-12>
				List of tests
				<table class="table table-bordered table-condensed table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Description</th>
							<th>Total Questions</th>
							<th>Total Options</th>
							<th>Course Id</th>
							<th>Course</th>
							<th>Actions</th>
						</tr>

					</thead>
					<tbody id="form-list-test-body">

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
		src="<?php echo base_url('application/views/test/test.js')?>"></script>

</body>
</html>