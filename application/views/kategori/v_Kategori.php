    <div class="container">
      <div class="col-xs-6 col-sm-6 col-md-6">
        <a href="<?php echo base_url().'C_Kategori/create'?>">
          <button type="button" class="btn btn-outline-primary">Add Category</button>
        </a>
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
        <br>
        <div class="row">
          <div class="col-md-4">
            <div class="card mb-4" style="width: 20rem;">
              <div class="card-body">
                <h5 class="card-title"><b><?php echo $key->nmKategori; ?></b></h5> <hr>
                <p class="card-text">
                  <?php echo limit_words($key->deskripsi, 4);?>
                </p>
                <div class="btn-group">
                  <a href="<?php echo base_url(). 'C_Kategori/edit/' . $key->idKategori ?>" class="btn btn-outline-warning">Edit</a>
                <a href="<?php echo base_url() ?>C_Kategori/delete/<?php echo $key->idKategori ?>" class="btn btn-outline-danger">Delete</a>
                </div>
              </div>
            </div>
          </div> 
          <?php endforeach;?>
        </div>
        

</body>
</html>