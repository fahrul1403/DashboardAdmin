<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Video Safety Induction</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <style>
        body {
            margin: 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
        }

        iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .button-container {
            margin-top: 20px;
        }

        .close-btn {
            margin-top: 10px;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
            align-items: center;
            text-align: center;
            display: inline-block;
            /* Menambahkan properti display agar tombol terlihat */
        }
    </style>
</head>

<body>
    <!-- Video Element -->
    <div class="video-container">
        <iframe src="https://www.youtube.com/embed/xf5X1x0nJ80" frameborder="0" allow="autoplay; encrypted-media"
            allowfullscreen></iframe>
    </div>

    <!-- Button Container -->
    <div class="button-container">
        <button class="btn btn-primary" onclick="window.location.href='formulir-tamu.php'">Isi Formulir Tamu</button>
    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>