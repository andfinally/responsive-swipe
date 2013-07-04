<?php

function get_site_url(){
	$url = parse_url($_SERVER['REQUEST_URI']);
	return $_SERVER['SERVER_NAME'] . $url['path'];
}

function render_image($img = '') {

	global $frag_width;
	$src = 'img/';

	switch ($img) {

		case 'logo':

			if ($frag_width > 480) {
				$src .= $img . '-large.png';
			} elseif ($frag_width > 320) {
				$src .= $img . '-medium.png';
			} else {
				$src .= $img . '-small.png';
			}

	}

	echo '<img src="' . $src . '" id="' . $img . '" />';

}

function nav_header(){

	$output = <<<HEREDOC
	<div class="masthead clearfix">
		<a href="./"><img src="img/logo-top.png" /></a>
		<ul class="nav nav-pills">
			<li><a href="index.php">Home</a></li>
			<li><a href="responsive-content.php">Responsive Content</a></li>
			<li><a href="swiping.php">Swiping</a></li>
			<li><a href="setup.php">Setup</a></li>
			<li><a href="disclaimer.php">Disclaimer</a></li>
		</ul>
	</div>
HEREDOC;

	echo $output;
}