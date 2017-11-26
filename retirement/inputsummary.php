<table border="0" cellspacing="0" cellpadding="<? echo $cellPadding; ?>" class="output" width="100%">
	<tr>
		<td class="inputoutput" width="200" <? echo $printStyleMain; ?>>
			<strong>Current Annual Income:</strong>
		</td>
		<td class="inputoutput" <? echo $printStyleMain; ?>>
			<?
			echo "$" . number_format($currentAnnualIncome, 2);
			
			if ($useRetirementFactor) {
				echo " <strong>(*)</strong>";
			}
			?>
		</td>
		<td class="inputoutput" width="200" <? echo $printStyleMain; ?>>
			<strong>Desired Post-Retirement Income:</strong>
		</td>
		<td class="inputoutput" <? echo $printStyleMain; ?>>
			<? echo number_format($postRetirementIncome, 2); ?>%
		</td>
		<td class="inputoutput" width="200" <? echo $printStyleMain; ?>>
			<strong>Assumed Long-term Inflation Rate:</strong>
		</td>
		<td class="inputoutput" <? echo $printStyleMain; ?>>
			<? echo number_format($longTermInflation, 2); ?>%
		</td>
	</tr>
	<tr>
		<td class="inputoutput" width="200" <? echo $printStyleMain; ?>>
			<strong>Average Annual Decrease in Spending (ages 65-74):</strong>
		</td>
		<td class="inputoutput" <? echo $printStyleMain; ?>>
			<? echo number_format($avgAnnualDecrease65to74, 2); ?>%
		</td>
		<td class="inputoutput" width="200" <? echo $printStyleMain; ?>>
			<strong>Average Annual Decrease in Spending (ages 75+):</strong>
		</td>
		<td class="inputoutput" <? echo $printStyleMain; ?>>
			<? echo number_format($avgAnnualDecrease75plus, 2); ?>%
		</td>
		<td class="inputoutput" width="200" <? echo $printStyleMain; ?>>
			<strong>Current Age:</strong>
		</td>
		<td class="inputoutput" <? echo $printStyleMain; ?>>
			<? echo number_format($currentAge); ?>
		</td>
	</tr>
	<tr>
		<td class="inputoutput" width="200" <? echo $printStyleMain; ?>>
			<strong>Desired Retirement Age:</strong>
		</td>
		<td class="inputoutput" <? echo $printStyleMain; ?>>
			<? echo number_format($desiredRetirementAge); ?>
		</td>
		<td class="inputoutput" width="200" <? echo $printStyleMain; ?>>
			<strong>Life Expectancy:</strong>
		</td>
		<td class="inputoutput" <? echo $printStyleMain; ?>>
			<? echo number_format($lifeExpectancy); ?>
		</td>
		<td class="inputoutput" width="200" <? echo $printStyleMain; ?>>
			<strong>Expected Annual Pension:</strong>
		</td>
		<td class="inputoutput" <? echo $printStyleMain; ?>>
			$<? echo number_format($expectedAnnualPension, 2); ?>
		</td>
	</tr>
	<tr>
		<td class="inputoutput" width="200" <? echo $printStyleMain; ?>>
			<strong>Expected Social Security Benefit:</strong>
		</td>
		<td class="inputoutput" <? echo $printStyleMain; ?>>
			$<? echo number_format($expectedSSBenefit, 2); ?>
		</td>
		<td class="inputoutput" width="200" <? echo $printStyleMain; ?>>
			<strong>Age Social Security Begins:</strong>
		</td>
		<td class="inputoutput" <? echo $printStyleMain; ?>>
			<? echo number_format($ageSSBegins); ?>
		</td>
		<td class="inputoutput" width="200" <? echo $printStyleMain; ?>>
			<strong>Assumed Investment Return:</strong>
		</td>
		<td class="inputoutput" <? echo $printStyleMain; ?>>
			<? echo number_format($assumedInvestmentReturn, 2); ?>%
		</td>
	</tr>
</table>
<br />