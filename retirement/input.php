<?
if ($errorMsg != "") {
	echo "<div class='error'>";
	//echo "Validation errors:";
	echo "<ul>";
	echo $errorMsg;
	echo "</ul>";
	echo "</div>";
}
?>

<form action="" method="post">
	<table border="0" cellpadding="3" cellspacing="0" class="input">
		<tr>
			<td valign="top" class="general">
				<strong>Current Annual Income ($):</strong>
			</td>
			<td valign="top" class="general">
				<input type="text" name="currentAnnualIncome" value="<? echo $currentAnnualIncome; ?>" size="15" maxlength="20">
			</td>
			<td width="20" class="general">&nbsp;</td>
			<td width="300" valign="top" class="note">Enter your current <em>gross</em> annual income.
				
			</td>
		</tr>
		<tr>
			<td class="general">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" class="general">
				<strong>Desired Post-Retirement Income (%):</strong>
			</td>
			<td valign="top" class="general">
				<input type="text" name="postRetirementIncome" value="<? echo $postRetirementIncome; ?>" size="6" maxlength="3"><br>
				<div class="note" style="font-style:italic">(As % of Current Income)</div>
			</td>
			<td width="20" class="general">&nbsp;</td>
			<td width="300" valign="top" class="note"> Enter the percentage of your current income that you project you will need during retirement to maintain your standard of living. Individual circumstances vary, but here are some general guidelines to help you:
<br><br>
<li>Minimum (50% to 60%): This meets the government's minimum level of financial adequacy (defined as one-half of pre-retirement income).</li>
<li>Basic (70% to 80%): Will allow for the basics in retirement, particularly if you have employer-paid retiree health insurance. Plan for a retirement with limited money availalble for travel or luxury expenditures.</li>
<li>Moderate (80% to 90%): May be required if you will have to pay your own Medicare premiums and/or pay for insurance to cover costs above Medicare.</li>
<li>Comfortable (90% to 120%): This level may be needed if you would like a retirement lifestyle that is more comfortable than your current lifestyle.</li>

			</td>
		</tr>
		<tr>
			<td class="general">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" class="general">
			
				<strong>Assumed Long-term Inflation Rate (%):</strong>
			</td>
			<td valign="top" class="general">
				<input type="text" name="longTermInflation" value="<? echo $longTermInflation; ?>" size="6" maxlength="3">
			</td>
			<td width="20" class="general">&nbsp;</td>
			<td width="300" valign="top" class="note">Enter the percent you feel that inflation will rise on average during retirement. Since 1913, statistics show an annual average inflation rate of 3.3%. Since 1972, the inflation rate has ran at a 4.78% annual clip. A 2.5% to 5% inflation rate is a reasonable projection for the long-term future.
			</td>
		</tr>
		<tr>
			<td class="general">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" class="general">
				<strong>Average Annual Decrease in Spending (%):</strong>
			</td>
			<td valign="top" class="general">&nbsp;
				
			</td>
			<td width="20" class="general">&nbsp;</td>
			<td width="300" valign="top" class="note">&nbsp;
				
			</td>
		</tr>
		<tr>
			<td valign="top" class="general">
				&nbsp;&nbsp;&nbsp;&nbsp;Ages 65-74:
			</td>
			<td valign="top" class="general">
				<input type="text" name="avgAnnualDecrease65to74" value="<? echo $avgAnnualDecrease65to74; ?>" size="4" maxlength="3">
			</td>
			<td width="20" class="general">&nbsp;</td>
			<td width="300" valign="top" class="note">
				National Average: <? echo $defaultAvgAnnualDecrease65to74; ?>%
			Senior Spending Detail
			
			</td>
		</tr>
		<tr>
			<td valign="top" class="general">
				&nbsp;&nbsp;&nbsp;&nbsp;Ages 75+:
			</td>
			<td valign="top" class="general">
				<input type="text" name="avgAnnualDecrease75plus" value="<? echo $avgAnnualDecrease75plus; ?>" size="4" maxlength="3">
			</td>
			<td width="20" class="general">&nbsp;</td>
			<td width="300" valign="top" class="note">
				National Average: <? echo $defaultAvgAnnualDecrease75plus; ?>%
			Senior Spending Detail
			
			</td>
		</tr>
		<tr>
			<td class="general">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" class="general">
				<strong>Current Age:</strong>
			</td>
			<td valign="top" class="general">
				<input type="text" name="currentAge" value="<? echo $currentAge; ?>" size="4" maxlength="3">
			</td>
			<td width="20" class="general">&nbsp;</td>
			<td width="300" valign="top" class="note">
				Enter your current age rounded up to the next whole year.
			</td>
		</tr>
		<tr>
			<td class="general">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" class="general">
				<strong>Desired Retirement Age:</strong>
			</td>
			<td valign="top" class="general">
				<input type="text" name="desiredRetirementAge" value="<? echo $desiredRetirementAge; ?>" size="4" maxlength="3">
			</td>
			<td width="20" class="general">&nbsp;</td>
			<td width="300" valign="top" class="note">
				Enter you desired retirement age rounded to the nearest whole year.
			</td>
		</tr>
		<tr>
			<td class="general">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" class="general">
				<strong>Life Expectancy:</strong>
			</td>
			<td valign="top" class="general">
				<input type="text" name="lifeExpectancy" value="<? echo $lifeExpectancy; ?>" size="4" maxlength="3">
			</td>
			<td width="20" class="general">&nbsp;</td>
			<td width="300" valign="top" class="note">Enter the age you expect to live to. <a href="http://www.nmfn.com/tn/learnctr--lifeevents--longevity" "target=blank">Northwestern Mutual</a> offers an excellent interactive calculator to help you assess longevity based on health, family history, and many other variables.
			</td>
		</tr>
		<tr>
			<td class="general">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" class="general">
				<strong>Expected Annual Pension ($):</strong>
			</td>
			<td valign="top" class="general">
				<input type="text" name="expectedAnnualPension" value="<? echo $expectedAnnualPension; ?>" size="15" maxlength="20">
			</td>
			<td width="20" class="general">&nbsp;</td>

			<td width="300" valign="top" class="note">If you're lucky enough to be vested in a company-provided pension, enter the yearly amount you expect to receive during retirement. Contact your company's benefit office for this information.
			</td>
		</tr>
		<tr>
			<td class="general">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" class="general">
				<strong>Expected Social Security Benefit ($):</strong>
			</td>
			<td valign="top" class="general">
				<input type="text" name="expectedSSBenefit" value="<? echo $expectedSSBenefit; ?>" size="15" maxlength="20">
			</td>
			<td width="20" class="general">&nbsp;</td>
			<td width="300" valign="top" class="note">Enter the yearly amount you expect to receive from social security during retirement. The social security office sends you a benefit statement each year near your birthday with more precise benefit information. Use this if available. Or, you can request an up to date statement here. Otherwise, you can use these very general guidelines:
