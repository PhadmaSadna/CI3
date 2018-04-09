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
        <a href="<?php echo base_url().'blog/insert_news'?>" class="btn btn-danger">Add News</a>
      </div>
      <?php
        function limit_words($string, $word_limit){
          $words = explode(" ", $string);
          return implode(" ", array_splice($words, 0, $word_limit));
        }

        foreach ($data -> result_array() as $i) :
          $id       = $i['id'];
          $judul    = $i['title'];
          $content  = $i['content'];
          $datepost = $i['datepost'];
          $image    = $i['image'];
        
      ?>

      <div class="col-xs-12 col-sm-9 col-md-9">
        <br>
        <div class="well well-sm">
          <div class="row">
            <div class="col-md-5">
              <img class="img img-circle" src="<?php echo base_url().'assets/img/'.$image;?>" width="150px" height="150px">
            </div>
            <div class="col-md-7">
              <h3><?php echo $judul; ?></h3>
              <p>
                <?php echo limit_words($content,20);?> <br>
                <a href="<?php echo base_url().'Blog/view/'.$id;?>"> Read more... </a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
</body>
</html>