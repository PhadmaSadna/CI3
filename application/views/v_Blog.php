<!DOCTYPE html>
<html>
<head>
	<title>Introduction CI With Bootstrap</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
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
            <li class="active"><a href="<?php echo site_url()?>Home/">Home</a></li>
            <li><a href="<?php echo site_url()?>About/">About</a></li>
            <li><a href="<?php echo site_url()?>Blog/">Blog</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br><br><br>

    <div class="container">
    	<div class="col-xs-12 col-sm-9 col-md-9">
        <div class="well well-sm">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <h3><?php echo $artikel1['judul']; ?></h3>
                    <p>
                      <?php echo $artikel1['isi']; ?>
                      <br>
                      <a href="#">Read More ...</a>
                    </p>
              </div>
          </div>
        </div>
        <div class="well well-sm">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <h3><?php echo $artikel2['judul1']; ?></h3>
              <p>
                <?php echo $artikel2['isi1']; ?>
                <br>
                <a href="#">Read More ...</a>
              </p>
            </div>
          </div>
        </div>
        <div class="well well-sm">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <h3><?php echo $artikel3['judul2']; ?></h3>
              <p>
                <?php echo $artikel3['isi2']; ?>
                <br>
                <a href="#">Read More ...</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>