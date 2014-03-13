<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-US-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tengu Framework v<?php echo TENGU_VERSION; ?></title>
	<!-- CSS -->
	<?php echo \Tengu\Asset::css('bootstrap.min.css'); ?>
	<?php echo \Tengu\Asset::css('cover.css'); ?>
</head>
<body>
	<div class="site-wrapper">
		<div class="site-wrapper-inner">
			<div class="cover-container">
				<!-- Masthead -->
				<div class="masthead clearfix">
					<div class="inner">
						<h3 class="masthead-brand">Tengu Framework <small>v<?php echo TENGU_VERSION; ?></small></h3>
						<ul class="nav masthead-nav">
							<li><a href="#home">Home</a></li>
							<li><a href="#features">Features</a></li>
							<li><a href="#github">GitHub</a></li>
						</ul>
					</div>
				</div>
				<!-- End of Masthead -->

				<!-- Inner Cover -->
				<div class="inner cover">
					<?php echo $content; ?>
				</div>
				<!-- End of Inner Cover -->
			</div>
		</div>
	</div>

	<!-- JavaScript -->
	<?php echo \Tengu\Asset::js('jquery.v1.11.0.min.js'); ?>
	<?php echo \Tengu\Asset::js('bootstrap.min.js'); ?>
</body>
</html>