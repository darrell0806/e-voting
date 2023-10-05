<?php
namespace App\Controllers;

use App\Models\K_model;
use App\Models\V_model;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Hasil extends BaseController
{
    public function index()
    {
        if(session()->get('id') > 0) {
            $model = new K_model();
            $model1 = new V_model();
            $level = session()->get('level');
            $data['k'] = $model->getData($level);
    
            echo view('header');
            echo view('menuutama');
    
            // Ubah pemfilteran berdasarkan status menjadi status2
            $status2_selesai = $model1->getStatus2Selesai();
            
            // Anda juga perlu memeriksa apakah status2_selesai adalah 'Tampil' untuk menentukan apakah hasil_vote harus ditampilkan
            if ($status2_selesai == 'Tampil' && ($level == 3 || $level == 4)) {
                echo view('diagram', $data);
            } else {
                if ($level == 1 || $level == 2) {
                    echo view('hasil_vote', $data);
                } else {
                    echo view('belum_selesai');
                }
            }
    
            echo view('footer');
        } else {
            return redirect()->to('/Home');
        }
    }
    
    
    


    public function pdf()
    {
        if (session()->get('level') == 1 || session()->get('level') == 2) {
            $model = new K_model();
            $level = session()->get('level');
            $k = $model->getData($level);

    
            $pdf = new TCPDF('p', 'mm', 'A4');
            $pdf->SetCreator('Sekolah Permata Harapan');
            $pdf->SetAuthor('Sekolah Permata Harapan');
            $pdf->SetTitle('Hasil Voting');
            $pdf->SetSubject('Hasil Voting');
            $pdf->SetMargins(20, 20, 20);
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->AddPage();
            $pdf->Image('images/logo_sph.PNG', 15, 8, 30);
            $pdf->SetFont('helvetica', 'B', 16);
            $pdf->Cell(0, 10, 'Sekolah Permata Harapan', 0, 1, 'C');
            $pdf->SetFont('helvetica', '', 12);
            $pdf->Cell(0, 8, 'Komp. Batu Batam Mas, Jl. Gajah Mada Blok D & E No.1,2,3,', 0, 1, 'C');
            $pdf->Cell(0, 8, 'Baloi Indah, Kec. Lubuk Baja, Kota Batam,', 0, 1, 'C');
            $pdf->Cell(0, 8, 'Kepulauan Riau 29444', 0, 1, 'C');
            $pdf->SetLineWidth(0.5);
            $pdf->Line(20, 55, 190, 55);
            $pdf->SetFont('helvetica', 'B', 14);
            $pdf->Cell(0, 10, 'Hasil Voting', 0, 1, 'C');
            $pdf->SetFont('helvetica', 'B', 10);
            $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(35, 7, 'Ketua OSIS', 1, 0, 'C');
            $pdf->Cell(35, 7, 'Wakil Ketua OSIS', 1, 0, 'C');
            $pdf->Cell(35, 7, 'Wakil Ketua OSIS 2', 1, 0, 'C'); // Tambah kolom untuk Wakil Ketua OSIS 2
            $pdf->Cell(35, 7, 'Visi & Misi', 1, 0, 'C');
            $pdf->Cell(20, 7, 'Total Vote', 1, 1, 'C');
            $pdf->SetFont('helvetica', '', 10);
            $no = 1;
            foreach ($k as $row) {
                $pdf->Cell(10, 7, $no, 1, 0, 'C');
                $pdf->Cell(35, 7, $row['ketua_username'], 1, 0);
                $pdf->Cell(35, 7, $row['wakil_username'], 1, 0);
                $pdf->Cell(35, 7, $row['wakil2_username'], 1, 0); // Tampilkan Wakil Ketua OSIS 2
                $pdf->Cell(35, 7, $row['visimisi'], 1, 0);
                $pdf->Cell(20, 7, $row['total_vote'], 1, 1, 'C');
                $no++;
            }
    
            $this->response->setContentType('application/pdf');
            $pdf->Output();
        } else {
            return redirect()->to('/Home');
        }
    }
    
        public function excel_print()
        {
            if(session()->get('level')==1 ||  session()->get('level')==2){
            $model = new K_model();
            $data = array();
            $data['title'] = 'Hasil Voting';
            $data['a'] = $model->getDataa($level);
            echo view('v_excel_print', $data);
        }else{
            return redirect()->to('/Home');
        }
        }
        public function diagram()
        {
  
            $model = new V_model();
            $status = $model->getStatusSelesai();
            
           
            if (session()->get('id') > 0) {
                $level = session()->get('level');
                if ($status == 'Tidak-Aktif' && ($level == 3 || $level == 4)) {
                    echo view('header');
                    echo view('menuutama');
                    echo view('diagram');
                    echo view('footer');
                } else if ($level == 1 || $level == 2) {
                    echo view('header');
                    echo view('menuutama');
                    echo view('diagram');
                    echo view('footer');
                } else {
                    echo view('header');
                    echo view('menuutama');
                    echo view('belum_selesai');
                    echo view('footer');
                }
            } else {
                return redirect()->to('/Home');
            }
        }
        
        

    
}