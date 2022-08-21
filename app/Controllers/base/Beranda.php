<?php namespace App\Controllers\base;

use CodeIgniter\Controller;
use App\Models\base\BerandaModel; //load BerandaModel
use App\Models\base\VideoModel; //load VideoModel
use App\Models\base\TemaModel; //load TemaModel
use App\Models\base\VideoCategoriesModel; 
use App\Models\base\TemaCategoriesModel; 
use App\Libraries\autoload;
use Midtrans\Midtrans;
class Beranda extends Controller
{

	//mendefinisikan variable agar bisa digunakan
	//secara global
	protected $BerandaModel;

	public function __construct() {
        
		$request = \Config\Services::request();

		//mengisi variable global dengan data
		$this->BerandaModel = new BerandaModel();  //load BerandaModel
		$this->VideoModel = new VideoModel();
		$this->TemaModel = new TemaModel();
		$this->VideoCategoriesModel = new VideoCategoriesModel();
		$this->TemaCategoriesModel = new TemaCategoriesModel();
		$request = \Config\Services::request(); //memanggil class request
		$this->uri = $request->uri; //class request digunakan untuk request uri/url
    }

	public function index()
	{
	    //mengambil semua data themes dari BerandaModel
		$data['tema'] = $this->BerandaModel->get_all_themes();
		$data['tema_video'] = $this->BerandaModel->get_all_themes_video();
		$data['setting'] = $this->BerandaModel->get_setting();
        $data['testimoni'] = $this->BerandaModel->get_testimoni();
        $data['total_testi'] = $this->BerandaModel->get_total_testimoni();
        $data['total_users'] = $this->BerandaModel->get_total_pengguna();
        $data['total_tema'] = $this->BerandaModel->get_total_tema();
        $data['paket'] = $this->BerandaModel->get_paket();
        $data['title'] = 'Beranda';
		//load view home
		$data['view'] = 'base/beranda/home';
		return view('base/beranda/layout', $data);
	}

	 public function themes()
	{
		$model = $this->TemaModel
	            ->select('themes.*, tema_categories.name as categoryName, tema_categories.slug as categorySlug')
	            ->join('tema_categories', 'themes.category_id = tema_categories.id', 'left')
	            ->orderBy('themes.nama_theme', 'ASC')
	            ->where('themes.status', 1);
	    if( $categorySlug = $this->request->getGet('category')){
	        $model = $model->where('tema_categories.slug', $categorySlug);
	        $link = $categorySlug;
	    }else{
	        $link = 'all';
	    }
	    $data = [
            'tema' => $model->asObject()->paginate(12, 'tema'),
            'pager' => $model->pager
        ];
        $data['link'] = $link;
	    $data['categories'] = $this->TemaCategoriesModel->findAll();
        $data['setting'] = $this->BerandaModel->get_setting();
        $data['title'] = 'Undangan Website';
		//kirim data ke view
		$data['view'] = 'base/beranda/tema';
		return view('base/beranda/layout', $data);

	}
	public function themes_video()
	{   
	    $model = $this->VideoModel
	            ->select('themes_video.*, video_categories.name as categoryName, video_categories.slug as categorySlug')
	            ->join('video_categories', 'themes_video.category_id = video_categories.id', 'left')
	            ->orderBy('themes_video.nama_tema', 'ASC');
	    if( $categorySlug = $this->request->getGet('category')){
	        $model = $model->where('video_categories.slug', $categorySlug);
	    $link = $categorySlug;
	    }else{
	        $link = 'all';
	    }
	    
		$data = [
            'tema_video' => $model->asObject()->paginate(12, 'tema'),
            'pager' => $model->pager
        ];
        $data['link'] = $link;
        $data['categories'] = $this->VideoCategoriesModel->findAll();
		$data['setting'] = $this->BerandaModel->get_setting();
		$data['title'] = 'Undangan Video';
		//kirim data ke view
		$data['view'] = 'base/beranda/tema_video';
		return view('base/beranda/layout', $data);

	}

