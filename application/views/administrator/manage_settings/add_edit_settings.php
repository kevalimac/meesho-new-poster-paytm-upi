 <!-- Basic Layout -->

 <div class="card mb-4">
     <div class="card-header d-flex justify-content-between align-items-center">
         <h5 class="mb-0">Manage Faqs</h5>
         <small class="text-muted float-end">Add/Edit Faqs</small>
     </div>
     <hr>
     <div class="card-body">
         <form class="form-horizontal" method="post" enctype="multipart/form-data">

             <?php if (@$error_msg) { ?>
                 <div class="alert alert-danger">
                     <?php echo $error_msg;  ?>
                 </div>
             <?php } else if (@$suc_msg) {  ?>
                 <div class="alert alert-success">
                     <?php echo $suc_msg;  ?>
                 </div>
             <?php  } ?>

             <div class="form-group mb-3">
                 <label for="" class="form-label">UPI </label>
                 <input type="text" name="upi_id" class="form-control" id="" placeholder="UPI ID" value="<?= @$settings_data['upi_id']; ?>" required>
             </div>

             <div class="form-group mb-3">
                 <label for="" class="form-label">Payment Methods</label>
                 <div class="row">
                     <?php
                        $payment_method = @$settings_data['payment_method'] ? explode(",", @$settings_data['payment_method']) : [];
                        ?>
                     <div class="form-check col-12 col-sm-12 col-lg-4">
                         <input class="form-check-input styled-checkbox" name="payment_method[]" type="checkbox" value="gpay" id="gpay" <?= (in_array("gpay", @$payment_method)) ? "checked" : "" ?>>
                         <label class="form-check-label" for="gpay">Gpay</label>
                     </div>

                     <div class="form-check col-12 col-sm-12 col-lg-4">
                         <input class="form-check-input styled-checkbox" name="payment_method[]" type="checkbox" value="phonepe" id="phonepe" <?= (in_array("phonepe", @$payment_method)) ? "checked" : "" ?>>
                         <label class="form-check-label" for="phonepe">Phonepe</label>
                     </div>
                     <div class="form-check col-12 col-sm-12 col-lg-4">
                         <input class="form-check-input styled-checkbox" name="payment_method[]" type="checkbox" value="paytm" id="paytm" <?= (in_array("paytm", @$payment_method)) ? "checked" : "" ?>>
                         <label class="form-check-label" for="paytm">Paytm</label>
                     </div>
                     <div class="form-check col-12 col-sm-12 col-lg-4">
                         <input class="form-check-input styled-checkbox" name="payment_method[]" type="checkbox" value="bhim_upi" id="bhim_upi" <?= (in_array("bhim_upi", @$payment_method)) ? "checked" : "" ?>>
                         <label class="form-check-label" for="bhim_upi">Bhim UPI</label>
                     </div>
                     <div class="form-check col-12 col-sm-12 col-lg-4">
                         <input class="form-check-input styled-checkbox" name="payment_method[]" type="checkbox" value="whatspp_pay" id="whatspp_pay" <?= (in_array("whatspp_pay", @$payment_method)) ? "checked" : "" ?>>
                         <label class="form-check-label" for="whatspp_pay">Whatspp Pay</label>
                     </div>
                     <div class="form-check col-12 col-sm-12 col-lg-4">
                         <input class="form-check-input styled-checkbox" name="payment_method[]" type="checkbox" value="qr_code" id="qr_code" <?= (in_array("qr_code", @$payment_method)) ? "checked" : "" ?>>
                         <label class="form-check-label" for="qr_code">Qr Pay</label>
                     </div>
                 </div>
             </div>

             <div class="form-group mb-3">
                 <label for="" class="form-label">Netbanking PayU</label>
                 <br>
                 <div class="row">
                     <div class="form-check col-12 col-sm-12 col-lg-4">
                         <input class="form-check-input styled-checkbox" name="netbanking" type="checkbox" value="netbanking" id="netbanking" <?= (@$settings_data['netbanking']) ? "checked" : "" ?>>
                         <label class="form-check-label" for="netbanking">Netbanking </label>
                     </div>
                 </div>
                 <br>
                 <div class="row">
                     <div class="form-check col-12 col-lg-6">
                         <input type="text" name="merchant_key" class="form-control" id="" placeholder="Merchant Key" value="<?= @$settings_data['merchant_key']; ?>">
                     </div>
                     <div class="form-check col-12 col-lg-6">
                         <input type="text" name="salt_key" class="form-control" id="" placeholder="Salt Key" value="<?= @$settings_data['salt_key']; ?>">
                     </div>
                 </div>

             </div>

             <div class="form-group mb-3">
                 <label for="" class="form-label">Pixel Code</label>
                 <textarea name="pixel_code" class="form-control" cols="30" rows="5" placeholder="Pixel Code"><?= @$settings_data['pixel_code']; ?></textarea>
             </div>
             <div class="form-group mb-3 text-left">
                 <input type="submit" name="submit" value="Save" id="save" class="btn btn-primary">
             </div>
         </form>
     </div>
 </div>