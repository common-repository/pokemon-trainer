<?php
//Add the admin options page
add_action('admin_menu', 'pkmn_trainer_add_page');
function pkmn_trainer_add_page(){
add_options_page('Pokemon Trainer','Pokemon Trainer Options', 'manage_options', 'pkmn_trainer', 'pkmn_trainer_options_page');
}
//Draw Options Page
function pkmn_trainer_options_page(){
	//Receive Data for each option
	 require_once(dirname(__FILE__).'/pkmn-list.php');
	 require_once(dirname(__FILE__).'/pkmn-trainers.php');
	   $pkmn_options = get_option('pkmn_trainer_options');
		$pokemon_1 = $pkmn_options['pkmn_1'];
		$pokemon_2 = $pkmn_options['pkmn_2'];
		$pokemon_3 = $pkmn_options['pkmn_3'];
		$pokemon_4 = $pkmn_options['pkmn_4'];
		$pokemon_5 = $pkmn_options['pkmn_5'];
		$pokemon_6 = $pkmn_options['pkmn_6'];
		$trainer = $pkmn_options['trainer'];

//Check to see if page was submitted	
if($_POST['pkmn_trainer_hidden'] == 'Y') {     

//Update database values (Finally)
$pkmn_options = array(
	'pkmn_1' => $_POST['pkmn-1'],
	'pkmn_2' => $_POST['pkmn-2'],
	'pkmn_3' => $_POST['pkmn-3'],
	'pkmn_4' => $_POST['pkmn-4'],
	'pkmn_5' => $_POST['pkmn-5'],
	'pkmn_6' => $_POST['pkmn-6'],
	'trainer' => $_POST['trainer']
	);
	update_option('pkmn_trainer_options',$pkmn_options);
}
	   
	   
	   ?>
<script type='application/javascript''>

var $j = jQuery.noConflict(); //Allows us to use $j instead of $


$j(document).ready(function() {
		 function displayValstrainer() {

  var singleValues = $j("#trainer").val();
 $j("#trainer-img").attr('src' ,'<?php echo plugins_url('/pokemon-trainer');?>/images/' +singleValues + '.png');
 $j("#trainer-img").attr('alt' ,$j("select").val());
    }

    $j("select").change(displayValstrainer);
    displayValstrainer();


	
	 function displayVals() {

  var singleValues = $j("#pkmn-1").val();
 $j("#pkmn-img1").attr('src' ,'<?php echo plugins_url('/pokemon-trainer');?>/images/' +singleValues + '.png');
 $j("#pkmn-img1").attr('alt' ,$j("select").val());
    }

    $j("select").change(displayVals);
    displayVals();


	 function displayVals2() {

  var singleValues = $j("#pkmn-2").val();
 $j("#pkmn-img2").attr('src' ,'<?php echo plugins_url('/pokemon-trainer');?>/images/' +singleValues + '.png');
 $j("#pkmn-img2").attr('alt' ,$j("select").val());
    }

    $j("select").change(displayVals2);
    displayVals2();
	
		 function displayVals3() {

  var singleValues = $j("#pkmn-3").val();
 $j("#pkmn-img3").attr('src' ,'<?php echo plugins_url('/pokemon-trainer');?>/images/' +singleValues + '.png');
 $j("#pkmn-img3").attr('alt' ,$j("select").val());
    }

    $j("select").change(displayVals3);
    displayVals3();
	
		 function displayVals4() {

  var singleValues = $j("#pkmn-4").val();
 $j("#pkmn-img4").attr('src' ,'<?php echo plugins_url('/pokemon-trainer');?>/images/' +singleValues + '.png');
 $j("#pkmn-img4").attr('alt' ,$j("select").val());
    }

    $j("select").change(displayVals4);
    displayVals4();
	
		 function displayVals5() {

  var singleValues = $j("#pkmn-5").val();
 $j("#pkmn-img5").attr('src' ,'<?php echo plugins_url('/pokemon-trainer');?>/images/' +singleValues + '.png');
 $j("#pkmn-img5").attr('alt' ,$j("select").val());
    }

    $j("select").change(displayVals5);
    displayVals5();
	
		 function displayVals6() {

  var singleValues = $j("#pkmn-6").val();
 $j("#pkmn-img6").attr('src' ,'<?php echo plugins_url('/pokemon-trainer');?>/images/' +singleValues + '.png');
 $j("#pkmn-img6").attr('alt' ,$j("select").val());
    }

    $j("select").change(displayVals6);
    displayVals6();



    });
</script>
<h2>
  <?php screen_icon( 'plugins' ); ?>
  Pokemon Trainer Options</h2>
<br/>
<?php
if($_POST['pkmn_trainer_hidden'] == 'Y') {     

?>

<div id="message" class="updated">
  <p><strong>Settings Saved</strong></p>
</div>
<?php } ?>
<img src='<?php echo plugins_url('/pokemon-trainer/images/'.$trainer.'.png');?>' alt='<?php echo $trainer;?>' /> <img src='<?php echo plugins_url('/pokemon-trainer/images/'.$pokemon_1.'.png');?>' alt='<?php echo $pokemon_1;?>' /> <img src='<?php echo plugins_url('/pokemon-trainer/images/'.$pokemon_2.'.png');?>' alt='<?php echo $pokemon_2;?>' /> <img src='<?php echo plugins_url('/pokemon-trainer/images/'.$pokemon_3.'.png');?>' alt='<?php echo $pokemon_3;?>' /> <img src='<?php echo plugins_url('/pokemon-trainer/images/'.$pokemon_4.'.png');?>' alt='<?php echo $pokemon_4;?>' /> <img src='<?php echo plugins_url('/pokemon-trainer/images/'.$pokemon_5.'.png');?>' alt='<?php echo $pokemon_5;?>' /> <img src='<?php echo plugins_url('/pokemon-trainer/images/'.$pokemon_6.'.png');?>' alt='<?php echo $pokemon_6;?>' />

<form name="form1" method="post" action="<?php $_SERVER['REQUEST_URI']?>">
  <input type="hidden" name="pkmn_trainer_hidden" value="Y">
  <table class="form-table">
    <tbody>
      <tr valign="top">
        <th scope="row"> <label for="trainer">
          <h3>Trainer</h3>
          </label></th>
        <td><select name="trainer" id="trainer">
            <?php
foreach ($pkmn_trainer as $key => $value)
{ 

if($trainer == $key){
$selected = "selected = 'selected'";
}else{
	$selected='';
}

?>
            <option value="<?php echo $key;?>"<?php echo $selected; ?>><?php echo $value;?></option>
            <?php 
}?>
          </select></td>
        <td><img src='<?php echo plugins_url('/pokemon-trainer');?>/images/0.png' id='trainer-img'/></td>
      </tr>
      <tr valign="top">
        <th scope="row"> <label for="pkmn-1">
          <h3>Pokemon 1</h3>
          </label></th>
        <td><select name="pkmn-1" id="pkmn-1">
            <?php
foreach ($pkmn as $key => $value)
{ 

if($pokemon_1 == $key){
$selected = "selected = 'selected'";
}else{
	$selected='';
}

?>
            <option value="<?php echo $key;?>"<?php echo $selected; ?>><?php echo $value;?></option>
            <?php 
}?>
          </select></td>
        <td><img src='<?php echo plugins_url('/pokemon-trainer');?>/images/0.png' id='pkmn-img1'/></td>
      </tr>
      <tr valign="top">
        <th scope="row"> <label for="pkmn-2">
          <h3>Pokemon 2</h3>
          </label></th>
        <td><select name="pkmn-2" id="pkmn-2">
            <?php
foreach ($pkmn as $key => $value)
{ 

if($pokemon_2 == $key){
$selected = "selected = 'selected'";
}else{
	$selected='';
}

?>
            <option value="<?php echo $key;?>"<?php echo $selected; ?>><?php echo $value;?></option>
            <?php 
}?>
          </select></td>
        <td><img src='<?php echo plugins_url('/pokemon-trainer');?>/images/0.png' id='pkmn-img2'/></td>
      </tr>
      <tr valign="top">
        <th scope="row"> <label for="pkmn-3">
          <h3>Pokemon 3</h3>
          </label></th>
        <td><select name="pkmn-3" id="pkmn-3">
            <?php
foreach ($pkmn as $key => $value)
{ 

if($pokemon_3 == $key){
$selected = "selected = 'selected'";
}else{
	$selected='';
}

?>
            <option value="<?php echo $key;?>"<?php echo $selected; ?>><?php echo $value;?></option>
            <?php 
}?>
          </select></td>
        <td><img src='<?php echo plugins_url('/pokemon-trainer');?>/images/0.png' id='pkmn-img3'/></td>
      </tr>
      <tr valign="top">
        <th scope="row"> <label for="pkmn-4">
          <h3>Pokemon 4</h3>
          </label>
        </th>
        <td><select name="pkmn-4" id="pkmn-4">
            <?php
foreach ($pkmn as $key => $value)
{ 

if($pokemon_4 == $key){
$selected = "selected = 'selected'";
}else{
	$selected='';
}

?>
            <option value="<?php echo $key;?>"<?php echo $selected; ?>><?php echo $value;?></option>
            <?php 
}?>
          </select></td>
        <td><img src='<?php echo plugins_url('/pokemon-trainer');?>/images/0.png' id='pkmn-img4'/></td>
      </tr>
      <tr valign="top">
        <th scope="row"> <label for="pkmn-5">
          <h3>Pokemon 5</h3>
          </label></th>
        <td><select name="pkmn-5" id="pkmn-5">
            <?php
foreach ($pkmn as $key => $value)
{ 

if($pokemon_5 == $key){
$selected = "selected = 'selected'";
}else{
	$selected='';
}

?>
            <option value="<?php echo $key;?>"<?php echo $selected; ?>><?php echo $value;?></option>
            <?php 
}?>
          </select></td>
        <td><img src='<?php echo plugins_url('/pokemon-trainer');?>/images/0.png' id='pkmn-img5'/></td>
      </tr>
      <tr valign="top">
        <th scope="row"> <label for="pkmn-6">
          <h3>Pokemon 6</h3>
          </label></th>
        <td><select name="pkmn-6" id="pkmn-6">
            <?php
foreach ($pkmn as $key => $value)
{ 

if($pokemon_6 == $key){
$selected = "selected = 'selected'";
}else{
	$selected='';
}

?>
            <option value="<?php echo $key;?>"<?php echo $selected; ?>><?php echo $value;?></option>
            <?php 
}?>
          </select></td>
        <td><img src='<?php echo plugins_url('/pokemon-trainer');?>/images/0.png' id='pkmn-img6'/></td>
      </tr>
    </tbody>
  </table>
  <p class="submit">
    <input id="submit" class="button-primary" type="submit" value="Save Changes" name="submit" />
  </p>
</form>
<?php
}
?>
