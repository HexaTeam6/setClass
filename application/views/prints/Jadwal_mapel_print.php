<?php
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = FCPATH .'\assets\img\setClass-dark.png';
        $this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetY(15);
        $this->SetX(27);
        $this->SetTextColor(33,33,33);
        $this->SetFont('freesans', 'B', 23);
        // Title
        $this->Cell(0, 15, 'setClass', 0, false, 'L', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('hexa');
$pdf->SetTitle('Report-Jadwal Matapelajaran');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

// define some HTML content with style
$html = '

  <h1 style="background-color: #D4D4D4; text-align: center;"><b>JADWAL MATAPELAJARAN</b></h1>
          <table>
            <thead>
            <tr>
			  <th width="20%"><b>Guru</b></th>
              <th width="25%"><b>Matapelajaran</b></th>
              <th width="15%"><b>Ruang</b></th>
              <th width="10%"><b>Hari</b></th>
              <th width="50%"><b>Jam</b></th>
            </tr>
            </thead>
            <tbody> ';

                $hari = '';
                $jamSelesai = '';
                $jamMulai = '';
				foreach($data as $row){
                    switch ($row->hari){
                        case 1 : $hari = 'Senin';
                            break;
                        case 2 : $hari = 'Selasa';
                            break;
                        case 3 : $hari = 'Rabu';
                            break;
                        case 4 : $hari = 'Kamis';
                            break;
                        case 5 : $hari = "Jum'at";
                            break;
                        case 6 : $hari = 'Sabtu';
                            break;
                        default : $hari = 'Tidak terdefinisi';
                    }
                    $jamMulai = explode(':',$row->jam_mulai);
                    $jamSelesai = explode(':',$row->jam_selesai);
				    $html .='
                    <tr>
						<td width="20%" class="nama_guru">'.$row->nama_guru.'</td>
						<td width="25%" class="nama_matapelajaran">'.$row->nama_matapelajaran.'</td>
						<td width="15%" class="nama_ruang">'.$row->nama_ruang.'</td>
						<td width="10%" class="hari">'.$hari.'</td>
						<td width="50%" class="jam">'.$jamMulai[0].':'.$jamMulai[1].' - '.$jamSelesai[0].':'.$jamSelesai[1].'</td>
						</tr>';
				}

				$html .='
				<tr style="background-color: #D4D4D4">
					<td width="100%" class=""></td>
					</tr>
            </tbody>
          </table>';


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Report-Jadwal Matapelajaran.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+