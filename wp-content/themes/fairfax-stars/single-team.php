<?php
/**
 * @package WordPress
 * @subpackage ThemeWoot
 * @author ThemeWoot Team 
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
$format=get_post_format() === false? 'standard':get_post_format();
?>
<?php get_header(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="site-content container pt pb clearfix">

<article id="primary-wrapper" class="column eight">
    <?php global $wp_query;  
        p2p_type( 'players_to_teams' )->each_connected( $wp_query, array('post_status'=>'all', 'order' => 'ASC'), 'players' );
    ?>
    
    <?php if (have_posts()) : the_post(); ?>

        <?php $players = $post->players; ?>

    <div class="inner">

    <div class="post-blog">
    <div class="post-item">
        <h3 class="entry-title"><?php the_title(); ?></h3>
        <header class="entry-meta">
            <?php edit_post_link( __( 'Edit', 'Twoot' ), '<span class="edit-link">', '</span>' ); ?>
        </header>
        <article class="entry-content clearfix">
            <?php echo twoot_generator( 'load_template', 'format-' . $format ); ?>
            <?php the_content(); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . esc_attr__( 'Pages:', 'Twoot' ), 'after' => '</div>' ) ); ?>
        </article>
        <footer class="entry-meta clearfix">
            <?php if($tags_list = get_the_tag_list( '', __( ', ', 'Twoot' ) )) : ?>
            <span class="tags-link">
                <?php printf( __( 'Tags: %1$s', 'Twoot' ), $tags_list ); ?>
            </span>
            <?php endif; ?>
        </footer>
    </div>
    </div>
    <!--end post blog-->

    <?php 
        // $q = new Twoot_Template_Related_Posts(array(
        //  'title' => esc_attr__('Related Posts', 'Twoot'), 
        //  'counts' => twoot_get_frontend_func('opt', 'opt', 'blog_related_counts'),
        //  'order' => twoot_get_frontend_func('opt', 'opt', 'blog_related_order'),
        //  'orderby' => twoot_get_frontend_func('opt', 'opt', 'blog_related_orderby'),
        //  'post_type' => 'post',
        //  'taxonomy'  => 'category'
        // ));

        // echo $q->post();
    ?>

    <?php 
        // if(comments_open()) { 
        //  comments_template( '', true ); 
        // } 
    ?>

    </div>

    <?php endif; ?>

</article>
<!--end #primary-->

<aside id="secondary" class="sidebar-right side-widgets-area  column four">
    <div class="inner">
        <div class="widget widget_text">
            <h3 class="title">Roster</h3>
            <?php if(count($players) == 0) : ?>
                <p>TBA</p>
            <?php endif; ?>
            <ul>
                <?php foreach($players as $post) : setup_postdata($post); ?>
                    <?php if(get_post_status() == 'publish') :  ?>
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <?php stars_edit_link(); ?>
                        </li>
                    <?php else : ?>
                        <li><?php the_title(); ?>
                            <?php stars_edit_link(); ?>
                        </li>
                    <?php endif; ?>
                    
                <?php endforeach; wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
</aside>

</div>
</div>
<!--end #content-->

<?php get_footer(); ?>