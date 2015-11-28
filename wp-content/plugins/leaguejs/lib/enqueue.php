<?php

add_action( 'wp_enqueue_scripts', 'leaguejs_scripts' );
function leaguejs_scripts() {
	wp_enqueue_script( 'leaguejs-main', plugins_url( '../assets/js/main.js' , __FILE__ ), array('jquery'), '1.0.0', true );
}

add_action('wp_enqueue_scripts', 'localize_team_menu', 100);
function localize_team_menu() {
    $season = get_option('active_season'); 
    $menu['Boys'] = array(); 
    $menu['Girls'] = array(); 
    
    //Boys Teams
    $args = array(
        'post_type' => 'team',
        'season' => $season, 
        'gender' => 'boys',
        'posts_per_page' => -1
    );
    $teams = new WP_Query($args); 
    if($teams->have_posts()) : while($teams->have_posts()) : $teams->the_post(); 
        $menu['Boys'][] = array(
            'link' => get_permalink(), 
            'team' => get_the_title()
        );
    endwhile; 
    endif;
    
    //Girls Teams
    $args = array(
        'post_type' => 'team',
        'season' => $season, 
        'gender' => 'girls',
        'posts_per_page' => -1
    );
    $teams = new WP_Query($args); 
    if($teams->have_posts()) : while($teams->have_posts()) : $teams->the_post(); 
        $menu['Girls'][] = array(
            'link' => get_permalink(), 
            'team' => get_the_title()
        );
    endwhile; 
    endif;
    wp_reset_postdata(); 
    wp_localize_script( 'leaguejs-main', 'team_menu', $menu );
} 