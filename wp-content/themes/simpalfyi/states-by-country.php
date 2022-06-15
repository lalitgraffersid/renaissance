<?php
/*
 Template Name: get state
*/

global $wpdb;
?>
<?php      

$country_id = $_POST["country_id"];

$result = $wpdb->get_results("SELECT * FROM n9dcB_state WHERE country_id = $country_id "); 
?>

<option value="">Select State</option>
<?php
    $i=0;
    foreach ($result as $row)
    {
?>

<option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>

<?php
 $i++; 
}
?>

<?php

?>