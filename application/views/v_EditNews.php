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
        echo form_open_multipart('Blog/edit_news/'.$show_article['id'],
          array(
            'class' => 'b_validation',
            'novalidate' => '')
        );
      ?>
      <div class="col-sm-9">
       <h4><small>EDIT POST HERE</small></h4>
       <hr>
       <?php
          if(validation_errors()){
            echo "<div class='alert alert-danger'>
                <strong>Upss!</strong>".validation_errors()."
                </div>"
                ;
          }
        ?>
        <label>Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo set_value('title', $show_article['title']) ?>" required><br>
        <div class="invalid-feedback">Please Fill The Tittle!</div>
        <label>Author</label>
        <input type="text" class="form-control" name="author" value="<?php echo set_value('author', $show_article['author']) ?>" required><br>
        <div class="invalid-feedback">Please Fill The Author!</div>
        <label>Content</label>
        <textarea name="content" class="form-control" style="height:300px;" required><?php echo set_value('content', $show_article['content']) ?></textarea><br>
        <div class="invalid-feedback">Please Fill The Content!</div>
        <label>You can upload file by type: .jpg .jpeg .png</label>
        <input type="file" name="image" required=""><br>
        <div class="invalid-feedback">Please Fill The Image!</div>
        <input type="submit" class="btn btn-primary" value="Edit"><hr>
      </div>
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