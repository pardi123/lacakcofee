<form class="changeNewPass">


	<div class="form-group">
		<label for="message">Password Baru</label>
		<input type="hidden" value="<?=$username?>" name="username" required>
		<input type="password" class="form-control" required name="newPass">
	</div>
	<div class="form-group">
		<label>Konfirmasi Password</label>
		<input type="password" name="confirmPass" required class="form-control">
	</div>
	<div class="form-group">
		<button class="btn py-3 px-4 btn-primary">Ganti Password</button>
	</div>

</form>

<script>
	$(document).ready(function(){
	    $(".changeNewPass").submit(function(e){
	       e.preventDefault();
	       let data = $(this).serialize();
	       ajax.ajaxPost(
	           "<?=base_url()?>newPass",
			   data,
			   function (res){
	               if (res === "1"){
                       swal.fire({
                           icon:"success",
                           title:"Berhasil",
                           html:"Mengganti Password"
                       });
                       let time =2;
                       let terv = setInterval(function ()
                       {
                           time--;
                           if (time === 0)
                           {
                               window.location= "<?=base_url()?>index";

                           }
                       },1000);
				   }
	               else
				   {
                   alert(res);
				   }
			   }

		   )
		});
	})
</script>
