<?php namespace App\Controllers\bukutamu;

use CodeIgniter\Controller;
use App\Models\bukutamu\BukutamuModel;

class Bukutamu extends Controller
{

	//mendefinisikan variable agar bisa digunakan
	//secara global
	protected $BukutamuModel;
	protected $uri;

	public function __construct() {
		
		//mengisi variable global dengan data
		$this->BukutamuModel = new BukutamuModel(); 
        $this->session = session();
		$request = \Config\Services::request(); //memanggil class request
		$this->uri = $request->uri; //class request digunakan untuk request uri/url
    }

	public function index()
	{
		// return redirect()->to(DOMAIN_UTAMA); //redirect ke domain utama
		echo "Tidak ada apapun disini";

	}

	public function bukutamu()
	{
		
		$web = $this->uri->getSegment(2); //memabaca domain user
// 		$invite = $this->uri->getSegment(3); //orang yang diundang disini
		$data['web'] = urldecode($web);
	    foreach ($this->BukutamuModel->get_setting() as $row)
			{
				$trial = $row->trial;
		}
        $order = $this->BukutamuModel->get_paket_by_domain(urldecode($web));
		$tglDaftar = $order[0]->tglDaftar;
		$durasi = '+'.$trial.' days';
        $tglExp = strtotime($durasi, strtotime($tglDaftar));
        $tglExpFormated = date("d-m-Y H:i A",$tglExp);
		$masa_aktif = $order[0]->masa_aktif;
		$tglBayar = $order[0]->tglBayar;
        $today = strtotime('now');
        $aktif = '+'.$masa_aktif.' days';
        $tglNonaktif= strtotime($aktif, strtotime($tglBayar));
        $tglNonaktifFormated = date("d-m-Y H:i A",$tglNonaktif);
// 		//melakukan pengeceakan ke database
 		$cekDomain = $this->BukutamuModel->cek_domain(urldecode($web));
        
// 		//jika ditemukan lanjut ke proses selanjutnya
 		if((!empty($cekDomain->getResult())  && $order[0]->buku_tamu == 1) ){
            if(($order[0]->status_bayar != 2 && $today >= $tglExp) || ($order[0]->status_bayar == 2 && $today >= $tglNonaktif)){
                return $this->index();
            }else{
// 			//jika data ditemukan maka kita akan ambil id_user nya
 			foreach ($cekDomain->getResult() as $row)
 			{
 				$idnya = $row->id_user;
 				$this->session->set('id_user',$idnya); //save di session untuk di load jika komentar
 			}
			
// 			//id_user kemudian digunakan untuk mengambil semua data yang dibutuhkan
            $data['countdown'] = $this->BukutamuModel->get_acara_countdown($idnya);
 			$data['mempelai'] = $this->BukutamuModel->get_mempelai($idnya);
 			$data['acara'] = $this->BukutamuModel->get_acara($idnya);
// 			$data['komen'] = $this->UndanganModel->get_komen($idnya);
 			$data['data'] = $this->BukutamuModel->get_data($idnya);
// 			$data['cerita'] = $this->UndanganModel->get_cerita($idnya);
 			$data['slider'] = $this->BukutamuModel->get_slider($idnya);
 			$data['rules'] = $this->BukutamuModel->get_rules($idnya);
 			$data['pembayaran'] = $this->BukutamuModel->get_pembayaran($idnya);
 			$data['setting'] = $this->BukutamuModel->get_setting();
 			$data['hadir'] = $this->BukutamuModel->get_hadir_by_id_user();

// 			//cek pada tabel order untuk mengambil tema yang digunakan user
 			$ordernya = $this->BukutamuModel->get_order($idnya);
		//kirim semua data pada view
 			return view('bukutamu/home',$data);
            }
 		}else{
 			return $this->index();
		}
 		
	}

    public function autofill()
    {
    $qrcode =$_GET['qrcode'];
    //$qrcode = $this->request->getPost('qrcode');
    $hasil = $this->BukutamuModel->autofill($qrcode);
    if(count($hasil) > 0){
    foreach ($hasil as $row)
        $data[]= array('nama_tamu' => $row->nama_tamu, 'alamat_tamu' => $row->alamat_tamu);
        echo json_encode($data);
        
    } else{
        $data[]= array('nama_tamu' => '-', 'alamat_tamu' => '-');
        echo json_encode($data);
    }
}

    public function do_add_hadir(){
        $idnya = $_SESSION['id_user'];
        $datanya = $this->BukutamuModel->get_data($idnya);
        $qrcode = $this->request->getPost('qrcode');
        $nama = $this->request->getPost('nama');
        foreach ($datanya->getResult() as $row){ 
	$kunci = $row->kunci;
	}
	$image = $_POST['image'];
    $image = str_replace('data:image/png;base64,','', $image);
	$image = base64_decode($image);
	$filename = $qrcode.'.png';
	$path = 'assets/users/'.$kunci;
        
        $cek = $this->BukutamuModel->cek_hadir($qrcode);
        if($nama != '-'){
	    if(empty(($cek))){
	    $update = $this->BukutamuModel->update_hadir($qrcode);
        if($update){
            file_put_contents(FCPATH.'/'.$path.'/'.$filename,$image);
            $session = session();
            $session->setFlashdata("success", "Data tamu Berhasil ditambahkan");
            echo 'sukses';
        }else{
         $session = session();
        $session->setFlashdata("error", "Data tamu Gagal diupdate");
            echo 'gagal';
        }
                
            }else{
        echo 'gagal';
                exit;
    }
    }else{
        echo 'gagal';
                exit;
    }
    }
}
