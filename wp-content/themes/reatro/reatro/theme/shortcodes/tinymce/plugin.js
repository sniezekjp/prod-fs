(function($) {
"use strict";   

  //Shortcodes
  tinymce.PluginManager.add( 'zillaShortcodes', function( editor, url ) {


		editor.addCommand("zillaPopup", function ( a, params )
		{
			var popup = params.identifier;
			tb_show("Insert Zilla Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
		});

		editor.addButton( 'zilla_button', {
			type: 'splitbutton',
			icon: false,
			title:  'Zilla Shortcodes',
			onclick : function(e) {},
			menu: [
			{text: 'Accordions',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Accordions',identifier: 'accordions'})
			}},
			{text: 'Ads',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Ads',identifier: 'ads'})
			}},
			
			
			/** Blogs **/
			{
				text: 'Blogs',
				menu: [
					{text: 'Blog',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Blog',identifier: 'blog'})
					}},
					{text: 'Blog Full',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Blog Full',identifier: 'Blog Full'})
					}},
					{text: 'Latest Blog',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Latest Blog',identifier: 'latest_blog'})
					}}
				]
			}, // End Blogs Section
			
			{text: 'Button',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Button',identifier: 'button'})
			}},
			
			/** Carousels **/
			{
				text: 'Carousels',
				menu: [
					{text: 'Best Sellers Product Carousel',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Best Sellers Product Carousel',identifier: 'best_sellers_product_carousel'})
					}},
					{text: 'Blog Carousel',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Blog Carousel',identifier: 'blog_carousel'})
					}},
					{text: 'Featured Product Carousel',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Featured Product Carousel',identifier: 'featured_product_carousel'})
					}},
					{text: 'Onsale Product Carousel',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Onsale Product Carousel',identifier: 'onsale_product_carousel'})
					}},
					{text: 'Product Carousel',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Product Carousel',identifier: 'product_carousel'})
					}},
					{text: 'Portfolio Carousel',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Portfolio Carousel',identifier: 'portfolio_carousel'})
					}},
					{text: 'Testimonial Carousel',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Testimonial Carousel',identifier: 'testimonial_carousel'})
					}},
					{text: 'Twitter Carousel',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Twitter Carousel',identifier: 'twitter_carousel'})
					}}
				]
			}, // End Blogs Section

			{text: 'Columns',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Columns',identifier: 'columns'})
			}},
			{text: 'Faqs',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Faqs',identifier: 'faqs'})
			}},
			{text: 'Gmap',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Gmap',identifier: 'gmap'})
			}},
			{text: 'Icon',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Icon',identifier: 'icon'})
			}},
			{text: 'Icon Boxes',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Icon Boxes',identifier: 'icon_boxes'})
			}},
			{text: 'Image',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Image',identifier: 'image'})
			}},
			
			/** Medias **/
			{
				text: 'Medias',
				menu: [
					{text: 'Audio',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Audio',identifier: 'audio'})
					}},
					{text: 'Post Images',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Post Images',identifier: 'post_images'})
					}},
					{text: 'Post Masonry',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Post Masonry',identifier: 'post_masonry'})
					}},
					{text: 'Post Slider',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Post Slider',identifier: 'post_slider'})
					}},
					{text: 'Video',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Video',identifier: 'video'})
					}}
				]
			}, // Medias

			{text: 'Message Box',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Message Box',identifier: 'message_box'})
			}},
			{text: 'Number',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Number',identifier: 'number'})
			}},
			{text: 'Post Grid',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Post Grid',identifier: 'post_grid'})
			}},
			{text: 'Post Left Grid',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Post Left Grid',identifier: 'post_left_grid'})
			}},
			{text: 'Progress Bar',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Progress Bar',identifier: 'progress_bar'})
			}},
			{text: 'Price Table',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Price Table',identifier: 'price_table'})
			}},
			{text: 'Social Icons',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Social Icons',identifier: 'social_icons'})
			}},
			{text: 'Slogan',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Slogan',identifier: 'slogan'})
			}},
			{text: 'Tagline',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Tagline',identifier: 'tagline'})
			}},
			{text: 'Team Members',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Team Members',identifier: 'team_members'})
			}},
			{text: 'Testimonial',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Testimonial',identifier: 'testimonial'})
			}},
			{text: 'Tabs',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Tabs',identifier: 'tabs'})
			}},
			{text: 'Toggles',onclick:function(){
				editor.execCommand("zillaPopup", false, {title: 'Toggles',identifier: 'toggles'})
			}},
			]		
	  });
 
  });
         
})(jQuery);