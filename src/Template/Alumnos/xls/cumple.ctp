<?php 
require_once(APP . 'vendor' . DS . 'phpoffice'.DS . 'phpexcel'. DS. 'PHPExcel.php');
$objPHPExcel = new \PHPExcel();
    	ini_set('memory_limit', '-1');
    	$objPHPExcel->
    	getProperties()
    	->setCreator($this->current_user['nombre']. " ".$this->current_user['apellido'])
    	->setTitle("Cumpleanos $month");
    	$styleCells = array(
    			'borders' => array(
    					'allborders' => array(
    							'style' => \PHPExcel_Style_Border::BORDER_THIN
    					)
    			)
    	);
    	$objPHPExcel->setActiveSheetIndex(0)
    	->setCellValue('A1', 'Nombre y Apellido')
    	->setCellValue('B1', 'Día')
    	->setCellValue('C1', 'Correo')
    	->setCellValue('D1', 'Correo madre')
    	->setCellValue('E1', 'Correo padre');
    	$_row = 1;
    	foreach ($alumnos as $alumno)
    	{
    		$_row = $_row +1;
    		$objPHPExcel->setActiveSheetIndex(0)
    		->setCellValue('A'.$_row,h($alumno->presentacion))
    		->setCellValue('B'.$_row,h($alumno->fecha_nacimiento->format('j')))
    		->setCellValue('C'.$_row,h($alumno->email))
    		->setCellValue('D'.$_row,h($alumno->email_madre))
    		->setCellValue('E'.$_row,h($alumno->email_padre))
    		;
    		// Le aplico a todas las celdas el formato de borde.
    		$objPHPExcel->getActiveSheet()->getStyle('A'.$_row)->applyFromArray($styleCells);
    		$objPHPExcel->getActiveSheet()->getStyle('B'.$_row)->applyFromArray($styleCells);
    		$objPHPExcel->getActiveSheet()->getStyle('C'.$_row)->applyFromArray($styleCells);
    		$objPHPExcel->getActiveSheet()->getStyle('D'.$_row)->applyFromArray($styleCells);
    		$objPHPExcel->getActiveSheet()->getStyle('E'.$_row)->applyFromArray($styleCells);
    	}
    	// Ajusto el ancho de las columnas
    	foreach (range('A', $objPHPExcel->getActiveSheet()->getHighestDataColumn()) as $col) {
    		$objPHPExcel->getActiveSheet()
    		->getColumnDimension($col)
    		->setAutoSize(true);
    	}
    	//
    	// Seteo el formato por default de los bordes para las celdas del encabezado y las pongo en negrita
    	$styleHeader = array(
    			'borders' => array(
    					'allborders' => array(
    							'style' => \PHPExcel_Style_Border::BORDER_THIN
    					)
    			),
    			'font' => array(
    					'bold' => true
    			)
    	);
    	$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleHeader);
    	$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleHeader);
    	$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($styleHeader);
    	$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($styleHeader);
    	$objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($styleHeader);
    	// Seteo el nombre del archivo
    	$_file_name_aux = "Cumple mes de $month";
    	$objWriter=\PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
    	
?>