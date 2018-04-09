<!DOCTYPE html>
<html>
<head>
  <title>Introduction CI With Bootstrap</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
</head>
</html>
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
            <center><h2><?php echo $data['title']?></h2></center>
            <p align="right"><b>Posting by : <?php echo $data['author']?></b></p>
            <hr>
            <center>
              <img src="<?php echo base_url().'assets/img/'.$data['image'];?>" width="200px" height="200px">
            </center>
            <br>
            <p>
              <?php echo $data['content']; ?>
            </p>
        </div>
      </div>
    </div>
</body>
</html>