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
$pdf->SetTitle('Report-Absensi Kelas');

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

  <h1 style="background-color: #D4D4D4; text-align: center;"><b>ABSENSI KELAS</b></h1>
          <table>
            <thead>
            <tr>
			  <th width="15%"><b>Tanggal</b></th>
              <th width="30%"><b>Kode Absensi</b></th>
              <th width="50%"><b>Keterangan</b></th>
            </tr>
            </thead>
            <tbody> ';

                $masuk = 0;
                $sakit = 0;
                $izin = 0;
                $tidakMasuk = 0;
				foreach($data as $row){
				    $masuk += $row->masuk;
				    $sakit += $row->sakit;
				    $izin += $row->izin;
				    $tidakMasuk += $row->tidakMasuk;
				    $html .='
                    <tr>
						<td width="15%" class="tanggal">'.$row->tanggal.'</td>
						<td width="30%" class="kode_absensi">'.$row->kode_absensi.'</td>
                        <td width="50%" class="keterangan">'.'Masuk ('.$row->masuk.') '.'Sakit ('.$row->sakit.') '.'Izin ('.$row->izin.') '.'Tidak Masuk ('.$row->tidakMasuk.') '.'</td>
                    </tr>';
				}

				$html .='
				<tr style="background-color: #D4D4D4">
					<td width="15%" class=""></td>
					<td width="30%" class="total" align=right><b>REKAP</b></td>
					<td width="55%" align=right>'.'Masuk ('.$masuk.') '.'Sakit ('.$sakit.') '.'Izin ('.$izin.') '.'Tidak Masuk ('.$tidakMasuk.') '.'</td>
				</tr>
            </tbody>
          </table>';


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Report-Absensi Kelas.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+