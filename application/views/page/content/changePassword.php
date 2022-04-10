<center>

	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ftco-animate">
					<div class="comment-form-wrap pt-5 data-change-pass">
						<form class="changePass">


							<div class="form-group">
								<label for="message">Username</label>
								<input type="text" class="form-control" required name="username">
							</div>
							<div class="form-group">
								<label>Nama Hewan Peliharaan</label>
								<input type="text" name="peliharaan" required class="form-control">
							</div>
							<div class="form-group">
								<button class="btn py-3 px-4 btn-primary">Kirim Ulasan</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</center>
<script>
	$(document).ready(function(){
	   $(".changePass").submit(function(e){
	      e.preventDefault();
	      let data = $(this).serialize();
		  ajax.ajaxPost(
		      "<?=base_url()?>validasiPass",
				data,
			  function(res){
		          if (res === "2"){
                      swal.fire({
                          icon:"error",
                          title:"Gagal",
                          html:"Username Atau nama hewan peliharaan anda salah"
                      });
				  }
		          else
				  {
                      $(".data-change-pass").html(res);

                  }
			  }
		  )
	   });
	});
</script>
