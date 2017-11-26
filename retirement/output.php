<?
include('wp-content/plugins/loan-calculators/retirement/retfunctions.php');

//Set variables for print version.
if (isset($_POST["printVersion"])) {
	$cellPadding = "0";
	$pageWidth = "650";
	$printStyleMain = " style='font-size:10px;'";
	$printStyleSmall = " style='font-size:8px;'";
}
else {
	$cellPadding = "0";
	$pageWidth = "650";
	$printStyleMain = " style='font-size:12px;'";
	$printStyleSmall = " style='font-size:12px;'";
}
?>
<? include('wp-content/plugins/loan-calculators/retirement/inputsummary.php'); ?>

<table border="0" cellspacing="0" cellpadding="<? echo $cellPadding; ?>" class="output" width="100%" style="width:100%;">
	<tr>
		<td class="resultheader" align="center" <? echo $printStyleMain; ?>>&nbsp;</td>
		<td class="resultheader" align="center" <? echo $printStyleMain; ?>>
			<strong>
				Total Retirement Spending Needs (Traditional Planning)
			</strong>
		</td>
		<td class="resultheader" align="center" <? echo $printStyleMain; ?>>
			<strong>
				Total Retirement Spending Needs (Reality Planning)
			</strong>
		</td>
		<td class="resultheader" align="center" <? echo $printStyleMain; ?>>
			<strong>
				Less: Expected Pension
			</strong>
		</td>
		<td class="resultheader" align="center" <? echo $printStyleMain; ?>>
			<strong>
				Less: Expected Social Security
			</strong>
		</td>
		<td class="resultheader" align="center" <? echo $printStyleMain; ?>>
			<strong>
				Equals: Net Retirement Spending Needs (Traditional Planning)
			</strong>
		</td>
		<td class="resultheader" align="center" <? echo $printStyleMain; ?>>
			<strong>
				Equals: Net Retirement Spending Needs (Reality Planning)
			</strong>
		</td>
	</tr>
	
	<?
	//Initialize values
	$totalRSNTraditional = 0;
	$totalRSNReality = 0;
	$expectedSSBenefitCOLA = $expectedSSBenefit;
	
	if ($currentAge < $desiredRetirementAge) {
		$limit = $desiredRetirementAge;
	}
	else {
		$limit = $currentAge;
	}
	
	for($age = $currentAge; $age <= $lifeExpectancy; $age++) {
		//Total Retirement Spending Needs (Traditional Planning)
		$totalRSNTraditional = CalculateRSNTraditional($age);
		
		//Total Retirement Spending Needs (Reality Planning)
		$totalRSNReality = CalculateRSNReality($age);
		
		//Expected Social Security Benefit (with COLA)
		$expectedSSBenefitCOLA = CalculateExpectedSSBenefit($age);
		
		//Net Retirement Spending Needs (Traditional Planning)
		$netRSNTraditional = CalculateNetRSNTraditional($age);
		
		//Net Retirement Spending Needs (Reality Planning)
		$netRSNReality = CalculateNetRSNReality($age);
		
		//Set arrays
		if ($age >= $limit) {
			$totalRSNTraditionalValues[$age - $limit] = $totalRSNTraditional;
			$totalRSNRealityValues[$age - $limit] = $totalRSNReality;
			$netRSNTraditionalValues[$age - $limit] = $netRSNTraditional;
			$netRSNRealityValues[$age - $limit] = $netRSNReality;
		}
	}
	
	//Calculate NPVs
	$npvTotalRSNTraditional = NPV(($assumedInvestmentReturn / 100), $totalRSNTraditionalValues);
	$npvTotalRSNReality = NPV(($assumedInvestmentReturn / 100), $totalRSNRealityValues);
	$npvNetRSNTraditional = NPV(($assumedInvestmentReturn / 100), $netRSNTraditionalValues);
	$npvNetRSNReality = NPV(($assumedInvestmentReturn / 100), $netRSNRealityValues);
	?>
	
	<tr>
		<td class="npv" <? echo $printStyleSmall; ?>>
			<div class="note">This row shows the total savings (present value) you should have invested at retirement to cover your expected retirement spending needs. Amounts are computed using both traditional planning assumptions and reality retirement assumptions.
			</div>
		</td>
		<td align="right" class="npv" <? echo $printStyleMain; ?>>
			<!--Total Retirement Spending Needs (Traditional Planning)-->
			<strong>$<? echo number_format($npvTotalRSNTraditional); ?></strong>
		</td>
		<td align="right" class="npv" <? echo $printStyleMain; ?>>
			<!--Total Retirement Spending Needs (Reality Planning)-->
			<strong>$<? echo number_format($npvTotalRSNReality); ?></strong>
		</td>
		<td align="right" class="npv" <? echo $printStyleMain; ?>>
			<!--Less: Expected Pension-->
			&nbsp;
		</td>
		<td align="right" class="npv" <? echo $printStyleMain; ?>>
			<!--Less: Expected Social Security-->
			&nbsp;
		</td>
		<td align="right" class="npv" <? echo $printStyleMain; ?>>
			<!--Equals: Net Retirement Spending Needs (Traditional Planning)-->
			<strong>$<? echo number_format($npvNetRSNTraditional); ?></strong>
		</td>
		<td align="right" class="npv" <? echo $printStyleMain; ?>>
			<!--Equals: Net Retirement Spending Needs (Reality Planning)-->
			<strong>$<? echo number_format($npvNetRSNReality); ?></strong>
		</td>
	</tr>
	<?
	if ($useRetirementFactor) {
		?>
		<tr>
			<td colspan="7" class="warning" <? echo $printStyleMain; ?>>
				<?
				echo "You have entered a retirement age that is less than your current age.";
				echo " If you don't want your current income reduced, click on 'Recalculate'";
				echo " and enter 100% in the 'Desired Post-Retirement Income' field.";
				?>
			</td>
		</tr>
		<?
	}
	
	//Initialize values
	$totalRSNTraditional = 0;
	$totalRSNReality = 0;
	$expectedSSBenefitCOLA = $expectedSSBenefit;
	$ageClass = "age2";
	
	for($age = $currentAge; $age <= $lifeExpectancy; $age++) {
		//Total Retirement Spending Needs (Traditional Planning)
		$totalRSNTraditional = CalculateRSNTraditional($age);
		
		//Total Retirement Spending Needs (Reality Planning)
		$totalRSNReality = CalculateRSNReality($age);
		
		//Expected Social Security Benefit (with COLA)
		$expectedSSBenefitCOLA = CalculateExpectedSSBenefit($age);
		
		//Net Retirement Spending Needs (Traditional Planning)
		$netRSNTraditional = CalculateNetRSNTraditional($age);
		
		//Net Retirement Spending Needs (Reality Planning)
		$netRSNReality = CalculateNetRSNReality($age);
		
		if ($ageClass == "age2") {
			$ageClass = "age1";
		}
		else {
			$ageClass = "age2";
		}
		?>
		<tr>
			<td align="center" class="<? echo $ageClass; ?>" <? echo $printStyleMain; ?>>
				<strong><? echo $age; ?></strong>
			</td>
			<td align="right" class="<? echo $ageClass; ?>" <? echo $printStyleMain; ?>>
				<!--Total Retirement Spending Needs (Traditional Planning)-->
				<?
				if ($age == $currentAge && $useRetirementFactor) {
					echo "<strong>(*)</strong>&nbsp;&nbsp;";
				}
				
				echo number_format($totalRSNTraditional);
				?>
			</td>
			<td align="right" class="<? echo $ageClass; ?>" <? echo $printStyleMain; ?>>
				<!--Total Retirement Spending Needs (Reality Planning)-->
				<?
				if ($age == $currentAge && $useRetirementFactor) {
					echo "<strong>(*)</strong>&nbsp;&nbsp;";
				}
				
				echo number_format($totalRSNReality);
				?>
			</td>
			<td align="right" class="<? echo $ageClass; ?>" <? echo $printStyleMain; ?>>
				<!--Less: Expected Pension-->
				<?
				if ($age >= $desiredRetirementAge) {
					echo number_format($expectedAnnualPension);
				}
				else {
					echo "-";
				}
				?>
			</td>
			<td align="right" class="<? echo $ageClass; ?>" <? echo $printStyleMain; ?>>
				<!--Less: Expected Social Security-->
				<?
				if ($age >= $ageSSBegins) {
					echo number_format($expectedSSBenefitCOLA);
				}
				else {
					echo "-";
				}
				?>
			</td>
			<td align="right" class="<? echo $ageClass; ?>" <? echo $printStyleMain; ?>>
				<!--Equals: Net Retirement Spending Needs (Traditional Planning)-->
				<?
				if ($age >= $desiredRetirementAge) {
					echo number_format($netRSNTraditional);
				}
				else {
					echo "-";
				}
				?>
			</td>
			<td align="right" class="<? echo $ageClass; ?>" <? echo $printStyleMain; ?>>
				<!--Equals: Net Retirement Spending Needs (Reality Planning)-->
				<?
				if ($age >= $desiredRetirementAge) {
					echo number_format($netRSNReality);
				}
				else {
					echo "-";
				}
				?>
			</td>
		</tr>
		<?
	}
	?>
