<?php

require 'lib/utils.php';
require 'lib/outer_page_bits.php';

render_header();

// Useful to have no space before pageBodyInner - we check it with regex
?><div id="home" class="pageBodyInner">

	<?php nav_header(); ?>

	<div class="jumbotron">

		<?php render_image('logo'); ?>

		<h1>Splendidly responsive!</h1>

		<p class="lead">A jQuery plugin that lets you serve different content to different devices and makes your site swipeable.</p>
        <a class="btn btn-large btn-success" href="https://github.com/andfinally/responsive-swipe" target="_blank">Get it now</a>
	</div>

	<hr>

	<?php if ($frag_width >= 1024) : ?>
	<div class="hero-unit success"><p>This is content for a big device.</p><small>If you're seeing this you're probably not on a mobile.</small></div>
	<?php elseif ($frag_width >= 768) : ?>
	<div class="hero-unit info"><p>This is content for a medium device.</p><small>If you're seeing this you're probably not on a desktop PC.</small></div>
	<?php else: ?>
	<div class="hero-unit error"><p>This is content for a small device.</p><small>If you're seeing this you're probably on a smartphone.</small></div>
	<?php endif; ?>

	<div class="row-fluid">
		<div class="span6">

            <h4>Responsive content - not just responsive CSS</h4>
            <p>With Responsive Swipe, you can create a RESS site that sends different content to different devices. Serve minimal content to mobile browsers: show higher res images only on devices that can handle them - it's up to you how you use it.</p>
            <p>Responsive Swipe loads mobile content by default, then enriches it according to device.</p>

		</div>

		<div class="span6">
			<h4>Swipable</h4>

			<p>Responsive Swipe makes your site swipable on iPhones, iPads and newer Android devices - desktop users can navigate with their mouse as normal, or with right and left cursor keypresses. Try it now!</p>

			<h4>Light and agile</h4>
			<p>Responsive Swipe only loads the content you want to change in the area you define, making sites faster on mobile devices. This plugin turns your site into a one-page app.</p>

		</div>

		<div class="span12">
			<img src="img/swipe-devices.png" class="centre devices" />
		</div>

	</div>

	<div class="row-fluid">
		<div class="span12">
			<h4>A quick illustration</h4>
			<p>If you're on a desktop computer, you can see how content can adapt to different devices by adding #emulator to the URL of this page and refreshing, then resize your browser - or for the lazy, <a href="http://<?php echo get_site_url(); ?>#emulator" target="_blank" class="no-ajax">here's a link</a>. The coloured panel above will change depending on your window width. (In normal use, Responsive Swipe chooses what content to serve based on the device's screen width, not browser window width.) While you're in that mode, check out the big logo  image in Firebug or Chrome Developer Tools. When the page first loads it'll be a small image file, <code>logo-small.png</code>. At window sizes above 320 and 480 pixels, it'll be <code>logo-medium.png</code> or <code>logo-large.png</code>. It's a rough illustration of how Responsive Swipe lets you tailor the size of your image files to the capabilities of the devices viewing them.</p>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<h4>What the dickens is RESS?</h4>
			<p>RESS stands for "Responsive Design + Server Side Components". It's an idea <a href="http://www.lukew.com/ff/entry.asp?1392">first described</a> by Luke Wroblewski in 2011. Basically it means combining responsive CSS with back-end code that sends back different responses to different devices.</p>
			<p>If you want to try a slightly different RESS approach, here's a <a href="http://www.netmagazine.com/tutorials/getting-started-ress">tutorial</a> by Anders Andersen.</p>
		</div>
	</div>

	<!-- Element containing metadata about ths page, which Responsive Swipe uses -->
	<span class="responsive-swipe-meta" data-pagedata="{&quot;title&quot;:&quot;Responsive Swipe - Home&quot;,&quot;environment&quot;:&quot;prod&quot;}"></span>

</div> <!-- #pageBodyInner -->

<?php render_footer();
