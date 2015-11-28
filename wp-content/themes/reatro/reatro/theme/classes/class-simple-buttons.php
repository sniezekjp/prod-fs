<?php 
if(!class_exists('Twoot_Simple_Buttons'))
{
/**
 * Used for front funcations
 */
class Twoot_Simple_Buttons {

	/**
	* This method adds other methods to specific hooks within WordPress.
	* @since     1.0
	* @updated   1.0
	*
	*/
	public function __construct() 
	{
		add_action('admin_init', array($this, 'init'));
	}


	public function init()
	{
		if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
			if ( in_array(basename($_SERVER['PHP_SELF']), array('post-new.php', 'page-new.php', 'post.php', 'page.php') ) ) {
				add_action('admin_head', array($this, 'buttons'));
			}
		}
	}


	public function buttons()
	{
		
		wp_print_scripts( 'quicktags' );
		$output = '<script type="text/javascript">'."\n";
		$output .= ' /* <![CDATA[ */ '."\n";

		$buttons = array();

		//Clear
		$buttons[] = array('name' => 'clear',
									'options' => array('display_name' => 'clear', 'open_tag' => '[clear]', 'close_tag' => '', 'key' => ''
						));

		//Pre
		$buttons[] = array('name' => 'pre',
									'options' => array('display_name' => 'pre', 'open_tag' => '[pre]', 'close_tag' => '[/pre]', 'key' => ''
						));

		//Hr
		$buttons[] = array('name' => 'hr',
									'options' => array('display_name' => 'hr', 'open_tag' => '[hr top="10" bottom="10"]', 'close_tag' => '', 'key' => ''
						));

		//Br
		$buttons[] = array('name' => 'br',
									'options' => array('display_name' => 'br', 'open_tag' => '[br top="10"]', 'close_tag' => '', 'key' => ''
						));

		//Block
		$buttons[] = array('name' => 'block',
									'options' => array('display_name' => 'block', 'open_tag' => '[block ids=""]', 'close_tag' => '', 'key' => ''
						));

		//Row
		$buttons[] = array('name' => 'row',
									'options' => array('display_name' => 'row', 'open_tag' => '[row]', 'close_tag' => '[/row]', 'key' => ''
						));


		//For
		for ($i=0; $i <= (count($buttons)-1); $i++) {
			$output .= "edButtons[edButtons.length] = new edButton('ed_{$buttons[$i]['name']}'
				,'{$buttons[$i]['options']['display_name']}'
				,'{$buttons[$i]['options']['open_tag']}'
				,'{$buttons[$i]['options']['close_tag']}'
				,'{$buttons[$i]['options']['key']}'
			); \n";
		}

		$output .= '  /* ]]> */'."\n";
		$output .= '</script>'."\n";
		echo $output;

	}
}

new Twoot_Simple_Buttons();
}
?>