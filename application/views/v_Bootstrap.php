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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">CodeIgniter</a></li>
            <li><a href="#">Php</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Contact Me</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br><br>

    <div class="container">
    	<div class="jumbotron">
    		<h1>Hai, You!!</h1>
    		<p>
    			Welcome to My First Page learn about CI & Boostrap. <br>
    			Make ur self as a priority! <br>
    			Nice to meet you. Have A great day, You! ^_^
    		</p>
    	</div>
    	<div class="col-lg-6">
    		<div class="panel panel-danger">
    			<div class="panel-heading">Contoh dari Form</div>
    			<div class="panel-body">
    				<form>
		    			<div class="form-horizontal">
		    				<label>NIM</label>
		    				<input type="text" name="nim" class="form-control" placeholder="Input Your NIM here!">
		    			</div>
		    			<div class="form-horizontal">
		    				<label>Nama</label>
		    				<input type="text" name="nama" class="form-control" placeholder="Input Your Name here!">
		    			</div> <br>
		    			<div class="form-group">
		    				<button type="submit" class="btn btn-danger">Submit</button>
		    			</div>
		    		</form>
    			</div>
    		</div>
    	</div>
    	<div class="col-lg-6">
    		<div class="panel panel-danger">
    			<div class="panel-heading">Contoh dari Table</div>
    			<div class="panel-body">
    				<table class="table table-striped">
    					<tr>
    						<th>#</th>
    						<th>NIM</th>
    						<th>Nama</th>
    					</tr>
    					<tr>
    						<td>1</td>
    						<td>1631710054</td>
    						<td>Phadma Sadna Phitaloka</td>
    					</tr>
    					<tr>
    						<td>2</td>
    						<td>1631710055</td>
    						<td>Spongebob Squarepants</td>
    					</tr>
    					<tr>
    						<td>3</td>
    						<td>1631710056</td>
    						<td>Nobi Nobita</td>
    					</tr>
    				</table><br>
    			</div>
    		</div>
    	</div>
    </div>
</body>
</html>