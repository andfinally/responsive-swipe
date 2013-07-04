<?php

require 'lib/utils.php';
require 'lib/outer_page_bits.php';

render_header();

// Useful to have no space before pageBodyInner - we check it with regex
?><div class="pageBodyInner">

	<?php nav_header(); ?>

	<div class="jumbotron">
    <h1>Setup</h1>
  </div>

	  <div class="row-fluid">
    <div class="span12">
		<h3>This demo site</h3>
		<p>The best way to familiarise yourself with the ins and outs of Responsive Swipe is to download the <a href="http://github.com/andfinally/responsive-swipe">code for this demo site</a>. If you're familiar with GitHub you'll know how to clone the repository. If you don't, find this button in the bottom right of the GitHub page, download the zip file with the site files, and extract to the root of a PHP-enabled server.</p>
		<img src="img/download-zip.png" class="centre actual" />
		<p>If you change the path of the site from /responsive-swipe, update the <code>baseUrl</code> variable in <code>outer_page_bits.php</code>.</p>
		<p>Once you're confident in how it all works, all you need to get started on your own implementation is the files <code>responsive-swipe.js</code> and <code>swipeview.js</code>. You'll find helpful comments in <code>responsive-swipe.js</code>, and a lot of options you may find useful. responsiveSwipe's API currently has these methods:</p>
		<ul>
			<li><b>setEdition</b> - allows you to change the list of pages responsiveSwipe will swipe to. Pass it a simple array of URLs of pages in the site.</li>
			<li><b>gotoUrl</b> - calling this loads and swipes in a specific page.</li>
			<li><b>gotoNext</b> and <b>goToPrevious</b> - swipe to the next and previous pages in the active edition.</li>
		</ul>
		<p>If you've initialised the plugin with a line like the one in <code>outer_page_bits.php</code>, <code>var mySwipe = $('#pageBody').responsiveSwipe( ... )</code>, then you'd call these API methods like this: <code>mySwipe.gotoUrl('disclaimer.php')</code>.</p>
		<p>A very important option you can set when you initialise the plugin is <code>afterShow</code>. This is Responsive Swipe's replacement for the document ready event, which is no longer useful in an Ajax site. Specify a custom function for this option: the plugin will run that function after it displays a new page in the content area. It'll do this for each new page it loads: it can be very useful for whatever DOM changes you'd like to make once a page has appeared. For example, you might call social plugin APIs at this point.</p>
		<p><pre class="span10 offset1">
var myAfterShow = function() {
	... your domready type stuff here ...
}

var mySwipe = $('#pageBody').responsiveSwipe({
	... other options ...
	afterShow: myAfterShow
});
</pre></p>
		<h3>Page Titles</h3>
		<p>To reset the page title in your browser tab every time a new page is loaded, include an element with the class <code>responsive-swipe-meta</code> anywhere in your page. Then in a data attribute <code>data-pagedata</code> include an HTML-encoded JavaScript object that includes a <code>title</code> key and value pair. Responsive Swipe will use the value as the title of the page. See the example in this page:</p>
		<p><pre class="span10 offset1">&lt;span class=&quot;responsive-swipe-meta&quot; data-pagedata=&quot;{&amp;quot;title&amp;quot;:&amp;quot;Responsive Swipe - Setup&amp;quot;,&amp;quot;environment&amp;quot;:&amp;quot;prod&amp;quot;}&quot;&gt;&lt;/span&gt;</pre></p>
    </div>
  </div>

	<!-- Element containing metadata about ths page, which Responsive Swipe uses -->
	<span class="responsive-swipe-meta" data-pagedata="{&quot;title&quot;:&quot;Responsive Swipe - Setup&quot;,&quot;environment&quot;:&quot;prod&quot;}"></span>

</div> <!-- #pageBodyInner -->

<?php render_footer();