</table>

<?
if ($useRetirementFactor) {
	?>
	<table border="0" cellspacing="0" cellpadding="0" width="<? echo $pageWidth; ?>" style="width:100%;max-width:650px;">
		<tr>
			<td class="note">
				(*) Current Annual Income has been reduced by the Desired Post-Retirement Income factor
				because your current age is equal or greater than to your desired retirement age.
			</td>
		</tr>
	</table>
	<?
}

if (!isset($_POST['printVersion'])) {
	?>
	<br />
	<form action="" method="post">
		<input type="hidden" name="currentAnnualIncome" value="<? echo $currentAnnualIncome; ?>" />
		<input type="hidden" name="postRetirementIncome" value="<? echo $postRetirementIncome; ?>" />
		<input type="hidden" name="longTermInflation" value="<? echo $longTermInflation; ?>" />
		<input type="hidden" name="avgAnnualDecrease65to74" value="<? echo $avgAnnualDecrease65to74; ?>" />
		<input type="hidden" name="avgAnnualDecrease75plus" value="<? echo $avgAnnualDecrease75plus; ?>" />
		<input type="hidden" name="currentAge" value="<? echo $currentAge; ?>" />
		<input type="hidden" name="desiredRetirementAge" value="<? echo $desiredRetirementAge; ?>" />
		<input type="hidden" name="lifeExpectancy" value="<? echo $lifeExpectancy; ?>" />
		<input type="hidden" name="expectedAnnualPension" value="<? echo $expectedAnnualPension; ?>" />
		<input type="hidden" name="expectedSSBenefit" value="<? echo $expectedSSBenefit; ?>" />
		<input type="hidden" name="ageSSBegins" value="<? echo $ageSSBegins; ?>" />
		<input type="hidden" name="assumedInvestmentReturn" value="<? echo $assumedInvestmentReturn; ?>" />
		<input type="submit" name="recalculate" value="Recalculate" />
	</form>
	<?
}
?>

