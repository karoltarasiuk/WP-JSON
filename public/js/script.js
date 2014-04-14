/* UNCOMMENT LINES YOU WANT TO TEST */

// general callback function
function c() {
	console.log(arguments);
}

// WPJSON creation:
var wpjson1 = new WPJSON();
var wpjson2 = WPJSON('wordpress');

//c(wpjson1, wpjson2);

// getting posts
//wpjson1.getPosts(c);
//wpjson1.getPosts(c, { noMeta: 1 });
//wpjson2.getPostsPagination(c, 10, 1);

// getting pages
//wpjson1.getPages(c);
//wpjson2.getPagesPagination(c, 10, 1);

// getting categories
//wpjson1.getCategories(c);