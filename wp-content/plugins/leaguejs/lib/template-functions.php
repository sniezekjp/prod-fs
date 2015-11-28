<?php

function stars_edit_link(){
    if(is_admin() || is_super_admin()){
        $edit_link = $edit_link = get_edit_post_link( get_the_ID() ); ?>
        <a href="<?php echo $edit_link; ?>">(Edit)</a>
        <?php
    }
}

function stars_tagged_player_articles($player_name){
    $player_name = strtolower( str_replace(' ', '-', $player_name) );
    $args = array('tag'=>$player_name);
    $query = new WP_Query($args);     
    if($query->have_posts()) : 
        echo "<ul>";
        while($query->have_posts()) : $query->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php       
        endwhile; 
        echo "</ul>"; 
    else: 
        echo "<p>There are no articles with #".$player_name."</p>"; 
    endif; 
}

function stars_teams($gender, $season){ 
    $args = array(
        'season' => $season,
        'gender' => $gender,
        'post_type' => 'team',
        'posts_per_page' => -1
    );
    $teams = new WP_Query($args); 
?>
        <h3><?php echo ucfirst($gender) .' '. $season; ?> Teams</h3>
        <?php if($teams->have_posts()) : while($teams->have_posts()) : $teams->the_post(); ?>
            <p class="team-list-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
        <?php endwhile; endif; ?>
    <?php
}