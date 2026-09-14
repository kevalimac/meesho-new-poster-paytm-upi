<!-- Basic Layout -->
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= @$header; ?></h5>
        <small class="text-muted float-end">Add/Edit products</small>
    </div>
    <hr>
    <div class="card-body">
        <form class="form-horizontal" id="products-form" method="post" enctype="multipart/form-data">

            <?php if (@$error_msg) { ?>
                <div class="alert alert-danger">
                    <?php echo $error_msg;  ?>
                </div>
            <?php } else if (@$suc_msg) {  ?>
                <div class="alert alert-success">
                    <?php echo $suc_msg;  ?>
                </div>
            <?php  } ?>

            <div class="form-group logo-group select-img">
                <label for="" class="form-label">Add Products</label>
                <div class="image-input" id="web-img-div">
                    <input type="file" accept="" class="select-image" id="userfile" name="file">
                    <label for="userfile" class="image-button"><i class="fa fa-image"></i> Select Product CSV</label>
                </div>
            </div>

            <div class="form-group  mb-3">
                <input type="submit" name="submit" value="Submit" id="save" class="btn btn-primary">
                <a href="<?php echo base_url('administrator/products'); ?>" class="btn btn-default">Cancel</a>
            </div>

        </form>
    </div>
</div>