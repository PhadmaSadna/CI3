    <div class="container">
      

      <div class="row">
      <?php
        function limit_words($string, $word_limit){
          $words = explode(" ", $string);
          return implode(" ", array_splice($words, 0, $word_limit));
        }

        foreach ($all_news -> result_array() as $i) :
          $id       = $i['id'];
          $judul    = $i['title'];
          $content  = $i['content'];
          $datepost = $i['datepost'];
          $image    = $i['image'];
        
      ?>
      <div class="col-md-4">
        <br>
            <div class="card mb-4" style="width: 20rem;">
              <img class="card-img-top" src="<?php echo base_url().'assets/img/'.$image;?>" height="200px" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><b><?php echo $judul; ?></b></h5> <hr>
                <p class="card-text">
                  <?php echo limit_words($content,20);?>
                  <a href="<?php echo base_url().'Blog/view/'.$id;?>"> Read more... </a>
                </p>
                <div class="btn-group">
                <a href="<?php echo site_url('Blog/delete_news/'.$i['id']) ?>" class="btn btn-outline-danger">Delete</a>
                </div>
              </div>
            </div>
      </div> &nbsp;  
      <?php endforeach;?>
    </div>
    <div class="container" align="center">
      <?php echo $links; ?>
    </div>
  </div>
  
  

</body>
</html>