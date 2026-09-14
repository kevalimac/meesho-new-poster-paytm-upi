<div class="wrapper">
    <div>
        <h1 class="oops">404</h1>
        <p class="info">We couldn't find the page you were looking for.</p>
        <br />
        <a href="<?=  base_url();  ?><?= base_url(); ?>" class="button"><i class="fa fa-angle-left"></i>Go Back</a>
    </div>
</div>

<style>
    @import url("https://fonts.googleapis.com/css?family=Open+Sans:700");

    .wrapper {
        position: relative;
        padding: 20px;
        height: 80vh;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url(<?= base_url("assets/img/bg/mobile_bg.webp") ?>);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .wrapper .oops {
        /* color: #344eac; */
        font-size: 8em;
        letter-spacing: 0.05em;
        margin-bottom: 15px;
        font-family: cursive !important;
    }

    .wrapper .info {
        /* color: #22252e; */
        padding: 5px;
        margin-bottom: 5px;
    }

    .wrapper .button {
        text-transform: uppercase;
        padding: 10px;
        border-radius: 50px;
        transition: 150ms;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        max-width: 150px;
        color: #ffffff;
        /* background: var(--color-primary); */
        border: 4px solid var(--color-primary);
    }

    .wrapper .button:hover {
        background: var(--color-primary);
        color: #fff !important;
        text-decoration: none;
    }

    .wrapper .button .fa-angle-left {
        font-size: 20px;
        margin-right: 10px;
    }

    .wrapper img {
        padding: 10px;
    }
</style>