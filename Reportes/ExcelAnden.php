<?php 
require_once 'functions/excelanden.php';

activeErrorReporting();
noCli();

require_once 'PHPEXCEL/Classes/PHPExcel.php';
require_once 'functions/conexion.php';
require_once 'functions/Anden.php';

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
            ->setCellValue('A1', 'Número Anden')
            ->setCellValue('B1', 'Número Inventario')
            ->setCellValue('C1', 'Número de Andenes')
            ->setCellValue('D1', 'Altura de Bordillo')           ->setCellValue('E1', 'Ancho')
		    ->setCellValue('F1', 'Costado')
			->setCellValue('G1', 'Estado')
			  ->setCellValue('H1', 'Tipo Cobertura');

$informe = Anden();
$i = 2;
while($row = $informe->fetch_array(MYSQLI_ASSOC))
{
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A$i", $row['Anden'])
            ->setCellValue("B$i", $row['Inventario'])
            ->setCellValue("C$i", $row['NumeroAndenes'])
            ->setCellValue("D$i", $row['AlturaBordillo'])
			->setCellValue("E$i", $row['Ancho'])
			->setCellValue("F$i", $row['costado'])
			->setCellValue("G$i", $row['estado'])            ->setCellValue("H$i", $row['nombre']);
$i++;
}

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setTitle('Reporte de Inventarios');

$objPHPExcel->setActiveSheetIndex(0);

getHeaders();

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;