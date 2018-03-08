<?php
class Count {
	public static function getSingleVaria( $arr ) {
		$ret = [];

		// get map of tcn with number count
		$arrGroupBy = Count::groupByArray($arr);

		// loop through all rows
		foreach ( $arr as $row ) {
			// check if last column equals Varia
			if ( trim($row[4]) == 'Varia' ) {
				// if contains Varia and group by array value (tcn) exists only once
				if ( $arrGroupBy[$row[0]] == 1 ) {
					// add to group varia list
					$ret[] = $row[0];
				}
			}
		}

		return $ret;
	}

	public static function getGroupVaria( $arr, $arrExclude ) {
		$ret = [];

		// loop through all rows
		foreach ( $arr as $row ) {
			// check if last column contains Varia
			if ( strpos($row[4], 'Varia' ) !== false ) {
				// if contains Varia and not in exclude array
				if ( !in_array($row[0], $arrExclude) ) {
					// add to group varia list
					$ret[] = $row[0];
				}
			}
		}

		// make list unique
		$ret = array_unique($ret);

		//
		return $ret;
	}

	public static function groupByArray( $arr ) {
		$ret = [];

		foreach( $arr as $row ) {
			if ( isset($ret[$row[0]]) ) {
				$ret[$row[0]] = $ret[$row[0]]+1;
			} else {
				$ret[$row[0]] = 1;
			}
		}

		return $ret;
	}
}