<!DOCTYPE html>
<html>
<head>
	<title>Introduction CI With Bootstrap</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css')?>">
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
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
        echo form_open_multipart('Blog/edit_news/'.$show_article['id']);
      ?>
      <div class="col-sm-9">
       <h4><small>EDIT POST HERE</small></h4>
       <hr>
        <label>Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $show_article['title'] ?>"><br>
        <label>Author</label>
        <input type="text" class="form-control" name="author" value="<?php echo $show_article['author'] ?>"><br>
        <label>Content</label>
        <textarea name="content" class="form-control" style="height:300px;"><?php echo $show_article['content'] ?></textarea><br>
        <label>You can upload file by type: .jpg .jpeg .png</label>
        <input type="file" name="image" required=""><br>
        <input type="submit" class="btn btn-primary" value="Edit"><hr>
        <?php
          if(validation_errors()){
            echo "<div class='alert alert-danger'>
                <strong>Danger!</strong>".validation_errors()."
                </div>"
                ;
          }
        ?>
      </div>
    </div>
</body>
</html>