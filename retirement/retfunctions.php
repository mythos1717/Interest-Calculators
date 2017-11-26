<?
function NPV($rate, $values) {
	$npv = 0;
	
	for ($i = 1; $i <= count($values); $i++) {
		$npv = $values[count($values) - $i] + $npv / (1 + $rate);
	}
	
	/*for ($t = 0; $t <= (count($values) - 1); $t++) {
		$num = $values[$t];
		$den = 1;
		
		if ($t >= 0) {
			for ($exp = 1; $exp <= $t; $exp++) {
				$den *= (1 + $rate);
			}
		}
		
		$npv += $num / $den;
	}*/
	
	return $npv;
}

function CalculateRSNTraditional($age) {
	global $currentAge, $currentAnnualIncome, $desiredRetirementAge, $totalRSNTraditional, $longTermInflation, $postRetirementIncome, $useRetirementFactor;
	
	if ($age == $currentAge) {
		//If current age is equal to retirement age, the current income is reduced by the desired post-retirement income factor.
		if ($useRetirementFactor) {
			$result = $currentAnnualIncome * ($postRetirementIncome / 100);
		}
		else {
			$result = $currentAnnualIncome;
		}
	}
	elseif (($age > $currentAge) && ($age < $desiredRetirementAge)) {
		$result = $totalRSNTraditional + ($totalRSNTraditional * ($longTermInflation / 100));
	}
	elseif ($age == $desiredRetirementAge) {
		$pct = $postRetirementIncome / 100;
		$temp = $totalRSNTraditional * $pct;
		$temp = $temp + ($temp * ($longTermInflation / 100));
		
		$result = $temp;
	}
	else {
		$result = $totalRSNTraditional + ($totalRSNTraditional * ($longTermInflation / 100));
	}
	
	return $result;
}

function CalculateRSNReality($age) {
	global $currentAge, $currentAnnualIncome, $desiredRetirementAge, $totalRSNReality, $longTermInflation, $postRetirementIncome, $ageSSBegins;
	global $avgAnnualDecrease65to74, $avgAnnualDecrease75plus, $useRetirementFactor;
	
	if ($age == $currentAge) {
		//If current age is equal to retirement age, the current income is reduced by the desired post-retirement income factor.
		if ($useRetirementFactor) {
			$result = $currentAnnualIncome * ($postRetirementIncome / 100);
		}
		else {
			$result = $currentAnnualIncome;
		}
	}
	elseif (($age > $currentAge) && ($age < $desiredRetirementAge)) {
		$result = $totalRSNReality + ($totalRSNReality * ($longTermInflation / 100));
	}
	elseif ($age == $desiredRetirementAge) {
		$pct = $postRetirementIncome / 100;
		$temp = $totalRSNReality * $pct;
		$temp = $temp + ($temp * ($longTermInflation / 100));
		
		$result = $temp;
	}
	elseif (($age > $desiredRetirementAge) && ($age < $ageSSBegins)) {
		$result = $totalRSNReality + ($totalRSNReality * ($longTermInflation / 100));
	}
	elseif (($age >= $ageSSBegins) && ($age < 75)) {
		$result = $totalRSNReality + ($totalRSNReality * (($longTermInflation - $avgAnnualDecrease65to74) / 100));
	}
	else {
		$result = $totalRSNReality + ($totalRSNReality * (($longTermInflation - $avgAnnualDecrease75plus) / 100));
	}
	
	return $result;
}

function CalculateExpectedSSBenefit($age) {
	global $colaFactor, $ageSSBegins, $expectedSSBenefitCOLA;
	
	if ($age <= $ageSSBegins) {
		return $expectedSSBenefitCOLA;
	}
	else {
		return $expectedSSBenefitCOLA + ($expectedSSBenefitCOLA * ($colaFactor / 100));
	}
}

function CalculateNetRSNTraditional($age) {
	global $ageSSBegins, $totalRSNTraditional, $expectedAnnualPension, $expectedSSBenefitCOLA;
	
	if ($age < $ageSSBegins) {
		return $totalRSNTraditional - $expectedAnnualPension;
	}
	else {
		return $totalRSNTraditional - $expectedAnnualPension - $expectedSSBenefitCOLA;
	}
}

function CalculateNetRSNReality($age) {
	global $ageSSBegins, $totalRSNReality, $expectedAnnualPension, $expectedSSBenefitCOLA;
	
	if ($age < $ageSSBegins) {
		return $totalRSNReality - $expectedAnnualPension;
	}
	else {
		return $totalRSNReality - $expectedAnnualPension - $expectedSSBenefitCOLA;
	}
}
?>