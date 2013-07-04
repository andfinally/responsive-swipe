<?php

require 'lib/utils.php';
require 'lib/outer_page_bits.php';

render_header();

// Useful to have no space before pageBodyInner - we check it with regex
?><div class="pageBodyInner">

	<?php nav_header(); ?>

	<div class="jumbotron">
    <h1>Responsive Content</h1>
  </div>

	  <div class="row-fluid">
    <div class="span12">

		<h3>It's a single page app</h3>
		<p>This site is a single page app. When you first hit it you get a normal page of content, including the header and footer and CSS and JavaScript files. As soon as the JavaScript has loaded into the browser it handles all subsequent requests to the site. When you click on a link, instead of loading a whole new page, it does an Ajax call for the page you wanted and loads just the content in a central content area on the page that's already there.</p>
		<p>This means you don't have to wait for the header and footer to download all over again, and the browser doesn't have to bother with fetching and reparsing the JavaScript and CSS. You simply download the content you wanted.</p>
		<p>For a simple example of this kind of loading, see the jQuery plugin <a href="http://pjax.heroku.com/">pjax</a>, which inspired this aspect of Responsive Swipe.</p>

		<h3>Responses based on screen width</h3>
		<p>As soon as it loads, Responsive Swipe measures the screen width of the device that's viewing the site and works out what range of widths it falls into. When it makes its Ajax requests it adds a parameter to the URL that represents the screen width. This allows the server-side code to send back suitable content for the likely bandwidth connection and processing power of the device.</p>
		<img src="img/widths.png" class="centre" />
		<p>In this demo, the PHP sends back different HTML based on how wide the visitor's screen is. This method enables you to serve smaller image files and minimal content to mobiles, while desktop users can still enjoy the high-res images and other extras.</p>
		<p>Responsive Swipe handles all click events on internal links. It doesn't interfere with links to another domain. We append the parameter frag_width to tell the PHP what version of the content to serve. On a desktop PC, if your screen is more than 1024 pixels wide, the parameter will be <code>frag_width=1024</code>. We've set our breakpoints to 481, 768 and 1024 pixels on this site, but you can define them however you like.</p>
		<p>Responsive Swipe doesn't save the screen width in a session variable or cookie, but passes it with every internal request. Without the <code>frag_width</code> parameter the server returns a whole page. With it, the server returns a fragment of a page suitable for small, medium or large layouts.</p>
		<p>You can see a page fragment suitable for a mobile device by adding frag_width=0 to the end of the URL for any page on this site, for example</p>
		<p class="text-center"><?php echo '<a href="http://' . get_site_url() . '?frag_width=0" target="_blank" class="no-ajax">http://' . get_site_url() . '?frag_width=0</a>'; ?></p>
		<p>When you're viewing a page with a <code>frag_width</code> parameter, you're seeing the .pageBodyInner div - it contains the main content of the page, including the masthead, but excluding the HTML header and page footer with CSS and JS files. This is what Responsive Swipe injects into the content area of the page when you click on a link. The fragment of HTML includes the <code>&lt;div class=&quot;pageBodyInner&quot;&gt;</code> tag and everything inside it.</p>
		<p>0 is the minimal breakpoint: other possible values are <code>frag_width=481</code>, <code>frag_width=768</code> and <code>frag_width=1024</code>. 480, 768 and 1024 are the breakpoints we've defined in the breakpoints option in responsive-swipe.js. They correspond to the nominal widths of a landscape iPhone, portrait iPad and landscape iPad or desktop.</p>
		<p>We've also added the <code>class="no-ajax"</code> to the <code>a</code> tag in the link above. This tells Responsive Swipe to ignore the link and let the browser load it normally.</p>
		<p>You'll need a server-side language like PHP to respond to these parameters with the right content: you're free to configure that part of the application however you like. There's a rough PHP example in this demo.</p>

		<h3>Caching</h3>
		<p>Every time we do an Ajax request for a fragment, we cache it in an object with the key being the URL. (We cache to 50 fragments.) So if the user goes back to a page he's already seen we get it from the cache. This has a massive effect on the speed of backward swiping.</p>
		<p>Older browsers like IE8 don't use this cache because they don't use the fragments.</p>




		<p>To view the different responses, add #emulator&debug to the end of the URL and refresh - the site will start to measure browser width instead of screen width and send back content for the different widths as it normally would for different devices.
		With these parameters, the site will also output debug info to the JavaScript console, including the pageData object, which contains all the most important metadata for each page, including the click type that got the user to the page, the average time taken for all Ajax calls, and the referrer.

		As a single-page app, the site only fires the dom ready event once, when you first hit it. Instead of dom ready we use custom calls like afterShow, which is run after a page has been displayed in the middle pane.
		Services like Facebook comments and Google DFP for advertising are handled with calls to their APIs.
		To deal with occasional plugins on our pages that require dom ready, when we detect one of them in the visible page we currently refresh the whole page when the user scrolls down - a not very satisfactory experience for the user.
		The site architecture also means that for most browsers there are three "pages" loaded at any time.</p>

    </div>
  </div>

	<!-- Element containing metadata about ths page, which Responsive Swipe uses -->
	<span class="responsive-swipe-meta" data-pagedata="{&quot;title&quot;:&quot;Responsive Swipe - Responsive Content&quot;,&quot;environment&quot;:&quot;prod&quot;}"></span>

</div> <!-- #pageBodyInner -->

<?php render_footer();