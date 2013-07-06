<?php

require 'lib/utils.php';
require 'lib/outer_page_bits.php';

render_header();

// Useful to have no space before pageBodyInner - we check it with regex
?>
<div class="pageBodyInner" xmlns="http://www.w3.org/1999/html">

	<?php nav_header(); ?>

	<div class="jumbotron">
    <h1>Setup</h1>
  </div>

	  <div class="row-fluid">
    <div class="span12">
		<h3>This demo site</h3>
		<p>The best way to familiarise yourself with the ins and outs of Responsive Swipe is to download the <a href="http://github.com/andfinally/responsive-swipe">code for this demo site</a>. If you're familiar with GitHub you'll know how to clone the repository. If you don't, download the zip file with the site code here and extract to the root of a PHP-enabled server.</p>
		<a href="https://github.com/andfinally/responsive-swipe/archive/master.zip"><img src="img/download-zip.png" class="centre actual" /></a>
		<p>If you change the path of the site from /responsive-swipe, update the <code>baseUrl</code> variable in <code>outer_page_bits.php</code>.</p>
		<p>Once you're confident in how it all works, all you need to get started on your own implementation is the files <code>responsive-swipe.js</code> and <code>swipeview.js</code>. You'll find helpful comments in <code>responsive-swipe.js</code>, and a lot of options you may find useful.</p>

		<h3>Basic initialisation</h3>
		<p>To initialise the plugin with a static "edition" list, pass a selector for the element that contains your #swipeview-slider div and call responsiveSwipe. Here's a basic example, passing the edition list of URLs the plugin will swipe to.</p>
		<div class="row">
			<pre class="span8 offset2">
var mySwipe = $('#pageBody').responsiveSwipe({
	edition: ['/', '/foo.php', '/bar.php', '/etc.php']
});</pre>
		</div>
		<h3>responsiveSwipe methods</h3>
		<p>The responsiveSwipe API has these methods:</p>
		<ul>
			<li><b>setEdition</b> - allows you to change the list of pages responsiveSwipe will swipe to. Pass it a simple array of URLs of pages in the site.</li>
			<li><b>gotoUrl</b> - calling this loads and swipes in a specific page.</li>
			<li><b>gotoNext</b> and <b>goToPrevious</b> - swipe to the next and previous pages in the active edition.</li>
		</ul>
		<p>If you've initialised the plugin with a line like the one in the basic initialisation example above, you'd call these API methods like this: <code>mySwipe.gotoUrl('disclaimer.php')</code>.</p>
		<p>A very important option you can set when you initialise the plugin is <code>afterShow</code>. This is Responsive Swipe's replacement for the document ready event, which is no longer useful in an Ajax site. Specify a custom function for this option: the plugin will run that function after it displays a new page in the content area. It'll do this for each new page it loads: it can be very useful for whatever DOM changes you'd like to make once a page has appeared. For example, you might call social plugin APIs at this point.</p>
		<div class="row">
			<pre class="span8 offset2">
var afterShow = function() {
	... your domready type stuff here ...
}

var mySwipe = $('#pageBody').responsiveSwipe({
	... other options ...
	afterShow: afterShow
});
			</pre>
		</div>
		<h3>Page titles</h3>
		<p>You can use a hidden page data element to pass info from the HTML fragment to the plugin. For example, to tell the plugin what the <code>title</code> tag should be for the current page, include an element with the class <code>responsive-swipe-meta</code> anywhere in your HTML. Then in a data attribute <code>data-pagedata</code> include an HTML-encoded JavaScript object with a <code>title</code> key and value pair. With every page change Responsive Swipe reads the data-pagedata attribute. If it finds a <code>title</code> in the object, it'll use the value as the title of the page. See the example in this page:</p>
			<div class="row">
				<pre class="span10 offset1">&lt;span class=&quot;responsive-swipe-meta&quot; data-pagedata=&quot;{&amp;quot;title&amp;quot;:&amp;quot;Responsive Swipe - Setup&amp;quot;,&amp;quot;environment&amp;quot;:&amp;quot;prod&amp;quot;}&quot;&gt;&lt;/span&gt;</pre>
			</div>
		<h3>Dynamically switching the swipe edition</h3>
		<p>The <code>responsive-swipe-meta</code> element is also handy for passing an edition list that is relevant to the current page. This is a fancier feature that allows you to switch editions if the user clicks on a link to the page. So for example if a user clicks on a link to a blog post about CSS, you can switch the edition so their next swipe will take them to another post on that topic.</p>
		<p>To do this, make sure the pageData object in the data-pagedata attribute includes an edition list: <code>edition: ['/css-intro.php', '/css-selectors.php', '/css3-techniques.php']</code>. When this is HTML-encoded, your pageData element would look like this:</p>
		<div class="row">
			<pre class="span10 offset1">&lt;span class=&quot;responsive-swipe-meta&quot; data-pagedata=&quot;{&amp;quot;title&amp;quot;:&amp;quot;Responsive Swipe - Setup&amp;quot;,&amp;quot;environment&amp;quot;:&amp;quot;prod&amp;quot;,&amp;quot;edition&amp;quot;:[&quot;/css-intro.php&quot;, &quot;/css-selectors.php&quot;, &quot;/css3-techniques.php&quot;]}&quot;&gt;&lt;/span&gt;</pre>
		</div>
		<p>Then include this in your afterShow function:</p>
		<div class="row"><pre class="span10 offset1">var afterShow = function (context, pageData, api) {

	if( pageData.clickType === 'initial' || pageData.clickType === 'link') {
		api.setEdition(pageData.edition);
	}

}

var mySwipe = $('#pageBody').responsiveSwipe({
	afterShow: afterShow
});
		</pre></div>
		<p>This sets the edition to the one in the pageData object, but only if the user hits the page directly, or if he's arrived here by clicking on a link.</p>
		<h3>Server-side code</h3>
		<p>We've included some very basic PHP code with this demo. If you're handy with a back-end language you can create something more sophisticated. For example, you could create a PHP layout class that reads the <code>frag_width</code> parameter and initialises a layout for that breakpoint with a set of options like image sizes. To make sure Google always gets the full version of your content, you could the check the user agent in your PHP and choose the biggest layout if it's the Googlebot.</p>
    </div>
  </div>

	<!-- Element containing metadata about ths page, which Responsive Swipe uses -->
	<span class="responsive-swipe-meta" data-pagedata="{&quot;title&quot;:&quot;Responsive Swipe - Setup&quot;,&quot;environment&quot;:&quot;prod&quot;}"></span>

</div> <!-- #pageBodyInner -->

<?php render_footer();