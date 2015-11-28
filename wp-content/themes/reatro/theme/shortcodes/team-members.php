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


if ( !function_exists( 'shortcode_team_members' ) ) {

	function shortcode_team_members($atts, $content = null) {
		global $members;
		$members = array();

		do_shortcode($content);

		$html = '<div class="shortcode-team-members outer clearfix">';

		foreach( $members as $member ) {

			switch(count($members)) {
				case 1: $grid = 'twelve'; break;
				case 2: $grid = 'six'; break;
				case 3: $grid = 'four'; break;
				case 4: $grid = 'three'; break;
			}

			$html .= '<div class="member-item column '.$grid.'">';
			$html .= '<div class="inner">';

			if($member['avatar']) {
				$html .= '<div class="avatar img-preload img-hover"><img src="'.$member['avatar'].'" /><div class="overlay"></div></div>';
			}

			if($member['name']) {
				$html .= '<h3 class="name">'.$member['name'].'</h3>';
			}

			if($member['role']) {
				$html .= '<div class="role">'.$member['role'].'</div>';
			}

			if($member['content']) {
				$html .= '<div class="content">'.do_shortcode($member['content']).'</div>';
			}

			$html .= '</div>';
			$html .= '</div>';
		}

		$html .= '</div>';
		
		return $html;
	}

	function shortcode_team_member($atts, $content = null) {
		extract(shortcode_atts(array(
			'avatar' => '',
			'name' => '',
			'role' => ''
		), $atts));

		global $members;

		$members[] = array(
			'avatar' => $avatar,
			'name' => $name,
			'role' => $role,
			'content' => $content
		);
	}

	add_shortcode('team_members', 'shortcode_team_members');
	add_shortcode('team_member', 'shortcode_team_member');
}
?>