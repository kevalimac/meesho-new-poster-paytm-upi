<style>
    input[type="checkbox"].hide-show-switch {
        position: relative;
        width: 40px;
        height: 25px;
        -webkit-appearance: none;
        appearance: none;
        background: #bbbbbb;
        outline: none;
        border-radius: 2rem;
        cursor: pointer;
        box-shadow: inset 0 0 5px rgb(0 0 0 / 50%);
    }

    input[type="checkbox"].hide-show-switch::before {
        content: "";
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: #fff;
        position: absolute;
        top: 0;
        left: 0;
        transition: 0.5s;
    }

    input[type="checkbox"].hide-show-switch:checked::before {
        transform: translateX(60%);
        background: #fff;
    }

    input[type="checkbox"].hide-show-switch:checked {
        background: #00ed64;
    }
</style>

<div class="card">
    <div class="w-100 d-flex align-items-center justify-content-between">
        <h4 class="card-header">View Products List</h4>
        <div>
            <a href="javascript:void(0)" class="btn btn-warning hideAllProduct m-2">Hide All Product</a>
            <a href="javascript:void(0)" class="btn btn-success showAllProduct m-2">Show All Product</a>
            <a href="javascript:void(0)" class="btn btn-danger removeAllProduct m-2">Remove All Product</a>
            <a href="<?= base_url("administrator/products/create") ?>" class="btn btn-primary m-2">Add Products</a>
        </div>
    </div>
    <?php
    $this->db->order_by("index", "asc");
    $categories = $this->model->get_all_records("category");
    ?>
    <div class="table-responsive">
        <table class="table table-hover responsive">
            <thead>
                <tr>
                    <th class="all">#</th>
                    <th class="all">Image</th>
                    <th>Product Name</th>
                    <th>Hide/Show</th>
                    <th>Product Index</th>
                    <th>Product Category</th>
                    <th class="none">Product Pricing</th>
                    <th class="all">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php $i = 1;
                foreach (@$products_list as $data) {  ?>
                    <tr class="row-<?= $data['id']; ?>">
                        <td><?= $i;  ?></td>
                        <td>
                            <img width="100px" height="100%" src="<?= @$data['img1']; ?>" alt="<?= $data['name'];  ?>0" data-id="<?= $data['id']; ?>" decoding="async" data-original="" class="lazy">
                        </td>
                        <td class="products-title">
                            <?= $data['name'];  ?>
                        </td>
                        <td class="">
                            <input type="checkbox" class="hide-show-switch" data-id="<?= $data['id']; ?>" <?= (@$data['is_show']) ? "checked" : ""; ?>>
                        </td>
                        <td>
                            <input type="number" value="<?= $data['index'];  ?>" data-id="<?= $data['id']; ?>" style="max-width:100px;" class="product-index form-control">
                        </td>
                        <td>
                            <select name="" class="product-category form-control" data-id="<?= $data['id']; ?>">
                                <option value="0">Select Category</option>
                                <?php foreach ($categories as $key => $category) { ?>
                                    <option value="<?= @$category['id'] ?>" <?= (@$category['id'] == @$data['category']) ? "selected" : ""; ?>><?= @$category['cat_name']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <?php
                            $product_verient = $this->model->get_all_records("tbl_product_verient", ["product_id" => @$data['id']]);
                            ?>

                            <ol>
                                <?php foreach ($product_verient as $key_1 => $verient) { ?>
                                    <li class="mb-3">
                                        <div class="verients">
                                            <b><?= $verient['name']; ?></b>
                                            <span><?= " (" . $verient['color'] . ")"; ?></span>
                                            <?php if ($verient['storage']) { ?>
                                                <span><?= " (" . $verient['storage'] . ")"; ?></span>
                                            <?php } ?>

                                            &nbsp;
                                            <div>
                                                <input type="number" value="<?= $verient['selling_price']; ?>" data-is_first="<?= ($key_1 == 0) ? 1 : 0; ?>" data-verient-id="<?= $verient['id']; ?>" data-product-id="<?= $verient['product_id']; ?>" class="form-control verient-price" style="max-width: 150px;">
                                            </div>
                                        </div>
                                    </li>
                                <?php  } ?>
                            </ol>
                        </td>
                        <td>
                            <a class="dropdown-item delete" data-delId='<?= $data['id'] ?>' href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                        </td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    BASE_URL = '<?= base_url(); ?>';
    // status change script 

    // $(document).ready(function() {
    var is_load = true;
    $('.table').DataTable({
        "dom": "<'row'<'col-sm-6'l<'dt-buttons'Bf>><'col-sm-6'p<br/>i>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p<br/>i>>",
        "paging": true,
        "autoWidth": true,
        oLanguage: {
            oPaginate: {
                sNext: '<span class="pagination-default">&#x276f;</span>',
                sPrevious: '<span class="pagination-default">&#x276e;</span>'
            }
        },
        drawCallback: function() {

            $("img.lazy")
                .lazyload({
                    effect: "fadeIn",
                    threshold: 5000,
                })
                .removeClass("lazy");

        }
    });

    /* delte User For Ajax*/

    $(document).on("click", ".hideAllProduct", function() {
        swal({
                title: "Hide All Products?",
                text: "You want to Hide all products!!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {

                if (!willDelete) {
                    // swal("Cancelled !!", "Thank You.", "error");
                    return false;
                } else {
                    window.location.href = "<?= base_url("administrator/products/all_hide_product") ?>";
                }
            });
    })

    $(document).on("click", ".showAllProduct", function() {
        swal({
                title: "Show All Products?",
                text: "You want to Show all products!!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {

                if (!willDelete) {
                    // swal("Cancelled !!", "Thank You.", "error");
                    return false;
                } else {
                    window.location.href = "<?= base_url("administrator/products/all_show_product") ?>";
                }
            });
    })

    $(document).on("click", ".removeAllProduct", function() {
        swal({
                title: "Remove All Product?",
                text: "You want to Remove all products!!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {

                if (!willDelete) {
                    // swal("Cancelled !!", "Thank You.", "error");
                    return false;
                } else {
                    window.location.href = "<?= base_url("administrator/products/remove_all_product") ?>";
                }
            });
    })

    $(document).on("click", ".delete", function() {

        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Tool data !!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {

                if (!willDelete) {
                    swal("Cancelled !!", "Thank You.", "error");
                    return false;

                } else {

                    var del_id = $(this).attr("data-delId");

                    $.ajax({
                        url: '<?= base_url('administrator/products/delete'); ?>',
                        type: 'POST',
                        data: {
                            delete_id: del_id
                        },
                        error: function() {

                            swal("Cancelled !!", "Error From server. Please try again.", "error");

                        },
                        success: function(res) {

                            $('.row-' + del_id).remove();
                            // swal("Deleted !!", "Hey, your products data has been deleted !!", "success");

                        }
                    })
                }

            });
    })

    $(document).on("keyup", ".product-index", function() {
        product_index = $(this).val();
        product_id = $(this).attr("data-id");

        $.ajax({
            type: "POST",
            url: BASE_URL + "/administrator/products/update_index",
            data: {
                product_index: product_index,
                product_id: product_id,
            },
            success: function(response) {

            },
        });

    })

    $(document).on("keyup", ".verient-price", function() {

        is_first = $(this).attr("data-is_first");
        product_id = $(this).attr("data-product-id");
        verient_id = $(this).attr("data-verient-id");
        price = $(this).val() ?? 199;

        $.ajax({
            type: "POST",
            url: BASE_URL + "/administrator/products/update_verient_price",
            data: {
                is_first: is_first,
                verient_id: verient_id,
                product_id: product_id,
                price: price
            },
            success: function(response) {},
        });

    })

    $(document).on("click", ".hide-show-switch", function() {

        is_show = $(this).is(":checked") ? 1 : 0;
        product_id = $(this).attr("data-id");

        $.ajax({
            type: "POST",
            url: BASE_URL + "/administrator/products/update_hide_show",
            data: {
                is_show: is_show,
                product_id: product_id
            },
            success: function(response) {},
        });
    })

    $(document).on("change", ".product-category", function() {
        product_category = $(this).val();
        product_id = $(this).attr("data-id");

        $.ajax({
            type: "POST",
            url: BASE_URL + "/administrator/products/update_category",
            data: {
                product_category: product_category,
                product_id: product_id,
            },
            success: function(response) {

            },
        });

    })
    // })
</script>
<style>
    .products-title {
        width: 150px !important;
        text-overflow: ellipsis;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        word-break: break-word;
    }

    .verients {
        display: flex;
        align-items: center;
        column-gap: 10px;
    }
</style>