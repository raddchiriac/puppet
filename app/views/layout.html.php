<!DOCTYPE html>
<html lang="ro">
<head>
	<title><?php echo isset($title) ? h($title) : config('blog.title') ?></title>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" user-scalable="no" />
	<meta name="description" content="<?php echo config('blog.description')?>" />

	<link rel="alternate" type="application/rss+xml" title="<?php echo config('blog.title')?>  Feed" href="<?php echo site()?>rss" />

	<link href='http://fonts.googleapis.com/css?family=Great+Vibes&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Sintony:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href="<?php echo site() ?>assets/css/style.css" rel="stylesheet" />

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
	<!--<script src="<?php echo site() ?>assets/js/lib/require.js" data-main="<?php echo site() ?>assets/js/global"></script>-->
</head>
<body>

	<aside>

		<h1><?php echo config('blog.title') ?></h1>

		<p class="description"><?php echo config('blog.description')?></p>

		<ul>
			<li><a href="<?php echo site() ?>">Blog</a></li>
			<li><a href="#">Proiect</a></li>
			<li><a href="#">Echipă</a></li>
			<li><a href="<?php echo site() ?>contact">Contact</a></li>
		</ul>

		<p class="author"><?php echo config('blog.authorbio') ?></p>

	</aside>

	<section id="content">

		<?php echo content() ?>

	</section>

</body>
</html>
