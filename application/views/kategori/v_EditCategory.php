<!DOCTYPE html>
<html>
<head>
	<title>Introduction CI With Bootstrap</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css')?>">
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/validation.js"></script>
</head>
<body>

	<nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PhadmaSadna</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url()?>Home/">Home</a></li>
            <li class="active"><a href="<?php echo site_url()?>About/">About</a></li>
            <li><a href="<?php echo site_url()?>Blog/">Blog</a></li>
            <li><a href="<?php echo site_url()?>C_Kategori/">Kategori</a></li>
            <li><a href="<?php echo site_url()?>BlogAdmin/">Blog Admin</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Contact Me</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br>

    <div class="container">
    	 
          <?php    
            $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
          ?>
          <?php echo validation_errors(); ?>

          <?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>

          <?php echo form_open( current_url(), array('class' => 'needs-validation', 'novalidate' => '') ); ?>

          <div class="form-group">
            <label for="cat_name">Nama Kategori</label>
            <input type="text" class="form-control" name="nmKategori" value="<?php echo set_value('nmKategori', $kategori->nmKategori) ?>" required>
            <div class="invalid-feedback">Isi judul dulu gan</div>
          </div>
          <div class="form-group">
            <label for="text">Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" value="<?php echo set_value('deskripsi', $kategori->deskripsi) ?>" required>
            <div class="invalid-feedback">Isi deskripsinya dulu gan</div>
          </div>
          <button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script>
      (function() {
       'use strict';
       window.addEventListener('load', function() {
         var forms = document.getElementsByClassName('b_validation');
         var validation = Array.prototype.filter.call(forms, function(form) {
           form.addEventListener('submit', function(event) {
             if (form.checkValidity() === false) {
               event.preventDefault();
               event.stopPropagation();
             }
             form.classList.add('was-validated');
           }, false);
         });
       }, false);
      })();
    </script>

</body>
</html>