<div class="container">
    	<?php 
        echo form_open_multipart('Blog/edit_news/'.$show_article['id'],
          array(
            'class' => 'b_validation',
            'novalidate' => '')
        );
      ?>
      <div class="col-sm-9">
       <h4><small>EDIT POST HERE</small></h4>
       <hr>
       <?php
          if(validation_errors()){
            echo "<div class='alert alert-danger'>
                <strong>Upss!</strong>".validation_errors()."
                </div>"
                ;
          }
        ?>
        <label>Kategori</label>
          <?php echo form_dropdown('idKategori', $kategori, set_value( 'idKategori', $show_article['idKategori'] ), 'class="form-control"' ); ?>
        <label>Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo set_value('title', $show_article['title']) ?>" required><br>
        <div class="invalid-feedback">Please Fill The Tittle!</div>
        <label>Author</label>
        <input type="text" class="form-control" name="author" value="<?php echo set_value('author', $show_article['author']) ?>" required><br>
        <div class="invalid-feedback">Please Fill The Author!</div>
        <label>Content</label>
        <textarea name="content" class="form-control" style="height:300px;" required><?php echo set_value('content', $show_article['content']) ?></textarea><br>
        <div class="invalid-feedback">Please Fill The Content!</div>
        <label>You can upload file by type: .jpg .jpeg .png</label>
        <input type="file" name="image" required=""><br>
        <div class="invalid-feedback">Please Fill The Image!</div>
        <input type="submit" class="btn btn-primary" value="Edit"><hr>
      </div>
    </div>

    <script>
      (function() {
       'use strict';
       window.addEventListener('load', function() {
         var forms = document.getElementsByClassName('b_validation');
         var validation = Array.prototype.filter.call(forms, function(form) {
           form.addEventListener('submit', function(event) {
             if (form.checkValidity() === false) {
               event.preventDefault();
               event.stopPropagation();
             }
             form.classList.add('was-validated');
           }, false);
         });
       }, false);
      })();
    </script>
</body>
</html>