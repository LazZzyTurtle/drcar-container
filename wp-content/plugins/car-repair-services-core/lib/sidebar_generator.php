<?php
/*
Plugin Name: Sidebar Generator
Plugin URI: http://www.getson.info
Description: This plugin generates as many sidebars as you need. Then allows you to place them on any page you wish. Version 1.1 now supports themes with multiple sidebars. 
Version: 1.1.0
Author: Kyle Getson
Author URI: http://www.kylegetson.com
Copyright (C) 2009 Kyle Robert Getson
*/

/*
Copyright (C) 2009 Kyle Robert Getson, kylegetson.com and getson.info

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

class sidebar_generator {
	
	public function __construct(){
		add_action('init',array('sidebar_generator','init'));
		add_action('admin_menu',array('sidebar_generator','reg_admin_menu'));
		add_action('admin_print_scripts', array('sidebar_generator','admin_print_scripts'));
		add_action('wp_ajax_add_sidebar', array('sidebar_generator','add_sidebar') );
		add_action('wp_ajax_remove_sidebar', array('sidebar_generator','remove_sidebar') );

	}
	
	public static function init(){
	    $sidebars = sidebar_generator::get_sidebars();
	    

	    if(is_array($sidebars)){
			foreach($sidebars as $sidebar){
				$sidebarid = preg_replace_callback('/[^A-Za-z0-9]+/',function ($match){return "-";}, strtolower($sidebar));
				$sidebar_class = sidebar_generator::name_to_class($sidebar);
				register_sidebar(array(
                    'id'=>$sidebarid,
                    'name'=>$sidebar,
				    'before_widget' => '<div class="m_bottom_45 m_xs_bottom_30 %2$s w_full d_inline_b" id="%1$s">',
				    'after_widget' => "</div><!--#end {$sidebar}-->",
				    'before_title' => '<h5 class="fw_light color_dark m_bottom_20">',
				    'after_title' => '</h5>',
		    	));
			}
		}
	}
	
	public static function admin_print_scripts(){
		wp_print_scripts( array( 'sack' ));
		?>
			<script>
				function add_sidebar( sidebar_name )
				{
					
					var mysack = new sack("<?php print esc_url(admin_url('admin-ajax.php')); ?>" );
				
				  	mysack.execute = 1;
				  	mysack.method = 'POST';
				  	mysack.setVar( "action", "add_sidebar" );
				  	mysack.setVar( "sidebar_name", sidebar_name );
				  	mysack.encVar( "cookie", document.cookie, false );
				  	mysack.onError = function() { alert('Ajax error. Cannot add sidebar' )};
				  	mysack.runAJAX();
					return true;
				}
				
				function remove_sidebar( sidebar_name,num )
				{
					
					var mysack = new sack("<?php print esc_url(admin_url('admin-ajax.php')); ?>" );
				  	mysack.execute = 1;
				  	mysack.method = 'POST';
				  	mysack.setVar( "action", "remove_sidebar" );
				  	mysack.setVar( "sidebar_name", sidebar_name );
				  	mysack.setVar( "row_number", num );
				  	mysack.encVar( "cookie", document.cookie, false );
				  	mysack.onError = function() { alert('Ajax error. Cannot add sidebar' )};
				  	mysack.runAJAX();
					//alert('hi!:::'+sidebar_name);
					return true;
				}
			</script>
		<?php
	}
	
	public static function add_sidebar(){
		$sidebars = sidebar_generator::get_sidebars();
		$name = str_replace(array("\n","\r","\t"),'',$_POST['sidebar_name']);
		$id = sidebar_generator::name_to_class($name);
		if(isset($sidebars[$id])){
			die("alert('Sidebar already exists, please use a different name.')");
		}
		
		$sidebars[$id] = $name;
		sidebar_generator::update_sidebars($sidebars);
		
		$js = "
			var tbl = document.getElementById('sbg_table');
			var lastRow = tbl.rows.length;
			// if there's no header row in the table, then iteration = lastRow + 1
			var iteration = lastRow;
			var row = tbl.insertRow(lastRow);
			
			// left cell
			var cellLeft = row.insertCell(0);
			var textNode = document.createTextNode('$name');
			cellLeft.appendChild(textNode);
			
			//middle cell
			var cellLeft = row.insertCell(1);
			var textNode = document.createTextNode('$id');
			cellLeft.appendChild(textNode);

			var cellLeft = row.insertCell(2);
			removeLink = document.createElement('a');
      		linkText = document.createTextNode('remove');
			removeLink.setAttribute('onclick', 'remove_sidebar_link(\'$name\')');
			removeLink.setAttribute('href', 'javacript:void(0)');
        
      		removeLink.appendChild(linkText);
      		cellLeft.appendChild(removeLink);

			
		";
		
		
		die( "$js");
	}
	
	public static function remove_sidebar(){
		$sidebars = sidebar_generator::get_sidebars();
		$name = str_replace(array("\n","\r","\t"),'',$_POST['sidebar_name']);
		$id = sidebar_generator::name_to_class($name);
		if(!isset($sidebars[$id])){
			die("alert('Sidebar does not exist.')");
		}
		$row_number = $_POST['row_number'];
		unset($sidebars[$id]);
		sidebar_generator::update_sidebars($sidebars);
		$js = "
			var tbl = document.getElementById('sbg_table');
			tbl.deleteRow($row_number)

		";
		die($js);
	}
	
	public static function reg_admin_menu(){
		add_theme_page('Sidebars', 'Sidebars', 'manage_options', 'multiple_sidebars', array(__CLASS__,'admin_page'));
	}
	
	public static function admin_page(){
		?>
		<script>
			function remove_sidebar_link(name,num){
				answer = confirm("Are you sure you want to remove " + name + "?\nThis will remove any widgets you have assigned to this sidebar.");
				if(answer){
					//alert('AJAX REMOVE');
					remove_sidebar(name,num);
				}else{
					return false;
				}
			}
			function add_sidebar_link(){
				var sidebar_name = prompt("Sidebar Name:","");
				//alert(sidebar_name);
				add_sidebar(sidebar_name);
			}
		</script>
		<div class="wrap">
			<h2><?php esc_html_e('Sidebar Generator', 'yourstore'); ?></h2>
			<p><?php esc_html_e('The sidebar name is for your use only. It will not be visible to any of your visitors. A CSS class is assigned to each of your sidebar, use this styling to customize the sidebars.', 'yourstore'); ?></p>
			<br />
			<div class="add_sidebar">
				<a href="javascript:void(0);" onclick="return add_sidebar_link()" title="Add a sidebar"><?php esc_html_e('+ Add Sidebar', 'yourstore') ?></a>
			</div>
			<br />
			<table class="widefat page" id="sbg_table" style="width:600px;">
				<tr>
					<th><?php esc_html_e('Name', 'yourstore'); ?></th>
					<th><?php esc_html_e('CSS class', 'yourstore'); ?></th>
					<th><?php esc_html_e('Remove', 'yourstore'); ?></th>
				</tr>
				<?php
				$sidebars = sidebar_generator::get_sidebars();
				//$sidebars = array('bob','john','mike','asdf');
				if(is_array($sidebars) && !empty($sidebars)){
					$cnt=0;
					foreach($sidebars as $sidebar){
						$alt = ($cnt%2 == 0 ? 'alternate' : '');
				?>
				<tr class="<?php print esc_attr($alt) ?>">
					<td><?php print wp_kses_post($sidebar); ?></td>
					<td><?php print sidebar_generator::name_to_class($sidebar); ?></td>
					<td><a href="javascript:void(0);" onclick="return remove_sidebar_link('<?php print esc_js($sidebar); ?>',<?php print esc_js($cnt+1); ?>);" title="<?php esc_attr_e('Remove this sidebar', 'yourstore')?>"><?php esc_html_e('remove', 'yourstore'); ?></a></td>
				</tr>
				<?php
						$cnt++;
					}
				}else{
					?>
					<tr>
						<td colspan="3"><?php esc_html_e('No Sidebars defined', 'yourstore'); ?></td>
					</tr>
					<?php
				}
				?>
			</table>
		</div>
		<?php
	}
	

	public static function get_sidebar($name="0"){
		if(!is_singular()){
			if($name != "0"){
				if ( is_active_sidebar( $name ) ) {
					dynamic_sidebar($name);
				}
			}else{
				if ( is_active_sidebar(  'default_sidebar'  ) ) {
					dynamic_sidebar( 'default_sidebar' );
				}
			}
			return;//dont do anything
		}
		global $wp_query;
		$post = $wp_query->get_queried_object();
		$selected_sidebar = get_post_meta($post->ID, 'sbg_selected_sidebar', true);
		$selected_sidebar_replacement = get_post_meta($post->ID, 'sbg_selected_sidebar_replacement', true);
		$did_sidebar = false;
		//this page uses a generated sidebar
		if($selected_sidebar != '' && $selected_sidebar != "0"){
			print "\n\n<!-- begin generated sidebar -->\n";
			if(is_array($selected_sidebar) && !empty($selected_sidebar)){
				for($i=0;$i<sizeof($selected_sidebar);$i++){					
					
					if($name == "0" && $selected_sidebar[$i] == "0" &&  $selected_sidebar_replacement[$i] == "0"){
						//print "\n\n<!-- [called $name selected {$selected_sidebar[$i]} replacement {$selected_sidebar_replacement[$i]}] -->";
						if ( is_active_sidebar(  'default_sidebar'  ) ) {
							dynamic_sidebar( 'default_sidebar' );
						}
						$did_sidebar = true;
						break;
					}elseif($name == "0" && $selected_sidebar[$i] == "0"){
						//we are replacing the default sidebar with something
						//print "\n\n<!-- [called $name selected {$selected_sidebar[$i]} replacement {$selected_sidebar_replacement[$i]}] -->";
						if ( is_active_sidebar( $selected_sidebar_replacement[$i] ) ) {
							dynamic_sidebar($selected_sidebar_replacement[$i]);
						}
						$did_sidebar = true;
						break;
					}elseif($selected_sidebar[$i] == $name){
						//we are replacing this $name
						//print "\n\n<!-- [called $name selected {$selected_sidebar[$i]} replacement {$selected_sidebar_replacement[$i]}] -->";
						$did_sidebar = true;
						if ( is_active_sidebar( $selected_sidebar_replacement[$i] ) ) {
							dynamic_sidebar($selected_sidebar_replacement[$i]);
						}
						break;
					}
					//print "<!-- called=$name selected={$selected_sidebar[$i]} replacement={$selected_sidebar_replacement[$i]} -->\n";
				}
			}
			if($did_sidebar == true){
				print "\n<!-- end generated sidebar -->\n\n";
				return;
			}
			//go through without finding any replacements, lets just send them what they asked for
			if($name != "0"){
				if ( is_active_sidebar( $name ) ) {
					dynamic_sidebar($name);
				}
			}else{
				if ( is_active_sidebar(  'default_sidebar'  ) ) {
					dynamic_sidebar( 'default_sidebar' );
				}
			}
			print "\n<!-- end generated sidebar -->\n\n";
			return;			
		}else{
			if($name != "0"){
				if ( is_active_sidebar( $name ) ) {
					dynamic_sidebar($name);
				}
			}else{
				if ( is_active_sidebar(  'default_sidebar'  ) ) {
					dynamic_sidebar( 'default_sidebar' );
				}
			}
		}
	}
	
	/**
	 * replaces array of sidebar names
	*/
	public static function update_sidebars($sidebar_array){
		$sidebars = update_option('sbg_sidebars',$sidebar_array);
	}	
	
	/**
	 * gets the generated sidebars
	*/
	public static function get_sidebars(){
		$sidebars = get_option('sbg_sidebars');
		return $sidebars;
	}
	public static function name_to_class($name){
		$class = str_replace(array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name);
		return $class;
	}
	
}
$sbg = new sidebar_generator;

function generated_dynamic_sidebar($name='0'){
	sidebar_generator::get_sidebar($name);
	return true;
}
