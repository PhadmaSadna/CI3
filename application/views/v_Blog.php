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
              <h3>What's Framework?</h3>
              <p>
                Buat para programer kata framework pastilah tidak asing lagi, karna untuk membuat aplikasi atau pemrograman web akan membutuhkan sebuah framework agar ... <br>
                <a href="<a href="<?php echo site_url()?>Blog/view">Read More ...</a>
              </p>
            </div>
          </div>
        </div>
        <div class="well well-sm">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <h3>What's Bootstrap?</h3>
              <p>
                Bootstrap adalah sebuah framework css yang dapat digunakan untuk mempermudah membangun tampilan web. Bootstrap pertama kali di .. <br>
                <a href="#">Read More ...</a>
              </p>
            </div>
          </div>
        </div>
        <div class="well well-sm">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <h3>Why we should use Framework?</h3>
              <p>
                Framework secara sederhana dapat diartikan sebagai sebuah perpustakaan yang berisi kumpulan fungsi / prosedur dan kelas untuk tujuan .. <br>
                <a href="#">Read More ...</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>