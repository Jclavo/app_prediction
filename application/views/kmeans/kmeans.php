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
									<select class="form-control" id="kmeans-test">
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

			<!-- Nav tabs -->
			<div class="col-md-12">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab"
						href="#clusters">Clusters</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab"
						href="#students">Students</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab"
						href="#histograms">Histograms</a></li>
				</ul>
			</div>


			<!-- LIST CLUSTERS -->
			<div class="tab-content">
				<div id="clusters" class="tab-pane active">
					<br>
					<div class="col-md-12">
						Clusters
						<table class="table table-bordered table-condensed table-hover">
							<thead>
								<tr>
									<th>Value</th>
									<th>Letter</th>
								</tr>

							</thead>
							<tbody id="form-list-kmeans-clusters">

							</tbody>
						</table>
					</div>
				</div>

				<!-- LIST STUDENTS -->
				<div id="students" class="container tab-pane fade">
					<br>
					<div class=col-md-12>
						Students
						<table class="table table-bordered table-condensed table-hover">
							<thead>
								<tr>
									<th>id</th>
									<th>average</th>
									<th>cluster</th>
									<th>cluster value</th>
								</tr>

							</thead>
							<tbody id="form-list-kmeans-students">

							</tbody>
						</table>
					</div>
				</div>

				<!-- LIST HISTOGRAMS -->
				<div id="histograms" class="container tab-pane fade">
					<br>
					<div class=col-md-12>
						Histograms
						<table class="table table-bordered table-condensed table-hover">
							<thead>
								<tr id="form-list-kmeans-histograms-header">
									<th>question id</th>
									<th>question</th>
								</tr>

							</thead>
							<tbody id="form-list-kmeans-histograms-body">

							</tbody>
						</table>
					</div>
				</div>
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