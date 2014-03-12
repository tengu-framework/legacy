<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-US-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Oni MVC v<?php echo ONI_VERSION; ?></title>
	<!-- CSS -->
	<?php echo \Oni\Asset::css('bootstrap.min.css'); ?>
	<?php echo \Oni\Asset::css('cover.css'); ?>
</head>
<body>
	<div class="site-wrapper">
		<div class="site-wrapper-inner">
			<div class="cover-container">
				<!-- Masthead -->
				<div class="masthead clearfix">
					<div class="inner">
						<h3 class="masthead-brand">Oni MVC <small>v<?php echo ONI_VERSION; ?></small></h3>
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
					<h1>The Learner's Framework</h1>
					<p class="lead">Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata corpora quaeritis. Summus brains sit​​, morbo vel maleficia?</p>
					<p class="lead"><?php echo $hello; ?></p>
				</div>
				<!-- End of Inner Cover -->
			</div>
		</div>
	</div>

	<!-- JavaScript -->
	<?php echo \Oni\Asset::js('jquery.v1.11.0.min.js'); ?>
	<?php echo \Oni\Asset::js('bootstrap.min.js'); ?>
</body>
</html>