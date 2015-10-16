<?PHP

/**
 * Plugin Name: SteamPixel Html, PHP, CSS and JS File Loader
 * Plugin URI: http://www.steampixel.de
 * Description: PHP, CSS, JS File Loader
 * Version: 1.0
 * Author:SteamPixel Media Solutions
 * Author http://www.steampixel.de
 * License: GPL2
 */

 
function sp_php_file_loader($atts){
	
	$html = '';
	
	//Get Attributes and set default
	$args = shortcode_atts(
		array(
			'path' => ''
		),
		$atts
	);
	
	if($args['path']!=''){
		
		if(file_exists($args['path'])){
			
			// if (
				// strpos($args['path'], '..') === false&&
				// strpos($args['path'], 'http:') === false&&
				// strpos($args['path'], 'https:') === false&&
				// strpos($args['path'], 'ftp:') === false
			// ) {
			
				ob_start();
				include($args['path']);
				$html.= ob_get_contents();
				ob_end_clean();
			
			// }else{
				// $html.= 'Path "'.$args['path'].'" not allowed for security reason."]';
			// }
			
		}else{
		
			$html.= 'Path "'.$args['path'].'" was not found on this server!"]';
			
		}
		
	}else{
		
		$html.= 'Path is emty! Use [phpfile path="path/to/file.php"]';
		
	}
	
	return $html;
	
}

function sp_css_file_loader($atts){
	
	//Get Attributes and set default
	$args = shortcode_atts(
		array(
			'path' => '',
			'name' => ''
		),
		$atts
	);
	
	if($args['name']!=''&&$args['path']!=''){
		wp_enqueue_script($args['name'], $args['path']);
	}
	
	if($args['name']!=''&&$args['path']==''){
		wp_enqueue_script($args['name']);
	}
	
	return '';
	
}

function sp_js_file_loader($atts){
	
	//Get Attributes and set default
	$args = shortcode_atts(
		array(
			'path' => ''
		),
		$atts
	);
	
	//Load Style
	wp_enqueue_style('style_'.md5($args['path']), $args['path']);
	
	return '';
	
}

function sp_html_file_loader($atts){
	
	$html = '';
	
	//Get Attributes and set default
	$args = shortcode_atts(
		array(
			'path' => ''
		),
		$atts
	);
	
	if($args['path']!=''){
		
		if(file_exists($args['path'])){

			if (
				strpos($args['path'], '..') === false&&
				strpos($args['path'], 'http:') === false&&
				strpos($args['path'], 'https:') === false&&
				strpos($args['path'], 'ftp:') === false
			) {
				$html.= file_get_contents($args['path']);
			}else{
				$html.= 'Path "'.$args['path'].'" not allowed for security reason."]';
			}

		}else{
		
			$html.= 'Path "'.$args['path'].'" was not found on this server!"]';
			
		}
		
	}else{
		
		$html.= 'Path is emty! Use [htmlfile path="path/to/file.html"]';
		
	}
	
	return $html;
	
}

add_shortcode( 'htmlfile', 'sp_html_file_loader' );

add_shortcode( 'jsfile', 'sp_js_file_loader' );

add_shortcode( 'cssfile', 'sp_css_file_loader' );

add_shortcode( 'phpfile', 'sp_php_file_loader' );



?>