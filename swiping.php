<?php

require 'lib/utils.php';
require 'lib/outer_page_bits.php';

render_header();

// Useful to have no space before pageBodyInner - we check it with regex
?><div class="pageBodyInner">

	<?php nav_header(); ?>

	<div class="jumbotron">
    <h1>Swiping</h1>
  </div>

	  <div class="row-fluid">
    <div class="span12">
		<h3>How it works</h3>
		<p>Responsive Swipe uses an adapted version of the <a href="http://cubiq.org/swipeview">SwipeView</a> library to respond to horizontal swiping gestures. Animation is done with CSS transitions. To determine if a browser will support the swipe feature, we check if it supports the history API. If it does, it'll almost certainly also support the CSS transitions we need.</p>
		<p>The plugin degrades gracefully: older browsers like IE8 get neither swipe nor ajax loading of content - pages load in the traditional way. We're treating older Android versions as non-swipe devices because the implementation of swipe gestures doesn't seem to work well with SwipeView.</p>
		<p>We add the class .has-swipe to the page if we detect a swipe-enabled device.</p>
		<p>The plugin loads the page currently being viewed into the centre pane of a three-pane strip. The pageBody div is the window through which the site is viewed. The next and previous pages are preloaded into the hidden off-canvas panes on either side. This is to allow for smoother swiping.</p>
		<img src="img/pagebody-panes.png" class="centre" />
		<h3>The edition</h3>
		<p>Responsive Swipe uses an "edition" - a simple list of URLs - to work out what page to show when you swipe back or forward. We pass the list as a JavaScript array in the edition option when we initialise the plugin. See <code>outer_page_bits.php</code> for an example.</p>
		<div class="row-fluid">
		<pre class="span10 offset1">
var mySwipe = $('#pageBody').responsiveSwipe({
	edition: [
		baseUrl + 'index.php',
		baseUrl + 'responsive-content.php',
		baseUrl + 'swiping.php',
		baseUrl + 'installation.php',
		baseUrl + 'disclaimer.php'
	]
});</pre>
		</div>
		<p>You can change the edition at any time. For example, if a user views a post of a particular category, your JavaScript can use the <code>setEdition</code> method of the responsiveSwipe API to change the edition to a list of other posts in that category.</p>
		<h3>Dealing with page height</h3>
		<p>Because the three areas of content in the panes are of varying heights, as a pane slides into view we measure its height and ajdust the height of pageBody to match it.</p>
		<img src="img/before-height-adjustment.png" class="centre" />
		<img src="img/after-height-adjustment.png" class="centre" />
		<p>Content within a page can also grow while the page is being displayed - for example if the content displayed in a live comments plugin gets bigger - so we're continually readjusting this height.</p>
		<p>To make sure the pages in the off-canvas side panes swipe in with their tops aligned at the top of the currently visible area, as the user scrolls down the page we add a top margin to the side panes. If the user scrolls down 100px, we add 100px margin to the top of the side pane content. This keeps the top of that content always aligned with the part of the page the user is currently viewing, so when the user swipes to the next or previous page it comes in at the top of their screen. </p>
		<img src="img/sliding-in-at-the-top.png" class="centre medium" />
		<h3>The history back button</h3>
		<p>Using the history back button doesn't result in a backwards swipe transition - we just load the previous page in the history buffer with Ajax.</p>
    </div>
  </div>

	<!-- Element containing metadata about ths page, which Responsive Swipe uses -->
	<span class="responsive-swipe-meta" data-pagedata="{&quot;title&quot;:&quot;Responsive Swipe - Swiping&quot;,&quot;environment&quot;:&quot;prod&quot;}"></span>

</div> <!-- #pageBodyInner -->

<?php render_footer();