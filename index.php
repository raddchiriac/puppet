<?php

// This is the composer autoloader. Used by
// the markdown parser and RSS feed builder.
require 'vendor/autoload.php';

// Explicitly including the dispatch framework,
// and our functions.php file
require 'app/includes/functions.php';

// Load the configuration file
config('source', 'app/config.ini');


// The front page of the blog.
// This will match the root url
on('GET', '/', function () {
	$page = params($_GET, 'page');
	$page = $page ? (int)$page : 1;
	
	$posts = get_posts($page);
	
	if(empty($posts) || $page < 1){
		// a non-existing page
		not_found();
	}
	
    render('main',array(
    	'page' => $page,
		'posts' => $posts,
		'has_pagination' => has_pagination($page)
	));
});

// The post page
on('GET', '/:year/:month/:name',function($year, $month, $name) {
	$post = find_post($year, $month, $name);

	if(!$post){
		not_found();
	}
	render('post',array(
		'title' => $post->title .' ⋅ ' . config('blog.title'),
		'p' => $post
	));    
});

// The JSON API
on('GET', '/api/json',function() {
	header('Content-type: application/json');

	// Print the 10 latest posts as JSON
	echo generate_json(get_posts(1, 10));
});

// Show the RSS feed
on('GET', '/rss',function() {
	header('Content-Type: application/rss+xml');

	// Show an RSS feed with the 30 latest posts
	echo generate_rss(get_posts(1, 30));
});

on('GET', '/admin', function(){
    render('admin',array(
		'title' => 'admin' .' ⋅ ' . config('blog.title')
	));    
});

on('GET', '/contact', function(){
    render('contact', array(
		'title' => 'Contact' .' ⋅ ' . config('blog.title')
	));    
});

on('POST', '/mesaj', function() {
    $name = ucwords(strtolower(trim(params('nume'))));
    $mesaj = params('mesaj');
    $date = time();
    $today = date("Y-m-d");
    $file = preg_replace('/[^a-zA-Z0-9-]/', '-', $name);
    
    $my_file = 'posts/messages/'.$date.'_'.$today.'_'.$file.'.md';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
    
    $data = '# '.$name."\r\n\r\n".$mesaj;
    fwrite($handle, $data);
    fclose($handle);
    
    echo "301";
});

// If we get here, it means that
// nothing has been matched above

on('GET', '.*',function() {
	not_found();
});



// Serve the blog
dispatch();