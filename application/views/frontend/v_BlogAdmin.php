 <script type="text/javascript">
   $(document).ready(function() {
        $('#table_id').DataTable();
    } );
 </script>

<div class="container">
  <div class="container">
    <table id="table_id" class="table table-striped"><br><br><br>
      <thead class="thead-dark">
        <tr>
          <th>News ID</th>
          <th>Category ID</th>
          <th>Author</th>
          <th>Title</th>
          <th>Content</th>
          <th>Date Post</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
    <tbody>
      <?php
        function limit_words($string, $word_limit){
          $words = explode(" ", $string);
          return implode(" ", array_splice($words, 0, $word_limit));
        }

        foreach ($all_news -> result_array() as $i) :
          $id       = $i['id'];
          $idctg    = $i['idKategori'];
          $author   = $i['author'];
          $judul    = $i['title'];
          $content  = $i['content'];
          $datepost = $i['datepost'];
          $image    = $i['image'];
        
      ?>
      <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $idctg ?></td>
        <td><?php echo $author ?></td>
        <td><?php echo $judul ?></td>
        <td><?php echo limit_words($content, 5);?> ...</td>
        <td><?php echo $datepost ?></td>
        <td><img class="img-rounded" src="<?php echo base_url().'assets/img/'.$image;?>" height="50px" width="50px"></td>
        <td>
          <div class="btn-group">
            <a href="<?php echo site_url('Blog/edit_news/'.$i['id'])?>" class="btn btn-outline-warning">Edit</a>
            <a href="<?php echo site_url('Blog/delete_news/'.$i['id']) ?>" class="btn btn-outline-danger">Delete</a>
          </div>
        </td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>


    </div>
</body>
</html>