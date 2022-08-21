<?php namespace App\Controllers\undangan;

use CodeIgniter\Controller;
use App\Models\undangan\UndanganModel;

class Undangan extends Controller
{

	//mendefinisikan variable agar bisa digunakan
	//secara global
	protected $UndanganModel;
	protected $uri;

	public function __construct() {
		
		//mengisi variable global dengan data
		$this->UndanganModel = new UndanganModel(); 
		$this->session = session();
		$request = \Config\Services::request(); //memanggil class request
		$this->uri = $request->uri; //class request digunakan untuk request uri/url
    }

	public function index()
	{
		// return redirect()->to(DOMAIN_UTAMA); //redirect ke domain utama
		echo 'Tidak ada apapun disini!';

	}

	public function undangan()
	{
		clearstatcache();
		$web = $this->uri->getSegment(2); //memabaca domain user
		$cekDomain = $this->UndanganModel->cek_domain(urldecode($web));
		
    	//jika ditemukan lanjut ke proses selanjutnya
		if(!empty($cekDomain->getResult())){
			
			//jika data ditemukan maka kita akan ambil id_user nya
			foreach ($cekDomain->getResult() as $row)
			{
				$idnya = $row->id_user;
				$this->session->set('id_user',$idnya); //save di session untuk di load jika komentar
			}
			
			//id_user kemudian digunakan untuk mengambil semua data yang dibutuhkan
			$data['mempelai'] = $this->UndanganModel->get_mempelai($idnya);
			$data['acara'] = $this->UndanganModel->get_acara($idnya);
			$data['countdown'] = $this->UndanganModel->get_acara_countdown($idnya);
			$data['komen'] = $this->UndanganModel->get_komen($idnya);
			$data['data'] = $this->UndanganModel->get_data($idnya);
			$data['cerita'] = $this->UndanganModel->get_cerita($idnya);
			$data['album'] = $this->UndanganModel->get_album($idnya);
			$data['rules'] = $this->UndanganModel->get_rules($idnya);
			$data['rekening'] = $this->UndanganModel->get_rekening($idnya);
			$data['pembayaran'] = $this->UndanganModel->get_pembayaran($idnya);
			$data['setting'] = $this->UndanganModel->get_setting();
			$data['order'] = $this->UndanganModel->get_order($idnya)->getResult();
			$data['web'] = urldecode($web);
            
			//cek pada tabel order untuk mengambil tema yang digunakan user
			$ordernya = $this->UndanganModel->get_order($idnya);

			//ini untuk mendefinisikan tema undangan secara default 
			//apabila tema yang direquest user tidak ditemukan
			$temanya = 'modernrose';
			
			//jika tema ditemukan maka
			//variabel tema akan di 'repleace' sesuai tema pilihan user
			foreach ($ordernya->getResult() as $row){ 
				$temanya = $row->nama_theme;
				$tglDaftar = $row->tglDaftar;
				$masa_aktif = $row->masa_aktif;
			}
			if($this->uri->getTotalSegments() > 2){
			$invite = $this->uri->getSegment(3); //orang yang diundang disini
			$tamunya = $this->UndanganModel->get_tamu($invite);
			$cektamu = $this->UndanganModel->cek_tamu($idnya, $invite);
			if(!empty($cektamu->getResult())){
			  foreach ($tamunya->getResult() as $row){ 
				$nama_tamu= $row->nama_tamu;
				$alamat_tamu = $row->alamat_tamu;
				$qrcode = $row->qrcode;
			  }
			$data['invite'] = $nama_tamu;
			$data['invite_slug'] = preg_replace('/%20/', '+', $nama_tamu);
			$data['alamat_tamu'] = $alamat_tamu;
			$data['alamat_slug'] = preg_replace('/%20/', '+', $alamat_tamu);
			$data['qrcode'] = $qrcode;
			}else{
			$nama_tamu= 'Tamu Undangan';
			$alamat_tamu = 'Di Tempat';
			  $data['invite'] = $nama_tamu;
			$data['invite_slug'] = preg_replace('/%20/', '+', $nama_tamu);
			$data['alamat_tamu'] = $alamat_tamu;
			$data['alamat_slug'] = preg_replace('/%20/', '+', $alamat_tamu);
			$data['qrcode'] = 'Tidak Ada Qrcode';
			}
			}else{
			$nama_tamu= 'Tamu Undangan';
			$alamat_tamu = 'Di Tempat';
			$data['invite'] = $nama_tamu;
			$data['invite_slug'] = preg_replace('/%20/', '+', $nama_tamu);
			$data['alamat_tamu'] = $alamat_tamu;
			$data['alamat_slug'] = preg_replace('/%20/', '+', $alamat_tamu);
			$data['qrcode'] = 'Tidak Ada Qrcode';
			}
			
			//insert traffic to db
			if($nama_tamu != NULL){
				$dataTraffic['nama_pengunjung'] = urldecode($nama_tamu);
			}else{
				$dataTraffic['nama_pengunjung'] = "Unknown";
			}
			$dataTraffic['id_user'] = $idnya;
			$dataTraffic['addr'] = $this->get_client_ip();

			$this->UndanganModel->insert_traffic($dataTraffic);
            foreach ($this->UndanganModel->get_pembayaran($idnya) as $row)
			{
				$status = $row->status;
				$tglBayar = $row->created_at;
			}
			foreach ($this->UndanganModel->get_setting() as $row)
			{
				$trial = $row->trial;
			}
        $durasi = '+'.$trial.' days';
        $tglExp = strtotime($durasi, strtotime($tglDaftar));
        $tglExpFormated = date("d-m-Y H:i A",$tglExp);
        $today = strtotime('now');
        $aktif = '+'.$masa_aktif.' days';
        $tglNonaktif= strtotime($aktif, strtotime($tglBayar));
        $tglNonaktifFormated = date("d-m-Y H:i A",$tglNonaktif);
        if($status == 2 && $today >= $tglNonaktif){
        return view('undangan/expired', $data);
        }elseif($status != 2 && $today >= $tglExp){ 
        return view('undangan/expired', $data);
        }else{
        //kirim semua data pada view
        return view('undangan/themes/'.$temanya, $data);
        }
		}else{
			return $this->index();
		}
	}

	public function do_add_komentar(){
		$data['nama_komentar'] = ucwords($this->request->getPost('nama'));
		$data['isi_komentar'] = $this->request->getPost('komentar');
		$data['id_user'] = $_SESSION['id_user'];

		$update = $this->UndanganModel->add_komen($data);
		if($update){
			echo json_encode(array('status' => 'sukses','nama' => \esc($data['nama_komentar']),'komentar' => \esc($data['isi_komentar']) ));
		}else{
			echo json_encode(array('status' => 'gagal'));
		}

	}

	// Function to get the client IP address
	public function get_client_ip() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = '0';
		return $ipaddress;
	}

}
