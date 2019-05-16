<?php 
require_once 'functions/excelcalzada.php';

activeErrorReporting();
noCli();

require_once 'PHPEXCEL/Classes/PHPExcel.php';
require_once 'functions/conexion.php';
require_once 'functions/Calzada.php';

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
            ->setCellValue('A1', 'Número Calzada')
            ->setCellValue('B1', 'Ancho')
            ->setCellValue('C1', 'Número de Carriles ')
            ->setCellValue('D1', 'Estado')           ->setCellValue('E1', 'Sentido de Circulacion')
		    ->setCellValue('F1', 'Cobertura')
			->setCellValue('G1', 'Inventario N°')
			  ->setCellValue('H1', 'Zona de Parqueo');

$informe = Calzada();
$i = 2;
while($row = $informe->fetch_array(MYSQLI_ASSOC))
{
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A$i", $row['calzada'])
            ->setCellValue("B$i", $row['Ancho'])
            ->setCellValue("C$i", $row['Carriles'])
            ->setCellValue("D$i", $row['estado'])
			->setCellValue("E$i", $row['Sentido'])
			->setCellValue("F$i", $row['Cobertura'])
			->setCellValue("G$i", $row['Inventario'])            ->setCellValue("H$i", $row['parqueo']);
$i++;
}

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setTitle('Reporte de Calzadas');

$objPHPExcel->setActiveSheetIndex(0);

getHeaders();

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;