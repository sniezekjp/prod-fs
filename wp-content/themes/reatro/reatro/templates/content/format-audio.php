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
?>
<?php
	$url = twoot_get_frontend_func('meta', 'soundcloud_url');
	$embed = twoot_get_frontend_func('meta', 'audio_code');

	echo twoot_generator('post_audio', $url, $embed, 166);
?>