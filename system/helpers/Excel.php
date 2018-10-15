<?php

    final class Excel {

        public static function criar($titulo, $lista, $tamanho = array()){
            include('excel/PHPExcel.php');

            $excel = new PHPExcel();
            //$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

            if($lista):
                $linha = 1;
                $coluna = 0;
                foreach($lista as $dado):
                    foreach($dado as $ind => $valor):
                        $excel->setActiveSheetIndex(0)->setCellValueByColumnAndRow($coluna, $linha, $valor);
                        $coluna++;
                    endforeach;
                    $coluna = 0;
                    $linha++;
                endforeach;

                if($tamanho) foreach($tamanho as $ind => $valor) $excel->getActiveSheet()->getColumnDimension($ind)->setWidth($valor);
            endif;

            $excel->getActiveSheet()->setTitle($titulo);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'.$titulo.'.xls"');
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');

            $saida = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            $saida->save('php://output');
            exit();
        }

    }
