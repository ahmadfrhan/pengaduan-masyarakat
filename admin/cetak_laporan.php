<?php
    include "../fpdf184/fpdf.php";
    class Pdf extends FPDF
    {
        function judul($teks1, $teks2, $teks3, $teks4)
        {

            $this->Cell(2);
            $this->SetFont('Times', 'B', '12');
            $this->Cell(0, 8, $teks1, 0, 1, 'C');
            $this->Cell(2);
            $this->SetFont('Times', 'B', '12');
            $this->Cell(0, 5, $teks2, 0, 1, 'C');
            $this->Cell(2);
            $this->SetFont('Times', 'I', '8');
            $this->Cell(0, 5, $teks3, 0, 1, 'C');
            $this->Cell(2);
            $this->Cell(0, 2, $teks4, 0, 1, 'C');

        }

        function garis()
        {
            $this->SetLineWidth(1);
            $this->Line(10, 36, 200, 36);
            $this->SetLineWidth(0);
            $this->Line(10, 37, 200, 37);
        }

    }

    //instantisasi objek
    $pdf = new Pdf();
    //Mulai dokumen
    $pdf->AddPage('L', 'A5');
    //meletakkan judul disamping logo diatas
    $pdf->judul('PENGADUAN MASYARAKAT','LAPORAN DATA PENGADUAN', 'Kantor LOORAH Telp. 081223513115', 'Website: http://kantorloorah.com | E-Mail: kantor.loorah@gmail.com');
    //membuat garis ganda tebal dan tipis
    $pdf->garis();
    $pdf->Cell(190,7,'',0,1, 'L');
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetFillColor(119,136,153);
    $pdf->SetTextColor(255,255,255);

    //memberikan space ke bawah agar tidakterlalu padat
    $pdf->Cell(5,5,'',0,1);

    $pdf->SetFont('Times', 'B', 10);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(10,7, 'ID',1,0, 'C',1);
    $pdf->Cell(35,7, 'TANGGAL',1,0, 'C',1);
    $pdf->Cell(27,7, 'NIK',1,0, 'C',1);
    $pdf->Cell(100,7, 'LAPORAN',1,0, 'C',1);
    $pdf->Cell(20,7, 'STATUS',1,1, 'C',1);
    

    $pdf->SetFont('Times', '', 10);
    
    include '../koneksi.php';
    $laporan = mysqli_query($conn,"SELECT * FROM pengaduan_farhan");
                        
    $no=1;
    while ($row = mysqli_fetch_array($laporan)){
        $pdf->Cell(10,7,$row['id_pengaduan_farhan'],1,0, 'C',1);
        $pdf->Cell(35,7,$row['tgl_pengaduan_farhan'],1,0, 'C',1);
        $pdf->Cell(27,7,$row['nik_farhan'],1,0, 'C',1);
        $pdf->Cell(100,7,$row['isi_laporan_farhan'],1,0, 'C',1);
        $pdf->Cell(20,7,$row['status_farhan'],1,1, 'C',1);
    }
    
    $pdf->Output('laporan_tanggapan.pdf', 'I');

?>