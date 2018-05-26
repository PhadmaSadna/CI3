<div class="container" align="center">
<?php echo form_open('C_User/login_user'); ?>
	<h4 align="center">ENTER YOUR USERNAME & PASSWORD</h4><br>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Masukkan Username" required autofocus>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
			</div>
			<button type="submit" class="btn btn-danger btn-block btn-outline-danger">Login</button>
		</div>
		<div class="col-md-4"></div>
	</div>
<?php echo form_close(); ?>
</div>