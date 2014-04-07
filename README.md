#Description

**WP-JSON** is in the simplest words a WordPress **theme**.

WordPress themes usually have some nice design behind, which makes your blog look cool. The assumption behind themes was simple: let's allow user to be able to swap between themes with only one (or maybe few) clicks of the mouse. The only problem is, that usually it's not this easy... Personally I like WordPress CMS. It's very well designed, looks good and works just fine - as a simple CMS it offers a lot of really good features. But the problem is that the blog-like structure of it, and therfore of themes as well, makes you hate it, because as a web developer you can't really spread your wings and fly. Instead you dig deep down trying to find a shortcut home.

In **WP-JSON** case I focused only on one functionality. Its job is serving the content in **JSON** format. Everything you can possibly want or need. Then outside of WordPress weird and structural structure, you can build really nice web application fed by JSON.

I hope that with this theme you will be proud, that your website is **_powered by WordPress_**.

#Requirements

1. PHP 5.3.0 - late static bindings (*http://www.php.net/manual/en/language.oop5.late-static-bindings.php*)

#Repository contents

## Branches

1. master - always stable branch
2. staging - development branch
3. all other branches are features or components branches, they don't work as standalone

## *libs* folder

Contains every library in the version I used, in a compressed format, usually in *zip* or *gz*.

## *public* folder

Contains full application, all the files needed to run WP-JSON theme based application, with use cases.

#Installation instructions

1. Navigate to this location *application_root/wordpress* and install WordPress CMS
2. In WordPress -> Appearance -> Themes activate WP-JSON theme
3. Make a call to *application_root/wordpress/posts* to check if it's working. It should return you an array with one default post.

#Use instructions

All available methods are derived directly from WP codex. If you make a call to *posts* method, you can include GET params from the list of available arguments for *get_posts* WP function (), and so on. Check **_Use cases_** section for all possible methods.

#Use cases

1. Posts method
 - call: *application_root/wordpress/posts* or *application_root/wordpress?function=get_posts*
 - docs: *https://codex.wordpress.org/Template_Tags/get_posts*
 - call with params: application_root/wordpress/posts?posts_per_page=10&offset=30

2. Categories method
 - call: *application_root/wordpress/categories* or *application_root/wordpress?function=get_categories*
 - docs: *http://codex.wordpress.org/Function_Reference/get_categories*
 - call with params: application_root/wordpress/categories?exclude=13,59

3. Pages method
 - call: *application_root/wordpress/pages* or *application_root/wordpress?function=get_pages*
 - docs: *https://codex.wordpress.org/Function_Reference/get_pages*
 - call with params: application_root/wordpress/pages?parent=0