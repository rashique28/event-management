<?php

	if (!function_exists('dateRange')) {
		function dateRange($startDate,$endDate,$record)
		{
			$newArray = array();
			if ($record['recurrence_type']!='1') {
				$dayType = 'day';
				$every = '1';

				$dayType = $record['repeat_every'];
				if ($record['repeats']=='Every') {
					$every = '1';
				} else if ($record['repeats']=='Every Other'){
					$every = '2';
				} else if ($record['repeats']=='Every Third'){
					$every = '3';
				} else if ($record['repeats']=='Every Fourth'){
					$every = '4';
				}

				$start = strtotime($startDate);
				$end = strtotime($endDate);

				$month = $start;
				$months[] = date('Y-m-d',$month);
				$weekDays[] = date('l', $month);
				$years[] = date('Y', $month);
				while ($month < $end) {
					$month = strtotime("+$every".$dayType,$month);
					if ($month <= $end) {
						$months[] = date('Y-m-d', $month);
						$weekDays[] = date('l', $month);
						$years[] = date('Y', $month);
					}
				}
				$newArray = array_combine($months,$weekDays);
			} else {
				$occur = $record['repeat_occur'];
				$day = $record['repeat_week'];

				if ($record['repeat_month']=='Month') {
					$every = '1';
				} else if ($record['repeat_month']=='3 Months'){
					$every = '3';
				} else if ($record['repeat_month']=='4 Months'){
					$every = '4';
				} else if ($record['repeat_month']=='6 Months'){
					$every = '6';
				} else if ($record['repeat_month']=='Year'){
					$every = '12';
				}

				$startDate = strtotime($startDate);
				$start = strtotime("-$every Month",$startDate);
				$end = strtotime($endDate);

				$month = $start;
				// $months[] = date('Y-m-d',$month);
				// $weekDays[] = date('l', $month);
				// $years[] = date('Y', $month);
				while ($month < $end) {
					$month = strtotime("+$every Month",$month);
					$month = strtotime($occur.' '.$day.' of '.date('F Y',$month));
					if ($month <= $end) {
						$months[] = date('Y-m-d', $month);
						$weekDays[] = date('l', $month);
						$years[] = date('Y', $month);
					}
				}
				$newArray = array_combine($months,$weekDays);
			}
			return $newArray;
		}
	}



