<?php
require_once "classes/count.php";
require_once "classes/csv.php";
require_once "classes/misc.php";

$oCsv = new Csv("input.ORIGINAL.csv",true);
$oCsv->fixFirstThreeColumns();

$arrSingleVaria = Count::getSingleVaria( $oCsv->getRows() );
$arrGroupVaria = Count::getGroupVaria( $oCsv->getRows(), $arrSingleVaria );

pre('number of rows: ' . count($oCsv->getRows()));

pre( 'Single varia count: ' . count( $arrSingleVaria ) );
pre('tcn: ' . implode(', ', $arrSingleVaria));

pre( 'Group varia count: ' . count( $arrGroupVaria ) );
pre('tcn: ' . implode(', ', $arrGroupVaria));

//pre('<hr>');
//
//pre( $oCsv->getHeader() );
//foreach($oCsv->getRows() as $row ) {
//	pre($row);
//}
//
//pre('einde');
