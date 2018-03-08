<?php
class Csv {
	private $header;
	private $rows;

	function __construct($file_name, $parse_header=false) {
		$this->rows = array_map('str_getcsv', file($file_name));

		if ( $parse_header ) {
			$this->header = $this->rows[0];
			array_shift($this->rows);
		}
	}

	function getHeader() {
		return $this->header;
	}

	function getRows() {
		return $this->rows;
	}

	function fixFirstThreeColumns() {
		$col1 = '';
		$col2 = '';
		$col3 = '';

		for ( $i = 0; $i < count($this->rows); $i++ ) {
			if ( $this->rows[$i][0] != '' ) {
				$col1 = $this->rows[$i][0];
				$col2 = $this->rows[$i][1];
				$col3 = $this->rows[$i][2];
			} else {
				$this->rows[$i][0] = $col1;
				$this->rows[$i][1] = $col2;
				$this->rows[$i][2] = $col3;
			}
		}
	}
}
