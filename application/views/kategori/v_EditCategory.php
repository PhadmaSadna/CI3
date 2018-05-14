    <div class="container">
      
          <?php    
            $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
          ?>
          <?php echo validation_errors(); ?>

          <?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>

          <?php echo form_open( current_url(), array('class' => 'needs-validation', 'novalidate' => '') ); ?>

          <div class="form-group">
           <label for="cat_name">Nama Kategori</label>
            <input type="text" class="form-control" name="nmKategori" value="<?php echo set_value('nmKategori', $kategori->nmKategori) ?>" required>
            <div class="invalid-feedback">Isi judul dulu gan</div>
          </div>
          <div class="form-group">
          <label for="text">Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" value="<?php echo set_value('deskripsi', $kategori->deskripsi) ?>" required>
            <div class="invalid-feedback">Isi deskripsinya dulu gan</div>
          </div>
          <button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
        </form>
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