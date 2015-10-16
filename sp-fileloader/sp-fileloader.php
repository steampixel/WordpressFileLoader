<?PHP

/**
 * Plugin Name: SteamPixel PHP file loader
 * Plugin URI: http://www.steampixel.de
 * Description: PHP File Loader
 * Version: 1.1
 * Author:SteamPixel Media Solutions
 * Author http://www.steampixel.de
 * License: GPL2
 */

 
function sp_php_file_loader($atts){
	
	$html = '';
	
	$args = shortcode_atts(
		array(
			'path' => ''
		),
		$atts
	);
	
	if($args['path']!=''){
		
		if(file_exists($args['path'])){

            ob_start();
            include($args['path']);
            $html.= ob_get_contents();
            ob_end_clean();
			
		}else{
		
			$html.= 'Path not found!"]';
			
		}
		
	}else{
		
		$html.= 'Path is emty! Use [phpfile path="path/to/file.php"]';
		
	}
	
	return $html;
	
}

add_shortcode( 'phpfile', 'sp_php_file_loader' );

?>