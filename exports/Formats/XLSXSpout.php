<?php 

set_time_limit(600);

require_once '../vendor/box/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Common\Type;
use Box\Spout\Writer\Style\Border;
use Box\Spout\Writer\Style\BorderBuilder;
use Box\Spout\Writer\Style\Color;
use Box\Spout\Writer\Style\StyleBuilder;
use Box\Spout\Writer\WriterFactory;

class XLSXSpout{

	public function createXLS( $filename , $data )
	{

		$writer = WriterFactory::create(Type::XLSX);

		$border = (new BorderBuilder())
			->setBorderTop(Color::BLACK, Border::WIDTH_THIN, $style = Border::STYLE_SOLID)
		    ->setBorderBottom(Color::BLACK, Border::WIDTH_THIN, $style = Border::STYLE_SOLID)
		    ->setBorderRight(Color::BLACK, Border::WIDTH_THIN, $style = Border::STYLE_SOLID)
		    ->setBorderLeft(Color::BLACK, Border::WIDTH_THIN, $style = Border::STYLE_SOLID)
		    ->build();

		$styleTitle = (new StyleBuilder())
				   ->setBorder($border)
		           ->setFontBold()
		           ->setFontSize(11)
		           ->build();

		$styleRow = (new StyleBuilder())
				   ->setBorder($border)
		           ->setFontSize(9)

		           ->build();

		$styleHeader = (new StyleBuilder())
				   ->setBorder($border)
		           ->setFontSize(9)
		           ->setFontBold()
		           ->setBackgroundColor(Color::LIGHT_GREEN)
		           ->build();

		$writer->openToBrowser($filename . ".xlsx");

		$hojas = $data;

		foreach ($hojas as $key => $hoja) 
		{	

			if ( $key === 0 )
			{
				
				$sheet = $writer->getCurrentSheet();

			} 	
			else
			{

				$sheet = $writer->addNewSheetAndMakeItCurrent();
			
			}	

			$sheet->setName( $hoja['nombre'] );
			
			$titleRow = [ $hoja['titulo'] ];

			$writer->addRowWithStyle($titleRow,$styleTitle);

			$headerRow = $hoja['cabecera'];

			$writer->addRowWithStyle($headerRow,$styleHeader);

			foreach ($hoja['data'] as $r) 
			{

				$writer->addRowWithStyle( $r , $styleRow );

			}

		}

		$writer->close();

	}

}