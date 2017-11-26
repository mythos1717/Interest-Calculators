<?php

	

	/**

	 * Project:     phpLoanCalc v1.0

	 * Files:       loan-calculator.php

	 *              loan-calculator.tpl

	 *

	 * This library is free software; you can redistribute it and/or

	 * modify it under the terms of the GNU General Public License

	 * as published by the Free Software Foundation; either version 2.1

	 * of the License, or (at your option) any later version.

     *

	 * The footer text along with the link("Powered by PC-Calculators.com") 

	 * MUST NOT BE REMOVED, otherwise any use of the software will be constituted

	 * as a breach of copyright. Please, contact scripts@pc-calculators.com

	 * for commercial inquiries and licensing.

	 * 

	 * This library is distributed in the hope that it will be useful,

	 * but WITHOUT ANY WARRANTY; without even the implied warranty of

	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU

	 * General Public License for more details.

	 *

	 * You should have received a copy of the GNU General Public License

	 * along with this software; if not, write to the Free Software

	 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA

	 *

	 * For questions, commercial inquiries, licensing, help, comments, discussion,

	 * etc., please contact scripts@pc-calculators.com

	 *

	 * @link http://www.pc-calculators.com/

	 * @copyright 2004 ArsRef, LLC.

	 * @author Arseniy Olevskiy <arseniy@pc-calculators.com>

	 * @package phpLoanCalc

	 * @version 1.0

	 */



	/* Loading template */

	extract(load_calc_template("wp-content/plugins/loan-calculators/loan-calculator-template.tpl"));

	

	/* Defining Variables */

	$periods = array(

					52 => 'Weekly',

					26 => 'Bi-weekly',

					12 => 'Monthly',

					6 => 'Bi-monthly',

					4 => 'Quarterly',

					2 => 'Semi-annually',

					1 => 'Annually'

					);

	$loan_amount     = isset($_GET["loan_amount"])     ? $_GET["loan_amount"]     : 0;

	$loan_length     = isset($_GET["loan_length"])     ? $_GET["loan_length"]     : 0;

	$annual_interest = isset($_GET["annual_interest"]) ? $_GET["annual_interest"] : 0;

	$pay_periodicity = isset($_GET["pay_periodicity"]) ? $_GET["pay_periodicity"] : 0;

	$periodicity     = $periods[$pay_periodicity];

	

	$pay_periods = '';

	foreach($periods as $value => $name)

	{

		$selected = ($pay_periodicity == $value) ? 'selected' : '';

		$pay_periods .= "<option value=\"{$value}\" id=\"period_{$value}\">{$name}</option>";

	}

	

	/* Checking Variables */

	/*if(!is_numeric($loan_amount) or $loan_amount <= 0) 

		{ $error = "<p><font color=red>Loan amount</font> has to be numeric and greater than zero.</p>"; $booboo=1;}



	if(!is_numeric($loan_length) or $loan_length <= 0) 

		{ $error = "<p><font color=red>Loan length</font> has to be numeric and greater than zero.</p>";  $booboo=1;}



	if(!is_numeric($annual_interest) or $annual_interest <= 0) 

		{ $error = "<p><font color=red>Annual interest</font> has to be numeric and greater than zero.</p>";  $booboo=1;}*/



	/*

	*----------------------------------

	*    Calculating and displaying

	*----------------------------------

	*/

	

	/* Process Loan Parameters Form in any case */

	$loan_parameters_form = replace_vars($loan_parameters_form);


	/* If no error, then begin calculations */

	if(!isset($booboo) && isset($_GET['action']))

	{

		$c_balance         = $loan_amount;

		$total_periods     = $loan_length * $pay_periodicity;

		$interest_percent  = $annual_interest / 100;

		$period_interest   = $interest_percent / $pay_periodicity;

	    $c_period_payment  = $loan_amount * ($period_interest / (1 - pow((1 + $period_interest), -($total_periods))));

		$total_paid        = number_format($c_period_payment * $total_periods, 2, '.', ' ');

		$total_interest    = number_format($c_period_payment * $total_periods - $loan_amount, 2, '.', ' ');

		$total_principal   = number_format($loan_amount, 2, '.', ' ');



		$loan_amount     = number_format($loan_amount, 2, '.', ' ');

		$annual_interest = number_format($annual_interest, 2, '.', ' ');

	    $period_payment  = number_format($c_period_payment, 2, '.', ' ');


		$amortization_table_rows = '';

		for($period = 1; $period <= $total_periods; $period++)

		{

			$c_interest  = $c_balance * $period_interest;

			$c_principal = $c_period_payment - $c_interest;

			$c_balance  -= $c_principal;

			

			$interest  = number_format($c_interest, 2, '.', ' ');

			$principal = number_format($c_principal, 2, '.', ' ');

			$balance   = number_format($c_balance, 2, '.', ' ');

			

			$evenrow_row_modifier = ($period % 2) ? '' : 'class=evenrow';



			$amortization_table_rows .= replace_vars($amortization_table_row);

		}

	}

	else

	{
echo		$amortization_table = '';

		$loan_summary = '';

	}

	$body = replace_vars($body);

	

	/* If headers sent, then it means that the script is used as inclusion */

	if(!headers_sent())

	{

		$send_footer = true;

		echo strip($header);

	}

	

	echo strip(replace_vars($body));



	if(isset($send_footer))

	{

		echo strip($footer);

	}

	

	/*

	*----------------------------------

	*            Functions

	*----------------------------------

	*/

	

	function replace_vars($tpl)

	{

		return preg_replace_callback("/\{(.+?)\}/", "glb", $tpl);

	}

	

	function glb($m)

	{

		if(isset($GLOBALS[$m[1]]))

		{

			return $GLOBALS[$m[1]];

		}

	}

	

	function load_calc_template($path)

	{

		/* Loads template from file */

		$h = fopen($path, "r");

		$file = fread($h, filesize($path));

		fclose($h);

		

		preg_match_all('/<!-- BEGIN (.+?) -->(.+?)<!-- END \1 -->/is', $file, $m);

		

		for($i=0; $i<count($m[1]); $i++)

		{

			$template[$m[1][$i]] = $m[2][$i];

		}

		

		return $template;

	}



	function strip($text)

	{

		/* Removes New Line characters and multiple spaces */

	    return preg_replace('/\s+/', ' ', $text);

	}

?>