<?php
/**
 * Plugin Name: LeagueJS
 * Plugin URI: http://jps26.com
 * Description: Manage players and teams
 * Version: 1.0.0
 * Author: JP
 * Tested up to: 4.3
 *
 * Text Domain: leaguejs
 */

require_once('lib/create_post_type.php');
require_once('lib/league_register_taxonomy.php');
require_once('lib/enqueue.php');
require_once('lib/template-functions.php');
require_once('lib/woocommerce.php');


/**
 * Create players and teams
 */
add_action( 'init', 'league_post_types' );
function league_post_types() {
    create_post_type('player', 'Player', 'Players');
    create_post_type('team', 'Team', 'Teams');
    league_register_taxonomy('season', 'Season', 'Seasons');
    league_register_taxonomy('gender', 'Gender', 'Genders');
}

/**
 * Connect players and teams
 */
add_action( 'p2p_init', 'league_post_connections' );
function league_post_connections() {
    p2p_register_connection_type(array(
        'name' => 'players_to_teams',
        'from' => 'player',
        'to' => 'team',
        'cardinality' => 'many-to-many'
    ));
    p2p_register_connection_type(array(
        'name' => 'players_to_posts',
        'from' => 'player',
        'to' => 'post',
        'cardinality' => 'many-to-many'
    ));
}

add_action('admin_menu', 'stars_settings');
function stars_settings() {
    add_options_page('Stars Settings', 'Stars Settings', 'manage_options', 'stars-settings', 'stars_settings_page_output');
}

function stars_save_settings(){
    if( isset($_POST['active_season']) && !empty($_POST['active_season']) ){
        update_option('active_season', $_POST['active_season']); 
    }
}

function stars_settings_page_output(){ 
    stars_save_settings();
    $seasons = get_terms('season', array('hide_empty'=>false) );
    $active_season = get_option('active_season', '');     
?>
    <h1>Stars Settings</h1>
    <p>Active Season</p>
    <form action="" method="post">
        <select name="active_season" id="active_season">
            <option value="">-</option>
            <?php foreach($seasons as $season) : ?>
                <option <?php selected($season->slug, $active_season); ?>value="<?php echo $season->slug; ?>"><?php echo $season->name; ?></option>
            <?php endforeach; ?>
        </select>
        <input class="button-primary button" type="submit" value="Save" />
    </form>
    
<?php
}