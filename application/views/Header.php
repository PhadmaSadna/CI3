<!DOCTYPE html>
<html>
<head>
  <title>Introduction CI With Bootstrap</title>
  
  <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fontawesome/web-fonts-with-css/css/fontawesome.min.css')?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> 

  <!--Data Tables
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script> -->

   <!-- OffLine -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css')?>">
   <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.12.4.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/js/validation.js')?>"></script>



</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Phadma Sadna</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url()?>Home/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url()?>About/">About Me</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url()?>Blog/">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url()?>C_Kategori/">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url()?>BlogAdmin/">Admin Blog</a>
        </li>
      </ul>
      <?php if(!$this->session->userdata('logged_in')) : ?>
        <div class="btn-group" role="group" aria-label="Data baru">
          <?php echo anchor('C_User/register_user', 'Register', array('class' => 'btn btn-outline-light')); ?>
          <?php echo anchor('C_User/login_user', 'Login', array('class' => 'btn btn-outline-light')); ?>
        </div>
      <?php endif; ?>

      <?php if($this->session->userdata('logged_in')) : ?>
        <div class="btn-group" role="group" aria-label="Data baru">
          <?php echo anchor('Blog/insert_news', 'Artikel Baru', array('class' => 'btn btn-outline-light')); ?>
          <?php echo anchor('C_Kategori/create', 'Kategori Baru', array('class' => 'btn btn-outline-light')); ?>
          <?php echo anchor('C_User/logout', 'Logout', array('class' => 'btn btn-outline-light')); ?>
        </div>
      <?php endif; ?>

    </div>
  </nav>

    <?php if($this->session->flashdata('user_registered')): ?>
      <?php echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('user_registered').'</div>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('login_failed')): ?>
      <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('login_failed').'</div>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedin')): ?>
      <?php echo '<div class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</div>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedout')): ?>
      <?php echo '<div class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</div>'; ?>
    <?php endif; ?>

  
  <br>