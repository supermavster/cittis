<?php 
require_once 'functions/excel.php';

activeErrorReporting();
noCli();

require_once 'PHPEXCEL/Classes/PHPExcel.php';
require_once 'functions/conexion.php';
require_once 'functions/getAllListsAndVideos.php';

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
            ->setCellValue('A1', 'Número Inventario')
            ->setCellValue('B1', 'Fecha Inicio')
            ->setCellValue('C1', 'Fecha Fin ')
            ->setCellValue('D1', 'Via Principal')           ->setCellValue('E1', 'Tramo Inicial')
		    ->setCellValue('F1', 'Tramo Final')
			->setCellValue('G1', 'Longitud del tramo')
			  ->setCellValue('H1', 'Tipo Via')
			  ->setCellValue('I1', 'Proyecto')
			   ->setCellValue('J1', 'Inclinacion')
			    ->setCellValue('K1', 'Persona')
					    ->setCellValue('L1', 'Puente')
							    ->setCellValue('M1', 'Muro')
									    ->setCellValue('N1', 'Tunel')
								    ->setCellValue('O1', 'Pesaje')
										    ->setCellValue('P1', 'Cuneta')
												    ->setCellValue('Q1', 'Peaje')
														    ->setCellValue('R1', 'Alcantarilla')
																    ->setCellValue('S1', 'Ponton')
																		    ->setCellValue('T1', 'SistemaContencion');			

$informe = getAllListsAndVideos();
$i = 2;
while($row = $informe->fetch_array(MYSQLI_ASSOC))
{
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A$i", $row['inventario'])
            ->setCellValue("B$i", $row['Inicio'])
            ->setCellValue("C$i", $row['Fin'])
            ->setCellValue("D$i", $row['ViaInicio'])
			->setCellValue("E$i", $row['Inicial'])
			->setCellValue("F$i", $row['Final'])
			->setCellValue("G$i", $row['Total'])            ->setCellValue("H$i", $row['nombre'])
	->setCellValue("I$i", $row['proyecto'])
			->setCellValue("J$i", $row['inclinacion'])
			->setCellValue("K$i", $row['nombreper']);
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