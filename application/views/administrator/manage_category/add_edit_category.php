 <!-- Basic Layout -->

 <div class="card mb-4">
     <div class="card-header d-flex justify-content-between align-items-center">
         <h5 class="mb-0"><?= @$category_data['name'] ? "Edit " . @$category_data['name'] : "Add New Tool Category"; ?></h5>
         <small class="text-muted float-end">Manage Tool Category</small>
     </div>
     <hr>
     <div class="card-body">
         <form class="form-horizontal" method="post" enctype="multipart/form-data">
             <?php
                if (@$error_msg) { ?>
                 <div class="alert alert-danger">
                     <?php echo $error_msg;  ?>
                 </div>
             <?php } else if (@$suc_msg) {  ?>
                 <div class="alert alert-success">
                     <?php echo $suc_msg;  ?>
                 </div>
             <?php  } ?>

             <div class="form-group mb-3">
                 <label for="" class="form-label">Category Name</label>
                 <input type="text" name="cat_name" class="form-control" id="" placeholder="Category Name" value="<?= @$category_data['cat_name']; ?>" required>
             </div>

             <div class="form-group mb-3">
                 <label for="" class="form-label">Category Image</label>
                 <input type="text" name="cat_img" class="form-control" id="" placeholder="Category Image" value="<?= @$category_data['cat_img']; ?>" required>
             </div>

             <div class="form-group mb-3">
                 <input type="submit" name="submit" value="Submit" id="save" class="btn btn-primary">
                 <a href="<?php echo base_url('administrator/category'); ?>" class="btn btn-default">Cancel</a>
             </div>

         </form>
     </div>
 </div>