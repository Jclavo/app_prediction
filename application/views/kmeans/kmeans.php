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
				<form class="form-inline" id="form-edit-test">
						<!-- Form description -->
						<legend><b>Kmeans execution</b></legend>

						<!-- Select  -->
						<div class="form-group">
							<label class="col-md-3 control-label" for="kmeans-test"><b>Tests:</b></label>
							<div class="col-md-9">
								<div class="input-group">
									<select class="form-control" id="kmeans-test">
									</select>
								</div>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="test-total_question"><b># Clusters</b></label>
							<div class="col-md-2">
								<input id="kmeans-cluster_number" name="kmeans-cluster_number" type="number" min="2"
									class="form-control input-md" required>
							</div>
						</div>
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
						href="#students-graph">Students Graph</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab"
						href="#histograms">Histograms</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab"
						href="#answers">Answers</a></li>
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
									<th>name</th>
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
				
				<!-- LIST STUDENTS CHART -->
				<div id="students-graph" class="container tab-pane fade">
					<br>
					<div class=col-md-12>
						GRAPH
						<canvas id="scatterChart">
						</canvas>
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

				<!-- LIST QUESTIONS -->
				<div id="answers" class="container tab-pane fade">
					<br>
					<div class=col-md-12>
						Answers
						<table class="table table-bordered table-condensed table-hover">
							<thead>
								<tr id="form-list-kmeans-answers-header">
									<th>question id</th>
									<th>question</th>
									<th>predict answer</th>
									<th>correct answer</th>
									<th>matched</th>

								</tr>

							</thead>
							<tbody id="form-list-kmeans-answers-body">

							</tbody>
						</table>
					</div>
					<div class=col-md-12>
						Percentage of correct answers
						<canvas id="pieChart">
						</canvas>
					</div>
				</div>
			</div>
			<br>
			<!-- view -->
		</div>

		<!-- THE MODAL -->
		<div class="modal" id="myModal">
			<div class="modal-dialog modal-lg">
				<!--  modal-lg -->
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Details</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<!--
    					<div class=col-md-12>
    						Details
    						<table class="table table-bordered table-condensed table-hover">
    							<thead>
    								<tr id="form-list-kmeans-histograms">
    									<th>question id</th>
            							<th>question</th>
            							<th>option id</th>
            							<th>option</th>
            							<th>Total choosen</th>
            							<th>Sum cluster</th>
            							<th>Percentage</th>
                					</tr>
    
    							</thead>
    							<tbody id="form-list-kmeans-histograms-details">
    
    							</tbody>
    						</table>
    					</div>
    					 -->
						<canvas id="myChart" class=col-md-12>
    					</canvas>
						<canvas id="polarChart" class=col-md-12>
						</canvas>

					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>

				</div>
			</div>
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
	<script src="<?php echo base_url('assets/js/mdb/mdb.js')?>"></script>

</body>
</html>