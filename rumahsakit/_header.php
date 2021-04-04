<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '_config/config.php';
require_once '_assets/libs/vendor/autoload.php';
if(!isset($_SESSION['user'])):
echo "
    <script>window.location='".base_url('auth/login.php')."';</script>
";

endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 	<link rel="icon" href="<?=base_url('_assets/icon/medical.png');?>"> 
    <title>Aplikasi Rumah Sakit</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url()?>/_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>/_assets/css/simple-sidebar.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?= base_url()?>/_assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url()?>/_assets/js/bootstrap.min.js"></script>

</head>
<body>

	<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="<?=base_url('dashboard');?>">
                        <span class="text-primary">
                        	Rumah Sakit
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">Data Pasien</a>
                </li>
                <li>
                    <a href="#">Data Dokter</a>
                </li>
                <li>
                    <a href="<?=base_url('poliklinik/data.php');?>">Data Poliklinik</a>
                </li>
                <li>
                    <a href="<?=base_url('obat/data.php');?>">Data Obat</a>
                </li>
                <li>
                    <a href="#">Rekam Medis</a>
                </li>
                <li>
                    <a href="<?=base_url('/auth/logout.php');?>">
                    	<span class="text-danger">
                    		Logout
                    	</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <a id="#menu-toggle" class="btn btn-default">Toggle Menu</a>
                
