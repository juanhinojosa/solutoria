<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Σ Games</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<style type="text/css">
		body{
			background-color: #ffffff;
		}
		.banner{
			background-image:url('http://project-nerd.com/wp-content/uploads/2013/08/Video-Game-Banner-2-770x300.jpg');
			background-position: right;
			background-repeat: no-repeat;
			background-color:#000000;
			color: #ffffff;
		}
	</style>
</head>
<body>

<div id="container">
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="<?php echo base_url()."index.php/"; ?>">Σ Games</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li id="MenuHome" class="active"><a href="#">Home</a></li>
	      <li id="MenuProductos"><a href="<?php echo base_url()."index.php/"; ?>productos/">Video Juegos</a></li>
	      <li id="MenuMantencion"><a href="<?php echo base_url()."index.php/"; ?>mantencion/">Ingresar Video Juego</a></li>
	    </ul>
	  </div>
	</nav>
	<div class="jumbotron text-center banner" style="">
	  <h1>Σ Games</h1>	  
	</div>
	
	<div class="container"> 