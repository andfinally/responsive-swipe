<?php
$frag_width = isset($_GET['frag_width']) ? filter_var($_GET['frag_width'], FILTER_SANITIZE_NUMBER_INT) : 320;
$full_page = !isset($_GET['frag_width']);

function render_header() {
	global $full_page;
	if ($full_page) { ?><!DOCTYPE html>
<html>
<head>
	<title>Responsive Swipe</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800&subset=latin' rel='stylesheet' type='text/css'>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	<link href="css/styles.css" rel="stylesheet" media="screen">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

</head>
<body>

<div class="container-narrow">

	<div id="pageBody">
		<div id="swipeview-slider">
			<div id="swipeview-masterpage-0">
				<!-- Leave empty. First lefthand content will load here -->
			</div>
			<div id="swipeview-masterpage-1"><?php
	}
}

function render_footer() {
	global $full_page;
	if ($full_page) { ?>
	</div>
 <div id="swipeview-masterpage-2">
     <!--Leave empty. First righthand content will load here -->
 </div>
</div>
</div>

<p class="alert footer">This is how we're highlighting Ajax-delivered content in this demo:</p>
<div class="row-fluid k">
	<div class="span6 ajax-loaded">Inner content loaded by Ajax from a PHP response</div>
	<div class="span6 ajax-loaded from-cache">Inner content loaded by Ajax from cache.</div>
</div>

</div>
<!-- /container -->

<a href="javascript:void(0)" class="prev btn btn-large"><</a>
<a href="javascript:void(0)" class="next btn btn-large">></a>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/swipeview.js"></script>
<script src="js/responsive-swipe.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    
    var baseUrl = '/responsive-swipe/';

	var mySwipe = $('#pageBody').responsiveSwipe({
		edition: [
			baseUrl + 'index.php',
			baseUrl + 'responsive-content.php',
			baseUrl + 'swiping.php',
			baseUrl + 'setup.php',
			baseUrl + 'disclaimer.php'
		],
		widthGuess: 0,
		emulator: window.location.hash.match(/emulator/)
	});

	$(document).ready(function(){

		$(document).on('click', '.next', function (e) {
			e.preventDefault();
			mySwipe.gotoNext();
		});

		$(document).on('click', '.prev', function (e) {
			e.preventDefault();
			mySwipe.gotoPrev();
		});

	})

</script>
</body>
</html><?php
	}

}


