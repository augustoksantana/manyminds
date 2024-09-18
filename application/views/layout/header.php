<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Manyminds&nbsp|&nbsp <?php echo (isset($title) ? $title : 'Teste técnico') ?></title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="<?php echo base_url("public/plugins/bootstrap/dist/css/bootstrap.min.css") ?>">
        <link rel="stylesheet" href="<?php echo base_url("public/plugins/fontawesome-free/css/all.min.css") ?>">
        <link rel="stylesheet" href="<?php echo base_url("public/plugins/icon-kit/dist/css/iconkit.min.css") ?>">
        <link rel="stylesheet" href="<?php echo base_url("public/plugins/ionicons/dist/css/ionicons.min.css") ?>">
        <link rel="stylesheet" href="<?php echo base_url("public/plugins/perfect-scrollbar/css/perfect-scrollbar.css") ?>">
        <link rel="stylesheet" href="<?php echo base_url("public/dist/css/theme.min.css") ?>">
        <script src="<?php echo base_url("public/src/js/vendor/modernizr-2.8.3.min.js") ?>"></script>
        <?php 
        if(isset($styles)): 
            foreach ($styles as $style): ?>
            <link rel="stylesheet" href="<?php echo base_url("public/" . $style) ?>">
        <?php 
            endforeach;
        endif; ?>
        
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">