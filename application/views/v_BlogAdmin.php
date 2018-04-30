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
      <div class="col-xs-12 col-sm-9 col-md-9">
        <a href="<?php echo base_url().'blog/insert_news'?>" class="btn btn-danger">Add News</a>
      </div>

      <div class="container"><br>
      <table class="table table-striped"><br><br><br>
        <tr>
          <th>ID</th>
          <th>Author</th>
          <th>Title</th>
          <th>Content</th>
          <th>Datepost</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
        <?php
          function limit_words($string, $word_limit){
            $words = explode(" ", $string);
            return implode(" ", array_splice($words, 0, $word_limit));
          }

          foreach ($data['select']->result_array() as $row) {
          
        ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['author']; ?></td>
          <td><?php echo $row['title']; ?></td>
          <td>
            <?php echo limit_words($row['content'],2); ?> 
            <a href="<?php echo base_url().'Blog/view/'.$row['id'];?>"> Read more... </a>
          </td>
          <td><?php echo $row['datepost']; ?></td>
          <td><img class="img img-rounded" src="<?php echo base_url().'assets/img/'.$row['image'];?>" width="50px" height="50px"></td>
          <td>
            <a href="<?php echo site_url('Blog/edit_news/'.$row['id'])?>">
              <span class="glyphicon glyphicon-pencil"></span>
            </a> &nbsp;
            <a href="<?php echo site_url('Blog/delete_news/'.$row['id']) ?>">
              <span class="glyphicon glyphicon-trash"></span> 
            </a>
          </td>
        </tr>
        <?php } ?>
      </table>
      <?php echo $pagination; ?>
        </div>
    </div>
</body>
</html>