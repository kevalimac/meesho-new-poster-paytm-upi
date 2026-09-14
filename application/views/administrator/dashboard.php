<div class="row">

    <div class="col-lg-12 order-0 p-0">
        <div class="row">
            <?php
            $today_users = $this->model->get_all_records("purchase", ["date" =>  date("Y-m-d")], true);
            $yesterday_users = $this->model->get_all_records("purchase", ["date" =>  date("Y-m-d", strtotime("-1 day"))], true);
            ?>
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <h3 class="card-box-title">
                                Today Users
                            </h3>
                            <div class="flex-shrink-0">
                                <i class="bx bx-user user-icon"></i>
                            </div>
                        </div>
                        <span></span>
                        <h3 class="card-title text-nowrap mb-1"><?= @$today_users['count'] ?? 0; ?></h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <h3 class="card-box-title">
                                Yesterday Users
                            </h3>
                            <div class="flex-shrink-0">
                                <i class="bx bx-user user-icon"></i>
                            </div>
                        </div>
                        <h3 class="card-title text-nowrap mb-1"><?= @$yesterday_users['count'] ?? 0; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mb-4 order-0 p-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-8">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Welcome <?= @$admin_name; ?>! 🎉</h5>
                        <p class="mb-4">
                            Take control and lead with confidence as you navigate through the Admin Panel. Your expertise and dedication are instrumental in keeping our system running smoothly. Let's make great things happen together!
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="<?= base_url("assets/administrator/"); ?>assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>