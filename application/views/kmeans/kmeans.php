<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
<title>Answer - CRUD</title>
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
						<legend>Kmeans execution</legend>
					
						<!-- Select  -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="kmeans-test">tests</label>
							<div class="col-md-4">
								<div class="input-group">
									<select 
										class="form-control" id="kmeans-test">
									</select>
								</div>
							</div>
						</div>

						<!-- Button -->

					</fieldset>
				</form>
				<div class="form-group">
					<label class="col-md-8 control-label" for="btn-save"></label>
					<div class="col-md-4" id="saveupdate">
						<button id="btn-save" name="btn-save" class="btn btn-success"
							onclick="execute_kmeans()">Execute Kmeans</button>
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
							<th>Name</th>
							<th>Lastname</th>
							<th>Actions</th>
						</tr>

					</thead>
					<tbody id="form-list-kmeans-body">

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
		src="<?php echo base_url('application/views/kmeans/kmeans.js')?>"></script>

</body>
</html>