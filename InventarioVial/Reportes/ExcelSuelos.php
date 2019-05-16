<?php 
require_once 'functions/excelsuelos.php';

activeErrorReporting();
noCli();

require_once 'PHPEXCEL/Classes/PHPExcel.php';
require_once 'functions/conexion.php';
require_once 'functions/Suelos.php';

$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Developero")
               ->setLastModifiedBy("Maarten Balliauw")
               ->setTitle("Office 2007 XLS Test Document")
               ->setSubject("Office 2007 XLS Test Document")
               ->setDescription("Test document for Office 2007 XLS, generated using PHP classes.")
               ->setKeywords("office 2007 openxml php")
               ->setCategory("Test result file");

$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')
                                          ->setSize(10);            

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Número Lista')
            ->setCellValue('B1', 'Costado')
            ->setCellValue('C1', 'Uso')
			->setCellValue('D1', 'inventario');

$informe = Suelo();
$i = 2;
while($row = $informe->fetch_array(MYSQLI_ASSOC))
{
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A$i", $row['Lista'])
            ->setCellValue("B$i", $row['Costado'])
            ->setCellValue("C$i", $row['Uso'])
			->setCellValue("D$i", $row['inventario']);
$i++;
}

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setTitle('Reporte de Suelos');

$objPHPExcel->setActiveSheetIndex(0);

getHeaders();

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;