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
							<a href="<?=base_url()?>pdfPemesanan" target="_blank">

								<button class="btn btn-primary">Cetak Pdf</button>
							</a>
						</div>
					</div>
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>No</th>
									<th>Meja Dipesan</th>
									<th>Nama Pemesan</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$i=0;
									if ($pemesanan['count']){
										foreach ($pemesanan['multi'] as $p){
											$i++;
											$kode = $p->kode;
											$username = $p->username;
											$meja = crud_selwhere("store_meja",NULL,"kode = '$kode'")['single'];
											$user = crud_selwhere("user",NULL,"username = '$username'")['single'];
											?>
												<tr>
													<td><?=$i?></td>
													<td><?=$meja->nama?></td>
													<td><?=$user->nama?></td>
													<td><?=$p->status?></td>
													<td>
														<?php
															if ($p->status == 'dipesan'){
																?>
																<div class="dropdown">

																	<a href="javascript:void(0)" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="list-menu"><i class="material-icons" >more_vert</i></a>
																	<div class="dropdown-menu" aria-labelledby="list-menu">
																		<a class="dropdown-item text-warning pesanan-selesai" kode="<?=$p->id_data?>" status="selesai" href="#" data-toggle="modal" data-target="#formKota"><i class="material-icons">edit</i> Selesai</a>
																		<a href="javascript:void(0)" class="dropdown-item pesanan-selesai text-danger" kode="<?=$p->id_data?>"  status="batal"><i class="material-icons">delete</i> Batalkan</a>
																	</div>
																</div>
																<?php
															}
														?>
													</td>
												</tr>
											<?php
										}
									}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
	    $(".pesanan-selesai").click(function(e){
	        e.preventDefault();
	        let data = {"id":$(this).attr("kode"),"status": $(this).attr("status")};
	        ajax.ajaxPost(
	            "<?=base_url()?>pemesanan-selesai",
				data,
				function (res) {
                    if (res === "1") {
                        swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            html: "berhasil Menyelesaikan Pesanan"
                        });
                        let time = 2;
                        let terv = setInterval(function() {
                            time--;
                            if (time === 0) {
                                window.location = "<?=base_url()?>kelola-pemesanan";

                            }
                        }, 1000);
                    }
                }
			)
		})
	})
</script>
