(function ()
{
	// create zillaShortcodes plugin
	tinymce.create("tinymce.plugins.zillaShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("zillaPopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Insert Zilla Shortcode", ZillaShortcodes.plugin_folder + "/tinymce/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "zilla_button" )
			{	
				var a = this;
				
				var btn = e.createSplitButton('zilla_button', {
                    title: "Insert Zilla Shortcode",
					image: ZillaShortcodes.plugin_folder +"/tinymce/images/icon.png",
					icons: false
                });

                btn.onRenderMenu.add(function (c, b)
				{	
					a.addWithPopup( b, 'Accordions', 'accordions' );
					a.addWithPopup( b, 'Ads', 'ads' );
					c = b.addMenu({
                        title: 'Blogs'
                    });
					a.addWithPopup( c, 'Blog', 'blog' );
					a.addWithPopup( c, 'Blog Full', 'blog_full' );
					a.addWithPopup( c, 'Latest Blog', 'latest_blog' );
					a.addWithPopup( b, 'Button', 'button' );
					c = b.addMenu({
                        title: 'Carousels'
                    });
					a.addWithPopup( c, 'Best Sellers Product Carousel', 'best_sellers_product_carousel' );
					a.addWithPopup( c, 'Blog Carousel', 'blog_carousel' );
					a.addWithPopup( c, 'Featured Product Carousel', 'featured_product_carousel' );
					a.addWithPopup( c, 'Onsale Product Carousel', 'onsale_product_carousel' );
					a.addWithPopup( c, 'Product Carousel', 'product_carousel' );
					a.addWithPopup( c, 'Portfolio Carousel', 'portfolio_carousel' );
					a.addWithPopup( c, 'Testimonial Carousel', 'testimonial_carousel' );
					a.addWithPopup( c, 'Twitter Carousel', 'twitter_carousel' );
					a.addWithPopup( b, 'Columns', 'columns' );
					a.addWithPopup( b, 'Faqs', 'faqs' );
					a.addWithPopup( b, 'Gmap', 'gmap' );
					a.addWithPopup( b, 'Icon', 'icon' );
					a.addWithPopup( b, 'Icon Boxes', 'icon_boxes' );
					a.addWithPopup( b, 'Image', 'image' );
					c = b.addMenu({
                        title: 'Medias'
                    });
					a.addWithPopup( c, 'Audio', 'audio' );
					a.addWithPopup( c, 'Post Images', 'post_images' );
					a.addWithPopup( c, 'Post Masonry', 'post_masonry' );
					a.addWithPopup( c, 'Post Slider', 'post_slider' );
					a.addWithPopup( c, 'Video', 'video' );
					a.addWithPopup( b, 'Message Box', 'message_box' );
					a.addWithPopup( b, 'Number', 'number' );
					a.addWithPopup( b, 'Post Grid', 'post_grid' );
					a.addWithPopup( b, 'Post Left Grid', 'post_left_grid' );
					a.addWithPopup( b, 'Progress Bar', 'progress_bar' );
					a.addWithPopup( b, 'Price Table', 'price_table' );
					a.addWithPopup( b, 'Social Icons', 'social_icons' );
					a.addWithPopup( b, 'Slogan', 'slogan' );
					a.addWithPopup( b, 'Tagline', 'tagline' );
					a.addWithPopup( b, 'Team Members', 'team_members' );
					a.addWithPopup( b, 'Testimonial', 'testimonial' );
					a.addWithPopup( b, 'Tabs', 'tabs' );
					a.addWithPopup( b, 'Toggles', 'toggles' );
				});
                
                return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("zillaPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'Zilla Shortcodes',
				author: 'Orman Clark',
				authorurl: 'http://themeforest.net/user/ormanclark/',
				infourl: 'http://wiki.moxiecode.com/',
				version: "1.0"
			}
		}
	});
	
	// add zillaShortcodes plugin
	tinymce.PluginManager.add("zillaShortcodes", tinymce.plugins.zillaShortcodes);
})();