    <div class="container">
      <div class="col-xs-12 col-sm-9 col-md-9">
        <a href="<?php echo base_url().'blog/insert_news'?>">
          <button type="button" class="btn btn-outline-primary">Add News</button>
        </a>
      </div>

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
      <div class="row">
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
                  <a href="<?php echo site_url('Blog/edit_news/'.$i['id'])?>" class="btn btn-outline-warning">Edit</a>
                <a href="<?php echo site_url('Blog/delete_news/'.$i['id']) ?>" class="btn btn-outline-danger">Delete</a>
                </div>
              </div>
            </div>
      </div> &nbsp;  
      <?php endforeach;?>
    </div>
  </div>
  <?php
    // $links ini berasal dari fungsi pagination
    // Jika $links ada (data melebihi jumlah max per page), maka tampilkan
    if (isset($links)) {
      echo $links;
    }
  ?>

</body>
</html>