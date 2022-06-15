<?php
/*
 Template Name: get city
*/
global $wpdb;
?>
<?php     

$state_id = $_POST["state_id"];
$result = $wpdb->get_results("SELECT * FROM n9dcB_city WHERE state_id = $state_id "); 
?>
<option value="">Select City</option>

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