<br><br>
<li>If you make under $25,000, enter $8,000</li>
<li>If you make between $25,000 - $40,000, enter $12,000</li>
<li>If you make over $40,000, enter $14,500</li>

			</td>
		</tr>
		<tr>
			<td valign="top" class="general">
				<strong>Age Social Security Begins (Min 62):</strong>
			</td>
			<td valign="top" class="general">
				<input type="text" name="ageSSBegins" value="<? echo $ageSSBegins; ?>" size="4" maxlength="3">
			</td>
			<td width="20" class="general">&nbsp;</td>
			<td width="300" valign="top" class="note">
				Enter the age at which you expect to start receiving social security benefits. Full benefits are available at age 65 and reduced benefits are available at 62.
			</td>
		</tr>
		<tr>
			<td class="general">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" class="general">
				<strong>Assumed Investment Return (%):</strong>
			</td>
			<td valign="top" class="general">
				<input type="text" name="assumedInvestmentReturn" value="<? echo $assumedInvestmentReturn; ?>" size="15" maxlength="20">
			</td>
			<td width="20" class="general">&nbsp;</td>
			<td width="300" valign="top" class="note">Enter the average annual long-term investment return you expect to earn on your retirement savings.  The lower the expected rate, the more you'll need to save to meet retirement income goals. The default is 7%.
			</td>
		</tr>
		<tr>
			<td class="general">&nbsp;</td>
		</tr>
		<tr>
			<td class="general">&nbsp;</td>
		</tr>
		<tr>
			<td class="general" colspan="4" align="right">
				<input type="submit" name="submit" value="Calculate" />
				<input type="reset" name="reset" value="Reset" onclick="window.location = '<?=$_SERVER['PHP_SELF']?>';" />
			</td>
		</tr>
	</table>
</form>