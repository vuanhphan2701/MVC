<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="public/public2/vendors/images/apple-touch-icon.png">
    <link rel="icon" type="public/public2/image/png" sizes="32x32" href="public/public2/vendors/images/favicon-32x32.png">
    <link rel="icon" type="public/public2/image/png" sizes="16x16" href="public/public2/vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="public/public2/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="public/public2/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="public/public2/vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body class="login-page">
<?php include($view . '.php'); ?>
</body>

</html>