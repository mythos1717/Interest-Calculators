<?php // Template Name: Signature Loans Calculator Page 

	global $wpdb;
?>

<?php 

$loans = $wpdb->get_results("SELECT DISTINCT(p.ID),p.* FROM wp_posts p INNER JOIN wp_term_relationships t ON t.object_id=p.ID INNER JOIN wp_postmeta pm ON pm.post_id=p.ID WHERE p.post_type = 'loan_calculators' AND t.term_taxonomy_id LIKE 5 ORDER BY p.post_date DESC");
//print_r($loans);
?>


		<? if (!isset($_GET['loan_amount'])) { ?>

		<select onchange="changeForm(this.options[this.selectedIndex].value);">

			<option value="0">Click here to modify loan information...</option>

		<?php
					if(!empty($loans)){
					 for($i=0; $i < count($loans); $i++){ 
						$loan_data = get_post($loans[$i]->ID); 
						$title = $loan_data->post_title;
						
						echo '<option value="'.$loans[$i]->ID.'">'.$title.'</option>';
					 }
					} else {
					}?>

		</select>

		<? } ?>

		<? include('wp-content/plugins/loan-calculators/loan-calculator-controller.php'); ?>
		<script type="text/javascript">

<!--

	var form_types = [];



	<?php
if(!empty($loans)){
	for($i=0; $i < count($loans); $i++){ 
		$loan_data = get_post($loans[$i]->ID); 
		$title = $loan_data->post_title;

		echo "form_types[{$loans[$i]->ID}] = { amount: '{$loan_data->loan_amount}', length: {$loan_data->loan_length}, interest: {$loan_data->loan_interest}, period: {$loan_data->loan_periodicity} };\n";
	}
} else {
}
?>



	var changeForm = function(id) {

		var obj = form_types[id];

		

		jQuery('#pay_periodicity option').removeAttr('selected');

		

		jQuery('#loan_amount').attr({ value: obj.amount });

		jQuery('#loan_length').attr({ value: obj.length });

		jQuery('#annual_interest').attr({ value: obj.interest });

		jQuery('#period_' + obj.period).attr({ selected: 'selected' });

	};

//-->

</script>