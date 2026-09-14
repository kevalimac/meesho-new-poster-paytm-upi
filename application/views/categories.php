<div class="">
    <div class="categories">
        <h3 class="ui2-heading">Shop by <span><b>Categories</b></span></h3>
        <?php
        $this->db->order_by("index", "asc");
        $categories = $this->model->get_all_records("category");

        if (counts($categories)) {
        ?>
            <div class="cat-list">
                <?php
                foreach ($categories as $key => $category) {
                ?>
                    <a class="category" href="<?= base_url("category/" . @$category['unique_id']); ?>">
                        <img src="<?= @$category['cat_img'] ?>" alt="<?= @$category['cat_name'] ?>">
                        <p><?= @$category['cat_name']; ?></p>
                    </a>
                <?php }
                ?>
            </div>
        <?php  } else {  ?>
            <center style="margin-top: 30vh;margin-bottom:30vh">
                <h1>No Categories Found!!!</h1>
            </center>
        <?php }  ?>
    </div>
</div>

<style>
    .category img {
        width: 90px;
    }

    .category {
        display: flex;
        flex-flow: column;
        text-align: center;
        font-size: 10px !important;
        font-weight: bold;
        width: 25%;
        align-items: center;
        justify-content: center;
    }

    .cat-list {
        display: flex;
        align-items: center;
        justify-content: space-between;
        column-gap: 20px;
        overflow-x: scroll;
        flex-flow: wrap;
    }
</style>