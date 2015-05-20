=== Insert Pages ===
Contributors: figureone, the_magician
Tags: insert, pages, shortcode, embed
Requires at least: 3.0.1
Tested up to: 4.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Insert Pages lets you embed any WordPress content (e.g., pages, posts, custom post types) into other WordPress content using the Shortcode API.

== Description ==

Insert Pages lets you embed any WordPress content (e.g., pages, posts, custom post types) into other WordPress content using the Shortcode API.

The real power of Insert Pages comes when you start creating custom post types, either [programmatically in your theme](http://codex.wordpress.org/Post_Types), or using another plugin like [Custom Post Type UI](http://wordpress.org/plugins/custom-post-type-ui/). You can then abstract away common data types (like videos, quizzes, due dates) into their own custom post types, and then show those pieces of content within your normal pages and posts by Inserting them as a shortcode.

Here are two quick example use cases:

### Novice Use Case
Say you teach a course and you're constantly referring to an assignment due date in your course website. The next semester the due date changes, and you have to go change all of the locations you referred to it. Instead, you'd rather just change the date once! With Insert Pages, you can do the following:

1. Create a custom post type called **Due Date**.
1. Create a new *Due Date* called **Assignment 1 Due Date** with **Fri Nov 22, 2013** as its content.
1. Edit all the pages where the due date occurs and use the *Insert Pages* toolbar button to insert a reference to the *Due Date* you just created. Be sure to set the *Display* to **Content** so *Fri Nov 22, 2013* shows wherever you insert it. The shortcode you just created should look something like this: `[insert page='assignment-1-due-date' display='content']`
1. That's it! Now, when you want to change the due date, just edit the *Assignment 1 Due Date* custom post you created, and it will automatically be updated on all the pages you inserted it on.

### Expert Use Case
Say your site has a lot of video content, and you want to include video transcripts and video lengths along with the videos wherever you show them. You could just paste the transcripts into the page content under the video, but then you'd have to do this on every page the video showed on. (It's also just a bad idea, architecturally!) With Insert Pages, you can use a custom post type and create a custom theme template to display your videos+transcripts+lengths just the way you want!

1. Create a custom post type called **Video**.
1. Use a plugin like [Advanced Custom Fields](http://wordpress.org/plugins/advanced-custom-fields/) to add extra fields to your new *Video* custom post type. Add a **Video URL** field, a **Transcript** field, and a **Video Length** field.
1. Create a new *Video* called **My Awesome Video** with the following values in its fields:
	* *Video URL*: **http://www.youtube.com/watch?v=oHg5SJYRHA0**
	* *Transcript*: **We're no strangers to love, You know the rules and so do I...**
	* *Video Length*: **3:34**
1. Create a template in your theme so we can display the video content as we want. I won't cover this step here since it's pretty involved, but you can find more help in the [WordPress Codex](http://codex.wordpress.org/Theme_Development#Custom_Page_Templates). Let's assume you created a template called **Video with transcript** (video-with-transcript.php) that shows the youtube video in a [fancybox](http://fancybox.net/), and includes a button that shows the text transcript when a user clicks on it.
1. Edit the pages where you want the video to show up and use the *Insert Pages* toolbar button to insert a reference to the *Video* you just created. Be sure to set the *Display* to **Use a custom template**, and select your new template **Video with transcript**. The shortcode you just created should look something like this: `[insert page='my-awesome-video' display='video-with-transcript.php']`
1. That's it! Now you can create all sorts of video content and know that it's being tracked cleanly in the database as its own custom post type, and you can place videos all over your site and not worry about lots of duplicate content.

The possibilities are endless!

== Installation ==

1. Upload "insert-pages" to the "/wp-content/plugins/" directory.
1. Activate the plugin through the "Plugins" menu in WordPress.
1. Use the toolbar button while editing any page to insert any other page.

== Frequently Asked Questions ==

= Do I have to use the toolbar button to Insert Pages? =

No! You can type out the shortcode yourself if you'd like, it's easy. Here's the format:

`[insert page='{slug}|{id}' display='title|link|content|all|{custom-template.php}']`

Examples:

* `[insert page='your-page-slug' display='link']`
* `[insert page='your-page-slug' display='your-custom-template.php']`
* `[insert page='123' display='all']`

= Anything I should be careful of? =

Just one! The plugin prevents you from embedding a page in itself, but you can totally create a loop that will prevent a page from rendering. Say on page A you embed page B, but on page B you also embed page A. As the plugin tries to render either page, it will keep going down the rabbit hole until your server runs out of memory. Future versions should have a way to prevent this behavior!

== Screenshots ==

1. Insert Pages toolbar button.
2. Insert Pages browser.
3. Insert Pages shortcode example.

== Changelog ==

= 1.9 =
* Add data-post-id attribute to div container for each inserted page, now you can reference via jQuery with .data( 'postId' ). Props to Robert Payne for the pull request, thanks!

= 1.8 =
* Fix for custom post types marked as exclude_from_search not inserting correctly.

= 1.7 =
* Tested and works on WordPress 4.1;
* New display format: excerpt. Props to bitbucket user grzegorzdrozd for the pull request. https://bitbucket.org/figureone/insert-pages/commits/0f6402c98058858f76f3f865bb3f8c5aba4cda65

= 1.6 =
* Fix for long page template names causing Display field to wrap in the tinymce popup;
* Marked as WordPress 4.0 compatible.

= 1.5 =
* Fix for options button toggle in tinymce popup;
* Fix popup display on small screen sizes (mobile-friendly).

= 1.4 =
* Update for WordPress 3.9 (update to work under tinymce4);
* Can now edit existing shortcodes (click inside them, then click the toolbar button).

= 1.3 =
* Better documentation.

= 1.2 =
* Add retina toolbar icon.

= 1.1 =
* Minor changes to documentation.

= 1.0 =
* Initial release.

= 0.5 =
* Development release.

== Upgrade Notice ==

= 1.2 =
Added retina toolbar icon.

= 1.0 =
Upgrade to v1.0 to get the first stable version.
