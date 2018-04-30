<!DOCTYPE html>
<html>
<head>
  <title>Introduction CI With Bootstrap</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fontawesome/web-fonts-with-css/css/fontawesome.min.css')?>">
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
            <li><a href="<?php echo site_url()?>C_Kategori/">Kategori</a></li>
            <li><a href="<?php echo site_url()?>BlogAdmin/">Blog Admin</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br><br><br>



    <div class="container">
      <div class="col-xs-6 col-sm-6 col-md-6">
        <a href="<?php echo base_url().'C_Kategori/create'?>" class="btn btn-danger">Add Category</a>
      </div>
    </div>
    <div class="container">
      <?php
        function limit_words($string, $word_limit){
          $words = explode(" ", $string);
          return implode(" ", array_splice($words, 0, $word_limit));
        }

        foreach ($kategori as $key) :
        
      ?>

      <div class="col-xs-3 col-sm-3 col-md-3">
        <br>
        <div class="well well-sm">
          <div class="row">
            <div class="col-md-7">
              <h3><?php echo $key->nmKategori; ?></h3>
              <hr>
              <p>
                <?php echo limit_words($key->deskripsi, 4);?> <br>
                <br>
                  <a href="<?php echo base_url(). 'C_Kategori/edit/' . $key->idKategori ?>" class="btn btn-warning">Edit</a>
                  <a href="<?php echo base_url() ?>C_Kategori/delete/<?php echo $key->idKategori ?>" class="btn btn-danger">Hapus</a>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
</body>
</html>