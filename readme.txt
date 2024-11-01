=== WP Responsive Data Image ===
Contributors: roman01la
Tags: rwd responsive web design, responsive img, responsive images
Requires at least: 3
Tested up to: 3.3
Stable tag: 1.1.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin allows using of responsive images ( <img> element ) for different screen resolutions.

== Description ==

Plugin detects screen width and let browser render image file which is neccessary to use at the moment.

Activate Plugin and upload image files using *WordPress Media Uploader*. You can use four image variants, each variant name shoud be specifically renamed:

* _image name_**-small** - for low-res screens ( for smartphones );
* _image name_**-med** - for med-res screens ( for tablets );
* _image name_ - for standart/normal resolution screens (nothing changed) ( for desktops );
* _image name_**-large** - for high-res screens ( for high-res screens );

Define breakpoints using this script into the ‘<head></head>’ tag of your header.php template:

‘<script>
	$(function() {
		$(".adapted").rdi({
			"mobile": 480,
			"tablet": 1024,
			"desktop": 1920
		});
	})
</script>’

These are standart values replace them with yours.

Use **RDI** button while editing post/page to insert *[rdi][/rdi]* shortcode. Put *standart/normal* image path into the shortcode. You can align image with **rdi-align** attribute (by default image will be centered):

* [rdi **align="rdi-left"**][/rdi] - align to the left;
* [rdi **align="rdi-right"**][/rdi] - alight to the right.

That's all!

Shortcode will generate markup similar to this:

‘<img class="rdi-adapted" data-src="_path_">
<noscript>
   <img src="_path_">
</noscript>’

**data-src** attribute contains **standart/normal** image path. Plugin uses this url for generating appropriate path to the necessary image file which should be used at the moment. If there's no appropriate file, browser will render **standart/normal** image. In case if JavaScript is disabled browser will use **noscript img** element which contains **standart/normal** image.

== Installation ==

1. Upload to the '/wp-content/plugins/' directory.
2. Activate through the 'Plugins' menu in WordPress.
3. Insert code into the ‘<head></head>’ tag of your header.php template and set values for smartphone, tablet and desktop.

== Changelog ==

= 1.1.5 =
* Minor bugs fixed

= 1.1 =
* Added custom breakpoints

= 1.0 =
* Plugin Released.