	public function demo(){
		$idnya = '1'; //id user khusus demo
		$temanya = $this->uri->getSegment(3); //get tema
		$cek = $this->BerandaModel->get_themes_by_name(urldecode($temanya));
		if(count($cek) > 0){

 			//get all data
			$data['web'] = urldecode('demo');
			
			$data['mempelai'] = $this->BerandaModel->get_mempelai($idnya);
			$data['acara'] = $this->BerandaModel->get_acara($idnya);
			$data['countdown'] = $this->BerandaModel->get_acara_countdown($idnya);
			$data['komen'] = $this->BerandaModel->get_komen($idnya);
			$data['data'] = $this->BerandaModel->get_data($idnya);
			$data['cerita'] = $this->BerandaModel->get_cerita($idnya);
			$data['album'] = $this->BerandaModel->get_album($idnya);
			$data['rules'] = $this->BerandaModel->get_rules($idnya);
			$data['rekening'] = $this->BerandaModel->get_rekening($idnya);
			$data['pembayaran'] = $this->BerandaModel->get_pembayaran($idnya);
			$data['setting'] = $this->BerandaModel->get_setting($idnya);
			$data['order'] = $this->BerandaModel->get_paket_by_id($idnya);
			if($this->uri->getTotalSegments() > 3){
			$invite = $this->uri->getSegment(4); //orang yang diundang disini
			$tamunya = $this->BerandaModel->get_tamu($invite);
			$cektamu = $this->BerandaModel->cek_tamu($idnya, $invite);
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
			return view('undangan/themes/'.$temanya, $data);

		}else{
			echo "Tidak ada apapun disini!";
		}

	}

	public function youtube()
	{
		return view('base/youtube');
	}

	public function maps()
	{
		return view('base/maps');
	}
	public function import_tamu()
	{
		return view('base/import_tamu');
	}
	public function error404()
	{
	    $data['setting'] = $this->BerandaModel->get_setting();
	    $data['title'] = 'Page Not Found';
	    $data['view'] = 'base/beranda/error404';
		return view('base/beranda/layout', $data);
	}

	public function kirim_undangan(){
        foreach ($this->BerandaModel->get_setting() as $row){
			$wa_gateway = $row->wa_gateway;
			$token_wa = $row->token_wa;
		}
        foreach ($this->BerandaModel->get_all_undangan() as $row) {
        $domain = $row->domain_undangan;
        $order = $this->BerandaModel->get_paket_by_domain($domain);
		$masa_aktif = $order[0]->masa_aktif;
		$tglBayar = $row->tgl_bayar;
        $today = strtotime('now');
        $aktif = '+'.$masa_aktif.' days';
        $tglNonaktif= strtotime($aktif, strtotime($tglBayar));
        if($row->status == 2 && $today <= $tglNonaktif) {
	 	$id_tamu = $row->id_tamu;
                $nama_tamu = $row->nama_tamu;
                $nama_slug = $row->nama_slug;
                $alamat_tamu = $row->alamat_tamu;
                $alamat_slug = $row->alamat_slug;
                $link = SITE_UNDANGAN.'/'.$domain.'/'.$id_tamu;
                $ayah_pria = $row->nama_ayah_pria;
                $ibu_pria = $row->nama_ibu_pria;
                $ayah_wanita = $row->nama_ayah_wanita;
                $ibu_wanita = $row->nama_ibu_wanita;
                $phone = $row->no_wa;
                $pria = $row->nama_panggilan_pria;
                $wanita = $row->nama_panggilan_wanita;
                 $token_user = $row->token_wa;
                if(empty($token_user)){
                    $token = $token_wa;
                }else{
                    $token = $token_user;
                }
                
            $salam_wa_atas = $row->salam_wa_atas;
            $salam_wa_bawah = $row->salam_wa_bawah;
            $paket = $this->BerandaModel->get_paket_by_domain($domain);
            if($paket[0]->kirim_whatsapp == '1'){
                if($wa_gateway == 'nusagateway' && $this->cek_wa($token, $phone) == false){
                    $data['status_kirim'] = 'tidak terdaftar';
                    $update = $this->BerandaModel->status_undangan($data, $id_tamu);
                
            }else{
                $message = 'Kepada Yth: '.$nama_tamu.'

'.$salam_wa_atas.'

Silahkan lihat undangan lengkap dan detail acara di link undangan berikut:
'.$link.'

'.$salam_wa_bawah.'

Kami yang berbahagia,
*'.$pria.' & '.$wanita.'*

======================
Balas *OK* agar bisa diklik Link Undangan';
            if ($this->send_wa($token, $phone, $message) == 'true') {
                $data['status_kirim'] = 'terkirim';
                $update = $this->BerandaModel->status_undangan($data, $id_tamu);
                }else{ 
                $data['status_kirim'] = 'tidak terkirim';
                $update = $this->BerandaModel->status_undangan($data, $id_tamu);
                }
            }
        }
    }
        }
 }
    public function notification()
    {
        foreach ($this->BerandaModel->get_setting_bayar() as $row){
            $url = $row->url_midtrans;
            $server = $row->serverkey_midtrans;
            $client = $row->clientkey_midtrans;
            $production = $row->midtrans_production;
        }
        \Midtrans\Config::$serverKey = $server;
        if($production == 'true'){
            \Midtrans\Config::$isProduction = true;
            }else{
                \Midtrans\Config::$isProduction = false;    
            }
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        $notif = new \Midtrans\Notification();
        $notif = $notif->getResponse();
        $transaction = $notif->transaction_status;
        $order_id = $notif->order_id;
        $token = $this->BerandaModel->get_token();
        foreach( $this->BerandaModel->get_pembayaran_by_invoice($order_id) as $order){
            $phone = $order->hp;
            $domain = $order->domain;
        }
        $paket = $this->BerandaModel->get_paket_by_domain($domain);
        if($paket[0]->buku_tamu == 1){
            $link_bukutamu = SITE_BUKUTAMU.'/'.$domain;
        }else {
            $link_bukutamu = '-';
        }
        if($notif->status_code == '200'){
            $status = '2';
            $message = 'Halo Kak, Terima Kasih Sudah Memesan Undangan Digital '.DOMAIN_UTAMA.'
            
Pembayaran Anda #'.$order_id.' Telah Berhasil.

*Berikut rincian informasi pesananan Anda :*

*Login Dashboard :* '.SITE_UTAMA.'/'.$domain.'
*Halaman Undangan :* '.SITE_UNDANGAN.'/'.$domain.'
*Halaman Bukutamu :* '.$link_bukutamu.'

*Terima Kasih Dan Sukses Selalu*';
        }else{
            $status ='0';
             $message = 'Halo Kak, Terima Kasih Sudah Memesan Undangan Digital '.DOMAIN_UTAMA.'
            
Pembayaran Anda #'.$order_id.' Gagal, Silahkan Ulangi Kembali.

*Terima Kasih Dan Sukses Selalu*';
        }
        $data = [
                'created_at' => date('Y-m-d H:i:s'),
                'status' => $status,
                'transaction_status' => $transaction
                ];
        $save = $this->BerandaModel->update_pembayaran($data,$order_id);
        $this->send_wa($token, $phone, $message);
    
    }
    private function cek_wa($token, $hp){
	    $url = 'http://nusagateway.com/api/check-number.php';
        $curl = curl_init($url);
        $gateway = ['token' => $token,'phone' => $hp];
         curl_setopt($curl, CURLOPT_POSTFIELDS, $gateway);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $content = json_decode($response);
        $status = $content->status;
        if($status == 'valid'){
			return true;
		}else{
			return false;
		
        }
	}
	
	private function send_wa($token, $phone, $message){
	    foreach ($this->BerandaModel->get_setting() as $row){
            $wa_gateway = $row->wa_gateway;
        }
		if($wa_gateway == 'nusagateway'){
			$url = 'http://nusagateway.com/api/send-message.php';
			$curl = curl_init($url);
			$gateway = ['token' => $token,'phone' => $phone,'message' => $message];
			curl_setopt($curl, CURLOPT_POSTFIELDS, $gateway);
			// curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($curl);
			curl_close($curl);
			$content = json_decode($response);
			$status = $content->result;
		}else if($wa_gateway == 'starsender'){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://starsender.online/api/sendText?message='.rawurlencode($message).'&tujuan='.rawurlencode($phone.'@s.whatsapp.net'),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_HTTPHEADER => array(
				'apikey: '.$token
			),
			));

