<?php

require 'lib/utils.php';
require 'lib/outer_page_bits.php';

render_header();

// Useful to have no space before pageBodyInner - we check it with regex
?><div class="pageBodyInner">

	<?php nav_header(); ?>

 <div class="jumbotron">
    <h1>Disclaimer</h1>
    <p class="lead">This product is not <small>bla bla bla..</small></p>
  </div>

  <div class="row-fluid">
    <div class="span8 offset2">
		<p>Sorry, we aren't able to provide support to anyone who uses this plugin. We're far too busy cultivating our hedonistic lifestyles to bother with your trifling problems. We've explained everything as best we can: the rest is up to you.</p>
		<p>This plugin was originally developed for <a href="http://metro.co.uk">Metro</a>, and can be seen in action on its site, but Metro is not responsible for the maintenance of this version of it, and will accept no liability for any damage arising from any use you may make of it.</p>
		<p>You're free to use this plugin, change it and do whatever else you like with it, so long as you comply with the licence terms of the people whose work we've used in this project, especially Matteo Spinelli, whose excellent <a href="http://cubiq.org/swipeview">SwipeView</a> carousel we have ruthlessly cannibalised. The Ajax part of the plugin was also inspired by <a href="https://github.com/defunkt/jquery-pjax">pjax</a>. Many thanks to the authors whose work has helped us, and most of all we bow to the genius of the only begetter of Responsive Swipe, <a href="https://github.com/stephanfowler" title="Stephan Fowler">Stephan Fowler</a>:</p>
		<a href="https://github.com/stephanfowler" title="Stephan Fowler"><img src="img/stephan-fowler.png" class="centre actual" /></a>
		<p>Use this product at your own risk. Consult a physician before attempting to operate any heavy machinery. In fact best just lie down in a darkened room.</p>
    </div>
  </div>

	<!-- Element containing metadata about ths page, which Responsive Swipe uses -->
	<span class="responsive-swipe-meta" data-pagedata="{&quot;title&quot;:&quot;Responsive Swipe - Disclaimer&quot;,&quot;environment&quot;:&quot;prod&quot;}"></span>

</div> <!-- #pageBodyInner -->

<?php render_footer();