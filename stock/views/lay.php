<!-- new layout: views/layout.php -->
<?php require_once('config.php') ?>
<?php include('controllers/controller_connect.php') ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
<title>eMall CVL | Home </title>
</head>

<body>
	<!-- container - wraps whole page -->
	<div class="container">
		<!-- navbar -->
		<?php include(ROOT_PATH . '/includes/navbar.php') ?>
		<!-- // navbar -->

		<!-- banner -->

		<?php
        if(!isset($_SESSION['id']))
            include(ROOT_PATH . '/includes/banner.php');
        else
            include(ROOT_PATH.'/includes/disconnect.php');?>
		<!-- // banner -->

		<!-- Page content -->
		<div class="content">
			<h2 class="content-title">Recent Orders</h2>
			<hr>
			<!-- more content still to come here ... -->
			<?php include(ROOT_PATH . '/includes/navbar-orders.php') ?>
			<?php require_once(ROOT_PATH.'/routes/router.php'); ?>
			
		</div>
		<!-- // Page content -->

		<!-- footer -->
		<?php include(ROOT_PATH . '/includes/footer.php') ?>
		<!-- // footer -->