responsive-swipe-demo
=====================

Demo site illustrating the splendid Responsive Swipe jQuery plugin. You can see this site working at <a href="http://humbleself.com/responsive-swipe/">http://humbleself.com/responsive-swipe/</a>.

See <a href="https://github.com/andfinally/responsive-swipe">andfinally/responsive-swipe</a> for details of the plugin.

This demo requires a web server with PHP.

Responsive Swipe is designed only to load the necessary inner content of pages with an Ajax request. Your PHP pages need to check for a frag_width GET param and return only the inner content of the page if they find it. If your pages serve a full HTML page in this situation, with head, body and script tags and CSS includes, the page will go into an infinite loop as it repeatedly tries to load the content.

The outer parts of the pages, including the JavaScript that initialises responsive-swipe, are in /responsive-swipe/lib/outer_page_bits.php.

 This demo also illustrates the plugin's responsive content functionality - add #emulator to the URL of the homepage, refresh, and try resizing your browser. You'll see how responsive-swipe can load different content at different window widths, just as it would for different device widths in normal use.