			$response = curl_exec($curl);
			curl_close($curl);
			$content = json_decode($response);
			$status = $content->status;
		}else if($wa_gateway == 'onesender'){
            $postData = [
                'phone' => $phone,
                'message' => $message
            ];
            
            $header = [
                'Authorization: Bearer '.$token,
            ]; 
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://onesender.my.id/api/message');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_VERBOSE,true);
            $response = curl_exec($ch);
            $content = json_decode($response);
			$code = $content->code;
            if($code == '200'){
                $status = 'true';
            }else{
                $status = 'false';
            }
        }
        if($status == 'true'){
			return true;
		}else{
			return false;
		
        }
	}
	
	public function callback_tripay(){
	    $json = file_get_contents('php://input');
        $callbackSignature = isset($_SERVER['HTTP_X_CALLBACK_SIGNATURE'])
            ? $_SERVER['HTTP_X_CALLBACK_SIGNATURE']
            : '';
        foreach ($this->BerandaModel->get_setting_bayar() as $row){
            $apiKey       = $row->apikey_tripay;
            $privateKey   = $row->privatekey_tripay;
            $merchantCode = $row->merchantcode_tripay;
        }
        $signature = hash_hmac('sha256', $json, $privateKey);
        $data = json_decode($json);
        
        $order_id = $data->merchant_ref;
        $token = $this->BerandaModel->get_token();
        foreach( $this->BerandaModel->get_pembayaran_by_invoice($order_id) as $order){
            $phone = $order->hp;
            $domain = $order->domain;
        }
        $paket = $this->BerandaModel->get_paket_by_domain($domain);
        if($paket[0]->buku_tamu == 1){
            $link_bukutamu = SITE_BUKUTAMU.'/'.$domain;
        }else {
            $link_bukutamu = '-';
        }
        if($data->status == 'PAID'){
            $status = '2';
            $message = 'Halo Kak, Terima Kasih Sudah Memesan Undangan Digital '.DOMAIN_UTAMA.'
            
Pembayaran Anda #'.$order_id.' Telah Berhasil.

*Berikut rincian informasi pesananan Anda :*

*Login Dashboard :* '.SITE_UTAMA.'/'.$domain.'
*Halaman Undangan :* '.SITE_UNDANGAN.'/'.$domain.'
*Halaman Bukutamu :* '.$link_bukutamu.'

*Terima Kasih Dan Sukses Selalu*';
        }else {
            $status ='0';
             $message = 'Halo Kak, Terima Kasih Sudah Memesan Undangan Digital '.DOMAIN_UTAMA.'
            
Pembayaran Anda #'.$order_id.' Gagal, Silahkan Ulangi Kembali.

*Terima Kasih Dan Sukses Selalu*';
        }
        $data_update = [
                'created_at' => date('Y-m-d H:i:s'),
                'status' => $status,
                'transaction_status' => $data->status
                ];
        $save = $this->BerandaModel->update_pembayaran($data_update,$order_id);
        $this->send_wa($token, $phone, $message);
    }
    
    public function kirim_pemberitahuan(){
        foreach ($this->BerandaModel->get_setting() as $row)
			{
				$trial = $row->trial;
				$token_wa = $row->token_wa;
			}
		foreach($this->BerandaModel->get_belum_lunas() as $data){
		$hp = $data->hp;
		$tglDaftar = $data->tglDaftar;
        $today = strtotime(date("Y-m-d H:i:s"));
        $durasi = '+'.$trial.' days';
        $tglExp = strtotime($durasi, strtotime($tglDaftar));
        $tglExpFormated = date("d-m-Y H:i",$tglExp);
        
        if($data->status != 2 && $today < $tglExp) {
            $message = 'Halo Kak, Terima Kasih Sudah Memesan Undangan Digital '.DOMAIN_UTAMA.'
            
Pesanan Anda #'.$data->invoice.' akan segera berakhir masa trialnya sampai *'.$tglExpFormated.'*.

_Segera lakukan pembayaran untuk menikmati fitur yang tersedia_

*Terima Kasih Dan Sukses Selalu*';
        $this->send_wa($token_wa, $hp, $message);
            }
        }
    }
	
}
