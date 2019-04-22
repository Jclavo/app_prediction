<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
<title>Question - CRUD</title>
<link
	href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css')?>"
	rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<!-- FORM  -->
			<div class="col-md-12">
				<form class="form-horizontal" id="form-edit-answer">
					<fieldset>
						<!-- Form Name -->
						<legend>Answer</legend>

						<div class="form-group">
							<label class="col-md-4 control-label" for="test-id">Id test</label>
							<div class="col-md-6">
								<input id="test-id" name="test-id" 
							     	type="text" class="form-control-plaintext"
									value="<?php echo $test_id;?>" disabled>
							</div>
							<label class="col-md-4 control-label" for="test-description">Test description</label>
							<div class="col-md-6">
								<input id="test-description" name="test-description" type="text"
									   class="form-control-plaintext">
							</div>
						</div>

						<!-- Button -->

					</fieldset>
				</form>
				<div class="form-group">
					<label class="col-md-4 control-label" for="btn-save"></label>
					<div class="col-md-4" id="saveupdate">
						<button id="btn-save" name="btn-save" class="btn btn-success"
							onclick="save_question()">Save</button>
					</div>
				</div>
			</div>

			<!-- LIST -->
			<div class=col-md-12>
				List of questions
				<table class="table table-bordered table-condensed table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Description</th>
							<th>Correct</th>
						</tr>

					</thead>
					<tbody id="form-list-question-body">

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
		src="<?php echo base_url('application/views/question/question.js')?>"></script>

</body>
</html>