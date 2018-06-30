<div class="container">
   <div class="py-5 text-center">
   		<h2>Hi, <?php echo $user->nmUser; ?>
       <span class="badge badge-primary">
       		<?php echo $user->nmLevel; ?>
       </span>
       		<?php echo "<br> Nice to meet you!"; ?>
       </h2><br><br>
   		<div class="row">
   			<div class="col-sm"></div>
   			<div class="col-sm">
   				<a href="<?php echo base_url().'blog/insert_news'?>">
	   				<img src="../assets/icon/3.png" class="img-fluid"> <br><br>
		   			<h4>Create News</h4>
	   			</a>
   			</div> 
	   		<div class="col-sm"></div>
	    </div>
   </div>
</div>
