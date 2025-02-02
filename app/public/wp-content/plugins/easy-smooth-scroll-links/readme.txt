=== Easy Smooth Scroll Links  - Smooth Scrolling Anchor ===
Contributors: pootlepress, shramee, jamie
Tags: smooth scroll, jquery smooth scroll, smooth scroll javascript, scroll to top, smooth scroll to anchor, smooth scroll plugin, smooth scroll tutorial, anchor, anchor text, page to id, smooth scroll jquery
Requires at least: 3.8
Tested up to: 5.9.0
Stable tag: 2.23.1
License: GPLv2+
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Add Smooth Scroll Links to any link with scroll animation effects to page anchors, smooth scroll and more.

== Description ==
Easy Smooth Scroll Links adds scroll animation effects to page anchors, smooth scroll and more.

= Major Features =
* You can set scroll speed and offset value.
* Choose from 30 Scrolling Animation Effects
* You can exclude certain anchors from scrolling.
* Works on all major browsers: IE, Firefox, Chrome, Safari...
* Visual Editor Anchor Button
* Shortcode Supported [anchor]anchorname[/anchor]

== Installation ==
1. Navigate to the 'Add New' in the plugins dashboard
2. Search for 'Easy Smooth Scroll Links'
3. Click 'Install Now'
4. Activate the plugin on the Plugin dashboard

== Frequently Asked Questions ==

= It doesn’t work ! =
It should work on all major browsers and all modern WP themes. If it doesn’t,  there are mainly 2 kinds of problems:
* Missing of required js files. There should be jquery.easing file loading after jQuery.js file.  If not, the reason can be complex, maybe plugin conflicts, maybe theme not compatible…
* Incorrect anchor url writing,  for example, my WP website is https://www.domain.com/ then I should put https://www.domain.com/#about in menu, if I forgot the www and use https://domain.com/#about , things just go wrong…


== Screenshots ==
1. Add smooth scroll effect to any link in seconds
2. Plugin Options Page
3. Animation Effects
4. TinyMCE Editor Anchor Button
5. Input Anchor Name

== Changelog ==

= 2.23.1 =
* 2022/03/21
* Security - Escaping options output
* Freemius SDK update

= 2.23.0 =
* 2021/03/08
* Freemius integration

= 2.22 =
* 2021/01/29
* removed WP 301 promo campaign code

= 2.21 =
* 2020/10/20
* minor update

= 2.2 =
* 2019/08/05
* minor bug fixes
* 50,000 installations; 247,643 downloads

= 2.1.1 =
* Load minified version of jquery.easing js file from cloudflare.
* Translation ready.
= 2.1 =
* WordPress 4.5 jQuery fix
= 2.0 =
* Choose to enable Scrolling from One Page to Another or not. This feature is experimental, might cause conflict with some slider plugins, or blank pages.
= 1.9 =
* Experimental Feature: smooth scroll from one page to another.  Read more:
* GoToTop button Removed
= 1.8 =
* Visual Editor Anchor Button now using id attribute instead of name.
= 1.7 =
* WordPress 3.9 Compatible
* Links in Image Map are now supported
= 1.6 =
* New:  Option to set offset for GoToTop Button.
= 1.5 =
* New: Option to enable Go To Top Button (with custom scroll speed and animation effect)
= 1.4 =
* New: You can now exclude certain anchors from scrolling
* Improve: Set default scrolling animation effect to more smooth 'easeInQuint'
= 1.3.2 =
* New: Added 30 Scrolling Animation Effects
* Fix: Prevent saving empty input fields
= 1.3.1 =
* Fix: wp enqueue script error  when turning WP_DEBUG mode on
= 1.3 =
* New: You can set scroll speed and offset value on WordPress backend now !
= 1.2 =
* Fix：Chrome Compatibility Problem
* Fix: wp_enqueue_script was called incorrectly
= 1.1 =
* New : Add Page Anchor Shortcode.
Changed : Use wp_enqueue_script function to load the script instead of the default <script> tag.
= 1.0 =
* First Version
== Upgrade Notice ==
= 2.1 =
* WordPress 4.5 jQuery fix