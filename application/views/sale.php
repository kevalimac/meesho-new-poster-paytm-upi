<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="shortcut icon" href="https://static-assets-web.flixcart.com/batman-returns/batman-returns/p/images/logo_lite-ea579c.png"> -->
    <link rel="stylesheet" href="<?= base_url();  ?>assets/website/css/bootstrap.min.css">
    <title>SALE SALE SALE</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="<?= base_url();  ?>assets/website/js/jquery.min.js"></script>

    <style>
        body,
        a,
        p,
        span,
        div,
        input,
        button,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: 'Poppins', sans-serif !important;
        }

        img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .btn-primary {
            position: absolute;
            bottom: 0;
            width: 98%;
            height: 51px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffc107;
            font-size: 18px;
            color: #000;
            border: 0px;
            left: 50%;
            transform: translate(-50%, -5px);
        }

        .blink-btn {
            background: #F44336;
            color: white;
            padding: 10px 12px;
            border-radius: 4px;
            text-transform: inherit;
            box-shadow: rgba(0, 0, 0, 0.16) 0 1px 2px 0;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <img src="<?= base_url("assets/website/images/sale.png") ?>" alt="Sale" width="100%">
    <a href="javascript:void(0)" class="btn btn-primary blink-btn" id="redirectButton">Click Here & Get This Offer Now</a>
</body>

<script>
    $(document).ready(function() {
        $(document).on("click", "#redirectButton", function() {
            window.location.href = '<?= base_url(); ?>'; // Replace with your desired URL
        });
    });
</script>

</html>