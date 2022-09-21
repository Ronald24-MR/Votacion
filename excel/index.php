<?php  
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\SpreadSheet;

$spreadsheet = new SpreadSheet();
$spreadsheet->getProperties()->setCreator("Prueba")->setTitle("Prueba Excel");

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();

$hojaActiva->setCellValue("A1","CODIGOS");
$hojaActiva->setCellValue("B2","CODIGOS 2");

$hojaActiva->setCel

?>