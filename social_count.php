<?php
/*
Plugin Name: Social Count for Your Blog
Plugin URI: http://blog.aligoren.net
Description: Social Count for Your Blog
Version: 0.1
Author: Ali GOREN
Author Email: goren.ali@yandex.com
License:

  Copyright 2011 Ali GOREN (goren.ali@yandex.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as 
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
  
*/


	

function floatNumber($number)
{
	$number_array = explode('.', $number);
	$left = $number_array[0];
	$right = $number_array[1];
	return number_format($number, strlen($right));
}

	
function social_count($ads)
{
	require_once("shareCount.php");
	
	$obj = new shareCount(get_site_url()); //website url
	echo '<h2>SOCIAL STATS</h2>';
	echo '<b><img src="'.plugins_url( '/images/twitter.png' , __FILE__ ).'">Twitter:</b> '.floatNumber($obj->get_tweets()); //to get tweets
	echo '<br/><img src="'.plugins_url( '/images/facebook.png' , __FILE__ ).'"><b>Facebook:</b> '.floatNumber($obj->get_fb()); //to get facebook total count (likes+shares+comments)
	echo '<br/><img src="'.plugins_url( '/images/linkedin.png' , __FILE__ ).'"><b>Linkedin:</b> '.floatNumber($obj->get_linkedin()); //to get linkedin shares
	echo '<br/><img src="'.plugins_url( '/images/google.png' , __FILE__ ).'"><b>Google Plus:</b> '.floatNumber($obj->get_plusones()); //to get google plusones
	echo '<br/><img src="'.plugins_url( '/images/delicious.png' , __FILE__ ).'"><b>Delicious:</b> '.floatNumber($obj->get_delicious()); //to get delicious bookmarks  count
	echo '<br/><img src="'.plugins_url( '/images/stumbleupon.png' , __FILE__ ).'"><b>Stumbleupon:</b> '.floatNumber($obj->get_stumble()); //to get Stumbleupon views
	echo '<br/><img src="'.plugins_url( '/images/pinterest.png' , __FILE__ ).'"><b>Pinterest:</b> '.floatNumber($obj->get_pinterest()); //to get pinterest pins

	

}


add_filter('widget_text', 'do_shortcode');
add_shortcode('social', 'social_count');



?>