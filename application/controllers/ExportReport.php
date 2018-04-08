<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExportReport extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tabungan_kelas_model');
    }

    public function excel()
    {
        require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $excel = new PHPExcel();

        $excel->getProperties()->setCreator();
        $excel->getProperties()->setTitle();

        $excel->setActiveSheetIndex(0);

        $excel->getActiveSheet()->setCellValue('A1','');

        $data = $this->Tabunga_kelas_model->tampil_data()->result();
        $row = 2;
        foreach ($data as $val){
            $excel->getActiveSheet()->setCellValue('A'.$row);

            $row++;
        }

        $filename = 'name'.date('d-m-Y H:i:s').'xlsx';

        $excel->getActiveSheet()->setTitle("Report");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $writer->save('php://output');
        exit;
    }

    public function test(){

    }
}
?>