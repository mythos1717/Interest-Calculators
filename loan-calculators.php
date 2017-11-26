<?php
/*
Plugin Name: Loan Calculators
Plugin URI: 
Description: Loan Calculators
Version: 0.1
Author: GlobalWebDesign
Author URI:
*/

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

add_action( 'init', 'create_loan_calculator' );


function create_loan_calculator() {
    register_post_type( 'loan_calculators',
        array(
            'labels' => array(
                'name' => 'Loan Calculators',
                'singular_name' => 'Loan Calculator',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Loan Calculator',
                'edit' => 'Edit',
                'edit_item' => 'Edit Loan Calculator',
                'new_item' => 'New Loan Calculator',
                'view' => 'View',
                'view_item' => 'View Loan Calculator',
                'search_items' => 'Search Loan Calculator',
                'not_found' => 'No Loan Calculators found',
                'not_found_in_trash' => 'No Loan Calculators found in Trash',
                'parent' => 'Parent Loan Calculator'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( 'category', ),
            'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
            'has_archive' => true
        )
    );
}

add_action( 'admin_init', 'my_admin' );

function my_admin() {
    add_meta_box( 'loan_calcultor_meta_box',
        'Loan Calculator Type',
        'display_loan_calcultor_meta_box',
        'loan_calculators', 'normal', 'high'
    );
}

function display_loan_calcultor_meta_box( $post ) {
    // Retrieve loan_amount, loan length, loan interest, and periodicity based on id
    $loan_title = get_post_meta( $post->ID, 'loan_title', true );
	$loan_amount = get_post_meta( $post->ID, 'loan_amount', true );
	 $loan_length = get_post_meta( $post->ID, 'loan_length', true );
	  $loan_interest = get_post_meta( $post->ID, 'loan_interest', true );
    $loan_periodicity = intval( get_post_meta( $post->ID, 'loan_periodicity', true ) );
    ?>
			<table>
				<tr>
					<td valign="top">Title:</td>
					<td><!--<select id="title" name="title" style="width: 600px;">   
            <option name="Mortgage" value="Mortgage">Mortgage</option> 
            <option name="Auto" value="Auto">Auto</option>
            <option name="Other" value="Other">Other</option>
            </select> -->
            <input name="title" style="width: 100%;" name="title" id="title" value="<?php echo $loan_title; ?>"/></td>
				</tr>
				<tr>
					<td valign="top">Loan Amount:</td>
					<td><input name="amount" id="amount" style="width: 100%;" value="<?php echo $loan_amount; ?>"/></td>
				</tr>
				<tr>
					<td valign="top">Loan Length:</td>
					<td><input name="length" id="length" style="width: 100%;" value="<?php echo $loan_length; ?>"/></td>
				</tr>
				<tr>
					<td valign="top">Interest:</td>
					<td><input name="interest" id="interest" style="width: 100%;" value="<?php echo $loan_interest; ?>"/></td>
				</tr>
				<tr>
					<td valign="top">Pay Periods:</td>
					<td>
						<select name="periodicity" id="periodicity" style="width: 100%;" value="<?php echo $loan_periodicity; ?>">
							<option value="52">Weekly</option>
							<option value="26">Bi-weekly</option>
							<option value="12" SELECTED>Monthly</option>
							<option value="6">Bi-monthly</option>
							<option value="4">Quarterly</option>
							<option value="2">Semi-annually</option>
							<option value="1">Annually</option>
						</select>
					</td>
				</tr>
			</table>
<?php
		}
		add_action( 'save_post', 'add_loan_calculator_fields', 10, 2 );
		
		function add_loan_calculator_fields( $post_id, $loan_calculators ) {
    // Check post type for movie reviews
    if ( $_POST['post_type'] == 'loan_calculators' ) {

        // Store data in post meta table if present in post data
         if ( isset( $_POST['title'] ) && $_POST['title'] != '' ) {
            update_post_meta( $post_id, 'loan_title', $_POST['title'] );
        }
		if ( isset( $_POST['amount'] ) && $_POST['amount'] != '' ) {
            update_post_meta( $post_id, 'loan_amount', $_POST['amount'] );
        }
        if ( isset( $_POST['length'] ) && $_POST['length'] != '' ) {
            update_post_meta( $post_id, 'loan_length', $_POST['length'] );
        }
		 if ( isset( $_POST['interest'] ) && $_POST['interest'] != '' ) {
            update_post_meta( $post_id, 'loan_interest', $_POST['interest'] );
        }
		if ( isset( $_POST['periodicity'] ) && $_POST['periodicity'] != '' ) {
            update_post_meta( $post_id, 'loan_periodicity', $_POST['periodicity'] );
        }
	}
}?>