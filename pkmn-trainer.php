<?PHP
/*
Plugin Name: Pokemon-Trainer
Plugin URI:http://kraniumdesigns.com/plugins/
Description: This plugin allows you to set up a Pokemon team through the settings page and allows you to display it wherever you want using the shortcode [pkmn_trainer].
Version: 1.0
Author: Brian Krane
Author URI:http://kraniumdesigns.com
License: GPLv2
*/
?>
<?php
if(is_admin() ){
	//we're in wp-admin
	require_once(dirname(__FILE__).'/includes/admin.php');
}
	add_option('pkmn_trainer_options', array(
	'pkmn_1' => '1',
	'pkmn_2' => '2',
	'pkmn_3' => '3',
	'pkmn_4' => '4',
	'pkmn_5' => '5',
	'pkmn_6' => '6',
	'trainer' => '0'
));

// Creating the [pkmn-trainer] shortcode
function pkmn_trainer_shortcode(){
	
//Fetch information from database
$pkmn_options = get_option('pkmn_trainer_options');
$pokemon_1 = $pkmn_options['pkmn_1'];
$pokemon_2 = $pkmn_options['pkmn_2'];
$pokemon_3 = $pkmn_options['pkmn_3'];
$pokemon_4 = $pkmn_options['pkmn_4'];
$pokemon_5 = $pkmn_options['pkmn_5'];
$pokemon_6 = $pkmn_options['pkmn_6'];
$trainer = $pkmn_options['trainer'];

?>

 <img src='<?php echo plugins_url('/pokemon-trainer/images/'.$trainer.'.png');?>' alt='<?php echo $trainer;?>' />
 <img src='<?php echo plugins_url('/pokemon-trainer/images/'.$pokemon_1.'.png');?>' alt='<?php echo $pokemon_1;?>' />
  <img src='<?php echo plugins_url('/pokemon-trainer/images/'.$pokemon_2.'.png');?>' alt='<?php echo $pokemon_2;?>' />
   <img src='<?php echo plugins_url('/pokemon-trainer/images/'.$pokemon_3.'.png');?>' alt='<?php echo $pokemon_3;?>' />
    <img src='<?php echo plugins_url('/pokemon-trainer/images/'.$pokemon_4.'.png');?>' alt='<?php echo $pokemon_4;?>' />
     <img src='<?php echo plugins_url('/pokemon-trainer/images/'.$pokemon_5.'.png');?>' alt='<?php echo $pokemon_5;?>' />
      <img src='<?php echo plugins_url('/pokemon-trainer/images/'.$pokemon_6.'.png');?>' alt='<?php echo $pokemon_6;?>' />
      
 
 
 <?php
}
add_shortcode( 'pkmn_trainer', 'pkmn_trainer_shortcode' );
?>