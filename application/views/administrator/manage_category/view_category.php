<!-- <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Tool Category /</span> View Category</h4> -->

<div class="card">
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="card-header">Tools Category List</h4>
        <a href="<?php echo base_url('administrator/category/create') ?>" class="btn btn-primary">+ Add Category</a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Category Index</th>
                    <th style="max-width:150px" class="all">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php $i = 1;
                foreach (@$all_category as $data) {  ?>
                    <tr class="row-<?php echo $data['id']; ?>">

                        <td><?php echo $i;  ?></td>
                        <td>
                            <img width="100px" height="100%" src="<?= @$data['cat_img']; ?>" onError="this.onerror=null;this.src='<?= base_url("assets/images/loading.webp") ?>';" alt="<?= @$data['cat_name'];  ?>">
                        </td>
                        <td><strong><?php echo $data['cat_name'];  ?></strong></td>
                        <td>
                            <input type="number" value="<?= @$data['index'];  ?>" data-id="<?= @$data['id']; ?>" class="category-index">
                        </td>
                        <td class="action">
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo base_url('administrator/category/update/' . $data['id']);  ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <?php if (@$this->session->userdata('adminType') == 1) { ?>
                                        <a class="dropdown-item delete" data-delId='<?php echo $data['id'] ?>' href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                    <?php } ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
</div>
<style>

</style>
<script>
    $(document).ready(function() {

        $('.table').DataTable({
            "dom": "<'row'<'col-sm-6'l<'dt-buttons'Bf>><'col-sm-6'p<br/>i>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p<br/>i>>",
            "paging": true,
            "autoWidth": true,
            oLanguage: {
                oPaginate: {
                    sNext: '<span class="pagination-default">&#x276f;</span>',
                    sPrevious: '<span class="pagination-default">&#x276e;</span>'
                }
            }
        });
        /* delte User For Ajax*/
        $(document).on("click", ".delete", function() {
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this Category data !!",
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
                            url: '<?php echo base_url('administrator/category/delete'); ?>',
                            type: 'POST',
                            data: {
                                delete_id: del_id
                            },
                            error: function() {

                                swal("Cancelled !!", "Error From server. Please try again.", "error");

                            },
                            success: function(res) {

                                $('.row-' + del_id).remove();
                                swal("Deleted !!", "Hey, your Category data has been deleted !!", "success");

                            }
                        })
                    }

                });
        })

        BASE_URL = '<?= base_url(); ?>';

        $(document).on("keyup", ".category-index", function() {
            category_index = $(this).val();
            category_id = $(this).attr("data-id");

            $.ajax({
                type: "POST",
                url: BASE_URL + "/administrator/category/update_index",
                data: {
                    category_index: category_index,
                    category_id: category_id,
                },
                success: function(response) {

                },
            });
        });
    })
</script>