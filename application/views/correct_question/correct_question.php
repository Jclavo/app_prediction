<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
<title>correct_question - CRUD</title>
<link
	href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css')?>"
	rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<!-- FORM  -->
			<div class="col-md-12">
				<form class="form-horizontal" id="form-edit-test">
					<fieldset>
						<!-- Form description -->
						<legend>Test Student</legend>
					
						<!-- Select  -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="correct_question-test">tests</label>
							<div class="col-md-4">
								<div class="input-group">
									<select 
										class="form-control" id="correct_question-test">
									</select>
								</div>
							</div>
						</div>

						<!-- Button -->

					</fieldset>
				</form>
				<div class="form-group">
					<div class="col-md-12 control-label">
					<label class="col-md-8 control-label" for="btn-show"></label>
					<div class="col-md-6" id="show">
						<button id="btn-show" name="btn-show" class="btn btn-success"
							onclick="show_questions()">Show Questions</button>
					</div>
					<label class="col-md-8 control-label" for="btn-save"></label>
					<div class="col-md-6" id="save">
						<button id="btn-save" name="btn-save" class="btn btn-primary"
							onclick="save_questions()">Save Questions</button>
					</div>
					</div>
                </div>
			</div>

			<!-- LIST -->
			<div class=col-md-12>
				List of tests
				<table class="table table-bordered table-condensed table-hover">
					<thead>
						<tr>
							<th>Question Id</th>
							<th>Description</th>
							<th>Correct Answer</th>
							<th>Correct Answer</th>
						</tr>

					</thead>
					<tbody id="form-list-correct_question-body">

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
		src="<?php echo base_url('application/views/correct_question/correct_question.js')?>"></script>

</body>
</html>