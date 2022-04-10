<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4><?=$title?></h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Cari</label>
							<input type="text" value="*" class="form-control" name="cari" id="cari">
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>username</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody class="data-user">

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
	    reloadUser();
	    function reloadUser() {
			let data = {"key":$("#cari").val()};
			ajax.ajaxPost(
			    "<?=base_url()?>data-user",
				data,
				function (res) {
					$(".data-user").html(res);
                }
			)
        }
	})
</script>
