<?php namespace App\Controllers\base;
use PHPExcel;
use PHPExcel_IOFactory;
use CodeIgniter\Controller;
use App\Models\base\DashboardModel;
use Midtrans\Midtrans;
use Xendit\Xendit;
class Dashboard extends Controller
{
    public function __construct() {
        //mengisi variable global dengan data
        $this->session = session();
        helper('form');
        helper('filesystem');
        $this->DashboardModel = new DashboardModel(); 
		$this->request = \Config\Services::request(); //memanggil class request
        $this->uri = $this->request->uri; //class request digunakan untuk request uri/url
        $this->validate = \Config\Services::validation();
    }

    public function index()
    {
        if(session()->has('masukUser'))
        {
            $data['title'] = 'Dashboard';
            $data['view'] = 'base/dashboard/index';
            $data['pembayaran'] = $this->DashboardModel->get_pembayaran_by_id_user();
            $data['order'] = $this->DashboardModel->get_order_by_id_user(); 
            $data['total_pengunjung'] = $this->DashboardModel->get_total_pengunjung();
            $data['total_komentar'] = $this->DashboardModel->get_total_komentar();
            $data['total_mingguan'] = $this->DashboardModel->get_total_pengunjung_mingguan();
            $data['komentar'] = $this->DashboardModel->get_all_komen();
            $data['pengunjung'] = $this->DashboardModel->get_all_pengunjung();
            $data['testimoni'] = $this->DashboardModel->get_testi_by_id_user();
            $data['setting'] = $this->DashboardModel->get_setting();
            $data['setting_bayar'] = $this->DashboardModel->get_setting_bayar();
            $data['data'] = $this->DashboardModel->get_data_by_id_user();
        
            return view('base/dashboard/layout', $data);
        }else{
            return redirect()->to(base_url('login'));
        }
        
        
        // echo $_SESSION['id'];
    }

    public function do_auth(){

        $data['email'] = $this->request->getPost('email');
        $data['password'] = md5($this->request->getPost('password'));
        $hasil = $this->DashboardModel->get_user($data);
        $setting = $this->DashboardModel->get_setting();
        if(count($hasil) > 0)
        {
            // set session
            $sess_data = array('masukUser' => TRUE, 'uname' => $hasil[0]->username, 'id' => $hasil[0]->id, 'no_wa' => $setting[0]->no_wa);
            $fitur = $this->DashboardModel->get_paket_by_login($hasil[0]->id);
            $sess_fitur = array('kirim_hadiah' => $fitur[0]->kirim_hadiah, 'buku_tamu' => $fitur[0]->buku_tamu);
            $this->session->set($sess_data);
            $this->session->set($sess_fitur);
            return redirect()->to(base_url('user/dashboard'));
            exit();
        }
        else
        {
            $this->session->setFlashdata('errors', ['Password Salah']);
            return redirect()->to(base_url('/login'));
        }
		
    }
    
    public function do_unauth(){
        $this->session->destroy();
        return redirect()->to(base_url('/login'));
		
	}

    public function login()
    {
        if(session()->has('masukUser'))
        {
        	return redirect()->to(base_url('user/dashboard'));
        }
        $data['title'] = 'Selamat Datang!';
        $data['view'] = 'base/dashboard/auth/login';
        return view('base/dashboard/auth/layout', $data);
    }

    public function riwayat()
    {
        $data['title'] = 'Riwayat Pengunjung';
        $data['view'] = 'base/dashboard/riwayat';
        $data['total_pengunjung'] = $this->DashboardModel->get_total_pengunjung();
        $data['total_pengunjung_today'] = $this->DashboardModel->get_total_pengunjung_today();
        $data['total_mingguan'] = $this->DashboardModel->get_total_pengunjung_mingguan();
        $data['pengunjung'] = $this->DashboardModel->get_all_pengunjung();

        return view('base/dashboard/layout', $data);
    }
    
    public function do_hapus_riwayat(){
        $idpengunjung = $this->request->getPost('id');
        $hapus = $this->DashboardModel->delete_pengunjung_by_id($idpengunjung);
        if($hapus){
            $session = session();
            $session->setFlashdata("success", "Riwayat Pengunjung Berhasil dihapus");
            echo 'sukses';
        }else{
            $session = session();
            $session->setFlashdata("error", "Riwayat Pengunjung Gagal dihapus");
            echo 'gagal';
        }
    }
    
    public function hapusbanyakriwayat(){
        if($this->request->isAJAX()){
            $idPengunjung = $this->request->getVar('idRiwayat');
            $jmldata = count($idPengunjung);
            for ($i = 0; $i < $jmldata; $i++){
                $this->DashboardModel->delete_pengunjung_by_id($idPengunjung[$i]);
            }
            $msg = [
            'sukses' => "$jmldata data Pengunjung berhasil dihapus" 
            ];
            echo json_encode($msg);
        }
    }
    
    public function ucapan()
    {
        $data['title'] = 'Data Ucapan';
        $data['view'] = 'base/dashboard/komentar';
        $data['total_komentar'] = $this->DashboardModel->get_total_komentar();
        $data['total_komentar_today'] = $this->DashboardModel->get_total_komentar_today();
        $data['komentar'] = $this->DashboardModel->get_all_komen();

        return view('base/dashboard/layout', $data);
    }

    public function do_hapus_komentar(){
        $idkomentar = $this->request->getPost('id');
        $hapus = $this->DashboardModel->delete_komen_by_id($idkomentar);
        if($hapus){
            $session = session();
            $session->setFlashdata("success", "Komentar Berhasil dihapus");
            echo 'sukses';
        }else{
            $session = session();
            $session->setFlashdata("error", "Komentar Gagal dihapus");
            echo 'gagal';
        }
    }

    public function tampilan()
	{
        $data['paket'] = $this->DashboardModel->get_paket_by_id_user();
        $data['tema'] = $this->DashboardModel->get_all_themes(); 
        $data['order'] = $this->DashboardModel->get_order_by_id_user(); 
        $data['title'] = 'Tampilan Undangan';
        $data['view'] = 'base/dashboard/tampilan';
		//load view home
		return view('base/dashboard/layout', $data);
    }
    
    public function do_ganti_tema()
	{
        $data['theme'] = $this->request->getPost('id');
        $ganti = $this->DashboardModel->update_tema($data);
        if($ganti){
            $session = session();
            $session->setFlashdata("success", "Tema Berhasil diupdate");
            echo 'sukses';
        }else{
            $session = session();
            $session->setFlashdata("error", "Tema Gagal diupdate");
            echo 'gagal';
        }
    }
    
    public function pengaturan()
	{
	    $data['paket'] = $this->DashboardModel->get_paket_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['fitur'] = $this->DashboardModel->get_fitur_by_id_user();
        $data['data'] = $this->DashboardModel->get_data_by_id_user();
        $data['setting'] = $this->DashboardModel->get_setting();
        $data['title'] = 'Pengaturan Undangan';
        $data['view'] = 'base/dashboard/pengaturan';
		return view('base/dashboard/layout', $data);
    }

    public function do_update_fitur(){
        $data['cerita'] = $this->request->getPost('cerita');
        $data['gallery'] = $this->request->getPost('album');
        $data['komen'] = $this->request->getPost('ucapan');
        $data['lokasi'] = $this->request->getPost('lokasi');
        $data['qrcode'] = $this->request->getPost('qrcode');
        $data['prokes'] = $this->request->getPost('prokes');
        $data['hadiah'] = $this->request->getPost('hadiah');
        $data['quote'] = $this->request->getPost('quote');
        $update = $this->DashboardModel->update_fitur($data);
        if($update){
            $session = session();
            $session->setFlashdata("success", "Data Fitur Berhasil diupdate");
            echo 'sukses';
        }else{
            $session = session();
            $session->setFlashdata("error", "Data Fitur Gagal diupdate");
            echo 'gagal';
        }
    }
    public function do_update_salam(){
        $data['salam_pembuka'] = $this->request->getPost('salam_pembuka');
        $data['salam_wa_atas'] = $this->request->getPost('salam_wa_atas');
        $data['salam_wa_bawah'] = $this->request->getPost('salam_wa_bawah');
        $update = $this->DashboardModel->update_salam($data);
        if($update){
            $session = session();
            $session->setFlashdata("success", "Salam Berhasil diupdate");
            echo 'sukses';
        }else{
            $session = session();
            $session->setFlashdata("error", "Salam Gagal diupdate");
            echo 'gagal';
        }
    }
    public function do_update_token(){
        $token_wa = $this->request->getPost('token_wa');
        
        $update = $this->DashboardModel->update_wa($token_wa);
        if($update){
            $session = session();
            $session->setFlashdata("success", "Data Token Whatsapp Gateway Berhasil diupdate");
            echo 'sukses';
        }else{
            $session = session();
            $session->setFlashdata("error", "Data Token Whatsapp Gateway Gagal diupdate");
            echo 'gagal';
        }
    }
    
    public function do_act_quote(){
        $data['isi_quote'] = $this->request->getPost('quote');
        $data['sumber_quote'] = $this->request->getPost('sumber_quote');
        if(empty($this->DashboardModel->get_quote_by_id_user())){
            $data['id_user'] = $_SESSION['id'];
            $update = $this->DashboardModel->save_quote($data);
        }else{
            $update = $this->DashboardModel->update_quote($data);
        }
        
        if($update){
            $session = session();
            $session->setFlashdata("success", "Data Quote Pernikahan Berhasil diupdate");
            echo 'sukses';
        }else{
            $session = session();
            $session->setFlashdata("error", "Data Quote Pernikahan Gagal diupdate");
            echo 'gagal';
        }
    }
    
    public function do_update_posisi_mempelai(){
        $id = $this->request->getPost('posisi_mempelai');
        
        $update = $this->DashboardModel->update_posisi_mempelai($id);
        if($update){
            $session = session();
            $session->setFlashdata("success", "Data Posisi Mempelai Berhasil diupdate");
            echo 'sukses';
            return redirect()->to(base_url('user/mempelai'));
        }else{
            $session = session();
            $session->setFlashdata("error", "Data Posisi Mempelai Gagal diupdate");
            echo 'gagal';
            return redirect()->to(base_url('user/mempelai'));
        }
    }

    public function do_update_domain(){
        $domain = $this->request->getPost('domain');
        
        if($domain != ''){
            $cek = $this->DashboardModel->cek_domain($domain); //cek dulu domain yg direkuest jika sdh ada maka feedback error
            if(count($cek) > 0){
                echo 'gagal';
                exit;
            }else{
                $update = $this->DashboardModel->update_domain($domain);
                
                if($update){
                    
                    $session = session();
            $session->setFlashdata("success", "Data Undangan Berhasil diupdate");
            echo 'sukses';
        }else{
            $session = session();
            $session->setFlashdata("error", "Data Undangan Gagal diupdate");
            echo 'gagal';
        }
            }   
        }
    }

    public function do_update_musik(){
        
        if (!$this->validate([
			'musik' => [
				'rules' => 'uploaded[musik]'
                            . '|mime_in[musik,audio/mpeg,audio/mpg,audio/x-mpeg,audio/mp3]'
                            . '|max_size[musik,2048]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa file mp3',
					'max_size' => 'Ukuran File Maksimal 2 MB'
				],
 			]
		])) {
		    $errors = $this->validate->getError();
			session()->setFlashdata("error", $errors);
			return redirect()->to(base_url('user/pengaturan'));
		}
        $musik = $this->request->getFile('musik');
        $data = $this->DashboardModel->get_data_by_id_user();
        $kunci = $data[0]->kunci;
        $path = 'assets/users/'.$kunci;
        if(!file_exists($path)){
            $create = mkdir('assets/users/'.$kunci, 0777,true);
        }
        $pathName = 'assets/users/'.$kunci.'/musik.mp3';
        if(file_exists($pathName)){
            unlink($pathName);
        } 
        if ($musik->isValid() && !$musik->hasMoved())
		{
		    $musik->move('assets/users/'.$kunci,'musik.mp3');
		    $session = session();
		    $session->setFlashdata("success", "Musik Berhasil diperbarui");
		}else{
		    $session = session();
			$session->setFlashdata("error", "Musik Gagal diupdate");
		}
		return redirect()->to(base_url('user/pengaturan'));
    }

    public function mempelai()
	{
        $data['mempelai'] = $this->DashboardModel->get_mempelai_by_id_user();
        $data['data'] = $this->DashboardModel->get_data_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['title'] = 'Data Mempelai';
        $data['view'] = 'base/dashboard/mempelai';
      
		return view('base/dashboard/layout', $data);
		
    }

    //upload foto mempelai
	 public function do_update_foto_mempelai(){
	 
        $groom = $this->request->getFile('foto_groom');
        $bride = $this->request->getFile('foto_bride');
        $sampul = $this->request->getFile('foto_sampul');
        $kunci = $this->request->getPost('kunci');
        $path = 'assets/users/'.$kunci;
        
        //cek folder e
        if(!file_exists($path)){
        	$create = mkdir('assets/users/'.$kunci, 0777,true);
        }
         
        if($groom != ''){ //cek dulu ini fotonya siapa
        	$avatar = $groom;
        	$pathName = 'assets/users/'.$kunci.'/groom.png';
        	if(file_exists($pathName)){
        		unlink($pathName); //hapus dulu foto yg lama
	    	} 
				$avatar->move('assets/users/'.$kunci, 'groom.png'); //upload yg baru
				$this->session->set('foto_groom', 1);
			
				echo 'uploadedgroom'; //give feedback ke jquery.. agar tampilan fotonya di ubah dgn yg baru
        }else if($bride != ''){
            $avatar = $bride;
            $pathName = 'assets/users/'.$kunci.'/bride.png';
            if(file_exists($pathName)){
                unlink($pathName);
            } 
            $avatar->move('assets/users/'.$kunci, 'bride.png');
            $this->session->set('foto_bride', 1);
          
            echo 'uploadedbride';
            
        }else{
            $avatar = $sampul;
            $pathName = 'assets/users/'.$kunci.'/kita.png';
            if(file_exists($pathName)){
                unlink($pathName);
            } 
            $avatar->move('assets/users/'.$kunci, 'kita.png');
           
            $this->session->set('foto_sampul', 1);
            
            echo 'uploadedsampul';
        } 	


     }
     
     public function do_update_mempelai(){
         
        $datanyaSiapa = $this->request->getPost('datanyaSiapa'); //cara cepat pake variabel :)
        $data["nama_".$datanyaSiapa] = $this->request->getPost('nama');
        $data['nama_panggilan_'.$datanyaSiapa] = $this->request->getPost('nama_panggilan');
        $data['nama_ayah_'.$datanyaSiapa] = $this->request->getPost('nama_ayah');
        $data['nama_ibu_'.$datanyaSiapa] = $this->request->getPost('nama_ibu');

        $update = $this->DashboardModel->update_mempelai($data);
        if($update){
            $session = session();
            $session->setFlashdata("success", "Data Mempelai Berhasil diupdate");
            echo 'sukses';
        }else{
            $session = session();
            $session->setFlashdata("error", "Data Mempelai Gagal diupdate");
            echo 'gagal';
        }
     }

     public function acara(){

        $data['acara'] = $this->DashboardModel->get_acara_by_id_user();
        $data['data'] = $this->DashboardModel->get_data_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['title'] = 'Data Acara';
        $data['view'] = 'base/dashboard/acara';
		return view('base/dashboard/layout', $data);
     }

    public function do_update_acara(){
        //SEBAGAI ARRAY PENANDA
            $noNama = 0;
			$noTanggal = 0;
			$noMulai = 0;
			$noAkhir = 0;
			$noTempat = 0;
			$noAlamat = 0;
			$noMaps = 0;

            //KITA KUMPULKAN DAN SIMPAN DATANYA DI SESSION DULU
			foreach ($this->request->getPost('nama_acara') as $value) {
                if($value == "")
                    continue;
                $this->session->set('nama_acara'.$noNama++, $value); 
                
			}

			foreach ($this->request->getPost('tgl_acara') as $value) {
                if($value == "")
                continue;
                $this->session->set('tgl_acara'.$noTanggal++, $value); 
			}

			foreach ($this->request->getPost('waktu_mulai') as $value) {
                if($value == "")
                continue;
                $this->session->set('waktu_mulai'.$noMulai++, $value); 
            }
            foreach ($this->request->getPost('waktu_akhir') as $value) {
                if($value == "")
                    continue;
                $this->session->set('waktu_akhir'.$noAkhir++, $value); 
                
			}

			foreach ($this->request->getPost('tempat_acara') as $value) {
                if($value == "")
                continue;
                $this->session->set('tempat_acara'.$noTempat++, $value); 
			}

			foreach ($this->request->getPost('alamat_acara') as $value) {
                if($value == "")
                continue;
                $this->session->set('alamat_acara'.$noAlamat++, $value); 
            }
            foreach ($this->request->getPost('maps') as $value) {
                $this->session->set('maps'.$noMaps++, $value); 
            }
            
            //KEMUDIAN HAPUS SEMUA DATA CERITA SEBULUMNYA
            $hpsacara = $this->DashboardModel->hapus_acara();

            //SETELAH ITU KITA SIMPAN KE DB
            for($i=0;$i<$noNama;$i++){
				$nama_acara = $this->session->get('nama_acara'.$i);
				$tgl_acara = $this->session->get('tgl_acara'.$i);
				$waktu_mulai = $this->session->get('waktu_mulai'.$i);
                $waktu_akhir = $this->session->get('waktu_akhir'.$i);
				$tempat_acara = $this->session->get('tempat_acara'.$i);
				$alamat_acara = $this->session->get('alamat_acara'.$i);
				$maps = $this->session->get('maps'.$i);
				$dataAcara = [
				    'id_user' => $_SESSION['id'],
					'nama_acara' => $nama_acara,
					'tgl_acara' => $tgl_acara,
					'waktu_mulai' => $waktu_mulai,
					'waktu_akhir' => $waktu_akhir,
					'tempat_acara' => $tempat_acara,
					'alamat_acara' => $alamat_acara,
					'maps' => $maps
				];
                
                $saveAcara = $this->DashboardModel->save_acara($dataAcara);
                    $this->session->remove('nama_acara'.$i);
                    $this->session->remove('tgl_acara'.$i);
                    $this->session->remove('waktu_mulai'.$i);
                    $this->session->remove('waktu_akhir'.$i);
                    $this->session->remove('tempat_acara'.$i);
                    $this->session->remove('alamat_acara'.$i);
                    $this->session->remove('maps'.$i);
            }
            
            $session = session();
            $session->setFlashdata("success", "Data Acara Berhasil diupdate");
            echo 'sukses';
            return redirect()->to(base_url('user/acara'));
            
    }
    public function do_set_countdown(){
         
        $id = $this->request->getPost('id_acara');
        
        $update = $this->DashboardModel->set_countdown($id);
        if($update){
            $session = session();
            $session->setFlashdata("success", "Data Acara Berhasil diupdate");
            echo 'sukses';
            return redirect()->to(base_url('user/acara'));
        }else{
            $session = session();
            $session->setFlashdata("error", "Data Acara Gagal diupdate");
            echo 'gagal';
            return redirect()->to(base_url('user/acara'));
        }
    }
    
    public function do_update_maps(){
         
        $data['maps'] = $this->request->getPost('maps');

        $update = $this->DashboardModel->update_maps($data);
        if($update){
            $session = session();
            $session->setFlashdata("success", "Data Maps Berhasil diupdate");
            echo 'sukses';
        }else{
            $session = session();
            $session->setFlashdata("error", "Data Maps Gagal diupdate");
            echo 'gagal';
        }
    }

    public function gallery(){

        $data['album'] = $this->DashboardModel->get_album_by_id_user();
        $data['data'] = $this->DashboardModel->get_data_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['title'] = 'Data Gallery';
        $data['view'] = 'base/dashboard/gallery';
		return view('base/dashboard/layout', $data);
    }

    public function do_update_video(){
         
        $data['video'] = $this->request->getPost('video');

        $update = $this->DashboardModel->update_video($data);
        if($update){
            $session = session();
            $session->setFlashdata("success", "Data Video Berhasil diupdate");
            echo 'sukses';
        }else{
            $session = session();
            $session->setFlashdata("error", "Data Video Gagal diupdate");
            echo 'gagal';
        }
    }

    // upload foto gallery
	public function do_update_gallery(){

        $avatar = $this->request->getFile('file'); //a
        $kunci = $this->request->getPost('kunci');
        $path = 'assets/users/'.$kunci;
        
        //folder e
        if(!file_exists($path)){
        	$create = mkdir('assets/users/'.$kunci, 0777,true);
        }

        //nama file e
        for($i=1;$i<=10;$i++){
        	$pathName = 'assets/users/'.$kunci.'/album'.$i.'.png';
        	if(!file_exists($pathName)){
        		$ok = array("no"=>$i,"kunci"=>$kunci);
        		$avatar->move('assets/users/'.$kunci, 'album'.$i.'.png');
                echo json_encode($ok);
                
                //save to db
                $dataAlbum = [
                    'id_user' => $_SESSION['id'],
                    'album' => 'album'.$i
  
                ];
                $saveAlbum = $this->DashboardModel->save_album($dataAlbum);
        		break;
        	} 
        }

       
    }

    public function do_del_gallery(){

       $id = $this->request->getPost('id');
       $kunci = $this->request->getPost('kunci');
       $file = 'assets/users/'.$kunci.'/album'.$id.'.png';
       unlink($file);
       $data['album'] = 'album'.$id;
       $data['id_user'] = $_SESSION['id'];
       $delete = $this->DashboardModel->delete_album($data);
       echo json_encode("sukses");
    }

    public function cerita(){
        $data['quote'] = $this->DashboardModel->get_quote_by_id_user();
        $data['cerita'] = $this->DashboardModel->get_cerita_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['title'] = 'Data Cerita';
        $data['view'] = 'base/dashboard/cerita';
		return view('base/dashboard/layout', $data);
    }

    public function do_update_cerita(){
            //SEBAGAI ARRAY PENANDA
            $noTanggal = 0;
			$noJudul = 0;
			$noIsi = 0;
            
            //KITA KUMPULKAN DAN SIMPAN DATANYA DI SESSION DULU
			foreach ($this->request->getPost('tanggal_cerita') as $value) {
                if($value == "")
                    continue;
                $this->session->set('tanggal_cerita'.$noTanggal++, $value); 
                
			}

			foreach ($this->request->getPost('judul_cerita') as $value) {
                if($value == "")
                continue;
                $this->session->set('judul_cerita'.$noJudul++, $value); 
			}

			foreach ($this->request->getPost('isi_cerita') as $value) {
                if($value == "")
                continue;
                $this->session->set('isi_cerita'.$noIsi++, $value); 
            }
            
            //KEMUDIAN HAPUS SEMUA DATA CERITA SEBULUMNYA
            $hpscerita = $this->DashboardModel->hapus_cerita();

            //SETELAH ITU KITA SIMPAN KE DB
            for($i=0;$i<$noTanggal;$i++){
				$tanggal_cerita = $this->session->get('tanggal_cerita'.$i);
				$judul_cerita = $this->session->get('judul_cerita'.$i);
				$isi_cerita = $this->session->get('isi_cerita'.$i);

				$dataCerita = [
					'id_user' => $_SESSION['id'],
					'tanggal_cerita' => $tanggal_cerita,
					'judul_cerita' => $judul_cerita,
					'isi_cerita' => $isi_cerita
				];

                $saveCerita = $this->DashboardModel->save_cerita($dataCerita);
                
            //HAPUS DULU SESSION SEBELUMNYA
                $this->session->remove('tanggal_cerita'.$i);
                $this->session->remove('judul_cerita'.$i);
                $this->session->remove('isi_cerita'.$i);
            
            }
            $session = session();
            $session->setFlashdata("success", "Data Cerita Berhasil diupdate");
            echo 'sukses';
            return redirect()->to(base_url('user/cerita'));
            

    }
    
     public function rekening(){
        $data['data'] = $this->DashboardModel->get_data_by_id_user();
        $data['rekening'] = $this->DashboardModel->get_rekening_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['title'] = 'Data Rekening';
        $data['view'] = 'base/dashboard/rekening';
		return view('base/dashboard/layout', $data);
    }

    public function do_update_rekening(){
        
        $data = $this->DashboardModel->get_data_by_id_user();
        $kunci = $data[0]->kunci;
            //HAPUS DULU SESSION SEBELUMNYA
            $jml_rekening_sebelumnya = $this->session->get('jml_rekening');

            for($i=0;$i<=$jml_rekening_sebelumnya;$i++){
                $this->session->remove('nama_bank'.$i);
                $this->session->remove('no_rekening'.$i);
                $this->session->remove('nama_pemilik'.$i);
                $this->session->remove('nama_qrcode'.$i);
                $this->session->remove('qrcode_bank'.$i);
            }

            //SEBAGAI ARRAY PENANDA
            $noBank = 0;
			$noRek = 0;
			$noNama = 0;
			$namaQr = 0;
			$fileQr = 0;
            //KITA KUMPULKAN DAN SIMPAN DATANYA DI SESSION DULU
			foreach ($this->request->getPost('nama_bank') as $value) {
                if($value == "")
                    continue;
                $this->session->set('nama_bank'.$noBank++, $value); 
                
			}

			foreach ($this->request->getPost('no_rekening') as $value) {
                if($value == "")
                continue;
                $this->session->set('no_rekening'.$noRek++, $value); 
			}

			foreach ($this->request->getPost('nama_pemilik') as $value) {
                if($value == "")
                continue;
                $this->session->set('nama_pemilik'.$noNama++, $value); 
            }
            foreach ($this->request->getPost('nama_qrcode') as $value) {
                $this->session->set('nama_qrcode'.$namaQr++, $value); 
            }

            $upload = $this->request->getFiles();
            $no = 0;
            $nomor = 1;
            foreach ($upload['qrcode_picture'] as $upl) {
                $path = 'assets/users/'.$kunci.'/rekening';
                if(!file_exists($path)){
        	    $create = mkdir($path, 0777,true);
                }
                $namafile = 'qrcode'.$nomor++.'.png';
                $nama_qrcode = $this->session->get('nama_qrcode'.$no);
                if($upl != ''){ //cek dulu ini fotonya siapa
                    if($nama_qrcode !=''){
                        $qrcode_bank = $nama_qrcode;
                    }else{
                        $qrcode_bank = $namafile;
                    }
                	$pathName = $path.'/'.$namafile;
                	if(file_exists($pathName)){
                		unlink($pathName); //hapus dulu foto yg lama
        	    	} 
        	    	$this->session->set('qrcode_bank'.$no++, $qrcode_bank); 
        			$upl->move($path, $namafile); //upload yg baru
                }else{
                    $this->session->set('qrcode_bank'.$no++, $nama_qrcode); 
                }
            }
        
            //KEMUDIAN HAPUS SEMUA DATA CERITA SEBULUMNYA
            $hpsrekening = $this->DashboardModel->hapus_rekening();

            //SETELAH ITU KITA SIMPAN KE DB
            for($i=0;$i<$noNama;$i++){
				$nama_bank = $this->session->get('nama_bank'.$i);
				$no_rekening = $this->session->get('no_rekening'.$i);
				$nama_pemilik = $this->session->get('nama_pemilik'.$i);
				$nama_qrcode = $this->session->get('nama_qrcode'.$i);
				$file_qrcode = $this->session->get('qrcode_bank'.$i);
				$urut = $i+1;
                if($file_qrcode != ''){
                    if($nama_qrcode != ''){
                        $qrcode_nama = $nama_qrcode;
                    }else{
                        $qrcode_nama = 'qrcode'.$urut.'.png';
                    }
                }else{
                    $qrcode_nama = '';
                }
				$dataRekening = [
					'id_user' => $_SESSION['id'],
					'nama_bank' => $nama_bank,
					'no_rekening' => $no_rekening,
					'nama_pemilik' => $nama_pemilik,
					'qrcode_bank'  => $qrcode_nama
				];

                $saveRekening = $this->DashboardModel->save_rekening($dataRekening);
            }
            $session = session();
            $session->setFlashdata("success", "Data Rekening Berhasil diupdate");
            echo 'sukses';
            return redirect()->to(base_url('user/rekening'));

    }
    
    public function profil(){

        $data['user'] = $this->DashboardModel->get_user_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['title'] = 'Profil';
        $data['view'] = 'base/dashboard/profil';
		return view('base/dashboard/layout', $data);
    }

    public function do_update_user(){

        if($this->request->getPost('password') != ''){
            $data['password'] = md5($this->request->getPost('password'));
        }
        $data['username'] = $this->request->getPost('username');
        $data['email'] = $this->request->getPost('email');
        $data['hp'] = $this->request->getPost('hp');
        $phone = $this->request->getPost('hp');
        foreach ($this->DashboardModel->get_setting() as $row){
            $wa_gateway = $row->wa_gateway;
            $token = $row->token_wa;
        }
        if($wa_gateway == 'nusagateway' && $this->cek_wa($token, $phone) == false){
                $session = session();
                $session->setFlashdata("error", "No HP tidak Terdaftar di Whatsapp");
                echo 'gagal';
            
        }else{
            $update = $this->DashboardModel->update_user($data);
            if($update){
                $session = session();
                $this->session->set('uname', $data['username']);
                $session->setFlashdata("success", "Data Profil Berhasil diupdate");
            echo 'sukses';
            }else{ 
            $session = session();
            $session->setFlashdata("error", "Data Profil Gagal diupdate");
            echo 'gagal';
            }
        }
    }

    public function do_konfirmasi(){
        $bukti = $this->request->getFile('bukti');
        $invoice = $this->request->getPost('invoice');
        $dataPembayaran['nama_lengkap'] = $this->request->getPost('nama_lengkap');
        $dataPembayaran['nama_bank'] = $this->request->getPost('nama_bank');
        $dataPembayaran['status'] = '1'; //status menunggu konfirmasi atau user sudah upload bukti
        $dataPembayaran['bukti'] = $invoice.'.png';

        if (!$bukti->isValid())
        {
            return redirect()->to(base_url('user/invoice')); //jika bukti lebih dari 2 mb tolak
        }

         //folder e
         if(!file_exists('assets/bukti')){
        	$create = mkdir('assets/bukti', 0777,true);
        }

        $pathName = 'assets/bukti/'.$invoice.'.png';
        if(file_exists($pathName)){
            unlink($pathName);
        } 

        $bukti->move('assets/bukti/',$invoice.'.png'); //uploadd

        //setelah di upload insert data ke db
        $update = $this->DashboardModel->update_pembayaran($dataPembayaran,$invoice);
        if($update){
            return redirect()->to(base_url('user/invoice'));
        }else{
            return redirect()->to(base_url('user/invoice'));
        }

    }
    public function do_pembayaran(){
        $invoice = $this->request->getPost('invoice');
        $dataPembayaran['nama_lengkap'] = $this->request->getPost('nama_lengkap');
        $dataPembayaran['status'] = '1'; //status menunggu konfirmasi atau user sudah upload bukti
        //setelah di upload insert data ke db
        $update = $this->DashboardModel->update_pembayaran($dataPembayaran,$invoice);
        if($update){
            return redirect()->to(base_url('user/invoice'));
        }else{
            return redirect()->to(base_url('user/invoice'));
        }

    }
    public function refresh_invoice(){
        $id_user = $_SESSION['id']; //ambil id user
		$today = date('ym');
	 	$kode = $today.$id_user.rand(10,99);
        //setelah di upload insert data ke db
        $update = $this->DashboardModel->refresh_invoice($kode);
        if($update){
            $session = session();
            $session->setFlashdata("success", "Invoice Berhasil diperbarui");
            echo 'sukses';
        }else{ 
         $session = session();
        $session->setFlashdata("error", "Invoice Gagal diperbarui");
            echo 'gagal';
        }

    }
    public function re_order(){
        $id_user = $_SESSION['id']; //ambil id user
		$today = date('ym');
		$data['id_user'] = $_SESSION['id']; 
	 	$data['invoice'] = $today.$id_user.rand(10,99);
        $ordernya = $this->DashboardModel->get_pembayaran_by_id_user();
         foreach( $ordernya as $order){
            $data['harga'] = $order->harga;
         }
        $insert = $this->DashboardModel->re_order($data);
        if($insert){
            $session = session();
            $session->setFlashdata("success", "Invoice Baru Berhasil dibuat");
            echo 'sukses';
        }else{ 
         $session = session();
        $session->setFlashdata("error", "Invoice Baru Gagal dibuat");
            echo 'gagal';
        }

    }
    
    public function update_paket(){
        $id_paket = $this->request->getPost('id_paket');
		$today = date('ym');
        $bayar = $this->DashboardModel->get_pembayaran_by_id_user();
        if($bayar[0]->status == 2) {
        $data1['created_at'] = date('Y-m-d H:i:s');
        }
        $data1['id_paket'] = $id_paket;
        $paket = $this->DashboardModel->get_paket_by_id($id_paket);
        $data2 = ['invoice' => $today.$_SESSION['id'].rand(10,99),
            'status' => 0,
            'harga' => $paket[0]->harga_paket,
            ];
        $array_items = ['kirim_hadiah', 'buku_tamu'];
        $this->session->remove($array_items);
        $sess_fitur = array('kirim_hadiah' => $paket[0]->kirim_hadiah, 'buku_tamu' => $paket[0]->buku_tamu);
        $this->session->set($sess_fitur);
        $update = $this->DashboardModel->update_paket($data1, $data2);
        if($update){
            $session = session();
            $session->setFlashdata("success", "Paket Undangan Berhasil diperbarui");
            echo 'sukses';
            return redirect()->to(base_url('user/invoice'));
        }else{ 
         $session = session();
        $session->setFlashdata("error", "Paket Undangan Gagal diperbarui");
            echo 'gagal';
            return redirect()->to(base_url('user/invoice'));
        }

    }
    
    public function testimoni(){

        $data['user'] = $this->DashboardModel->get_user_by_id_user();
        $data['testimoni'] = $this->DashboardModel->get_testi_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['title'] = 'Testimonial';
        $data['view'] = 'base/dashboard/testimoni';
	return view('base/dashboard/layout', $data);
    }

    public function do_update_testi(){
        $data['nama_lengkap'] = $this->request->getPost('nama');
        $data['kota'] = $this->request->getPost('kota');
        $data['provinsi'] = $this->request->getPost('provinsi');
        $data['ulasan'] = $this->request->getPost('ulasan');
        $data['status'] = $this->request->getPost('status');
        $update = $this->DashboardModel->update_testi($data);
        if($update){
            $session = session();
            $session->setFlashdata("success", "Data Testimoni Berhasil disimpan");
            echo 'sukses';
        }else{
            $session = session();
            $session->setFlashdata("error", "Data Testimoni Gagal diupdate");
            echo 'gagal';
        }
       
    }
    
    public function tamu(){
        
        $data['tamu'] = $this->DashboardModel->get_tamu_by_id_user();
        $data['data'] = $this->DashboardModel->get_data_by_id_user();
        $data['paket'] = $this->DashboardModel->get_paket_by_id_user();
        $data['title'] = 'Data Tamu';
        $data['view'] = 'base/dashboard/tamu';
		return view('base/dashboard/layout', $data);
     }

    public function do_update_tamu(){
         
        $data['nama_tamu'] = ucwords($this->request->getPost('nama_tamu'));
        $data['nama_slug'] = url_title($this->request->getPost('nama_tamu'), '+', TRUE);
        $data['alamat_tamu'] = ucwords($this->request->getPost('alamat_tamu'));
        $data['alamat_slug'] = url_title($this->request->getPost('alamat_tamu'), '+', TRUE);
        $data['no_wa'] = $this->request->getPost('no_wa');
        $data['tgl_kirim'] = $this->request->getPost('tgl_kirim');
        $id = $this->request->getPost('id_tamu');
        $domain= $this->DashboardModel->get_order_by_id_user()[0]->domain;
        $data['qrcode'] = md5($domain.$data['nama_slug'].$data['alamat_slug']);
        foreach ($this->DashboardModel->get_setting() as $row){
            $wa_gateway = $row->wa_gateway;
            $token = $row->token_wa;
        }
		if($wa_gateway == 'nusagateway' && $this->cek_wa($token, $this->request->getPost('no_wa')) == false){
                $session = session();
                $session->setFlashdata("error", "No HP tidak Terdaftar di Whatsapp");
                echo 'gagal';
            
        }else{
        $update = $this->DashboardModel->update_tamu($data, $id);
        if($update){
            $session = session();
            $session->setFlashdata("success", "Data tamu Berhasil diupdate");
            echo 'sukses';
        }else{
            $session = session();
            $session->setFlashdata("error", "Data tamu Gagal diupdate");
            echo 'gagal';
        }
        }
    }
    
    public function do_save_tamu(){

        $data['id_user'] = $this->request->getPost('id_user');
        $data['nama_tamu'] = ucwords($this->request->getPost('nama_tamu'));
        $data['nama_slug'] = url_title($data['nama_tamu'], '+', TRUE);
        $data['alamat_tamu'] = ucwords($this->request->getPost('alamat_tamu'));
        $data['alamat_slug'] = url_title($data['alamat_tamu'], '+', TRUE);
        $data['no_wa'] = $this->request->getPost('no_wa');
        $data['tgl_kirim'] = $this->request->getPost('tgl_kirim');
        $domain= $this->DashboardModel->get_order_by_id_user()[0]->domain;
        $data['qrcode'] = md5($domain.$data['nama_slug'].$data['alamat_slug']);
        $token = $this->DashboardModel->get_token();
        foreach ($this->DashboardModel->get_setting() as $row){
            $wa_gateway = $row->wa_gateway;
        }
		if($wa_gateway == 'nusagateway' && $this->cek_wa($token, $this->request->getPost('no_wa')) == false){
                $session = session();
                $session->setFlashdata("error", "No HP tidak Terdaftar di Whatsapp");
                echo 'gagal';
            
        }else{
         $save = $this->DashboardModel->save_tamu($data);
        if($save){
            $session = session();
            $session->setFlashdata("success", "Data tamu Berhasil ditambahkan");
            echo 'sukses';
            
        }else{
            $session = session();
            $session->setFlashdata("error", "Data tamu Gagal ditambahkan");
            echo 'gagal';
            
        }
        }
    }
    public function do_hapus_tamu(){
        $id_tamu = $this->request->getPost('id_tamu');
        $data = $this->DashboardModel->get_data_by_id_user();
        $kunci = $data[0]->kunci;
        
        $hasil = $this->DashboardModel->get_tamu_by_id_tamu($id_tamu);
        $qrcode = $hasil[0]->qrcode;
        $file = 'assets/users/'.$kunci.'/'.$qrcode.'.png';
        $hapus = $this->DashboardModel->delete_tamu_by_id($id_tamu);
        if($hapus){
            if(file_exists($file)){
                unlink($file);
            }
            $session = session();
            $session->setFlashdata("success", "Data tamu Berhasil dihapus");
            echo 'sukses';
        }else{
            $session = session();
            $session->setFlashdata("error", "Data tamu Gagal dihapus");
            echo 'gagal';
        }
    }
    public function hapusbanyaktamu(){
        if($this->request->isAJAX()){
            $idTamu = $this->request->getVar('idTamu');
            
            $jmldata = count($idTamu);
            for ($i = 0; $i < $jmldata; $i++){
                $data = $this->DashboardModel->get_data_by_id_user();
                $kunci = $data[0]->kunci;
        
                $hasil = $this->DashboardModel->get_tamu_by_id_tamu($idTamu[$i]);
                $qrcode = $hasil[0]->qrcode;
                $file = 'assets/users/'.$kunci.'/'.$qrcode.'.png';
                $this->DashboardModel->delete_tamu_by_id($idTamu[$i]);
                if(file_exists($file)){
                unlink($file);
                }
            }
            
            $msg = [
            'sukses' => "$jmldata data Tamu berhasil dihapus" 
            ];
            echo json_encode($msg);
        }
    }
    public function setting_bukutamu(){
        $data['slider'] = $this->DashboardModel->get_slider_by_id_user();
        $data['mempelai'] = $this->DashboardModel->get_mempelai_by_id_user();
        $data['data'] = $this->DashboardModel->get_data_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['title'] = 'Setting Buku Tamu';
        $data['view'] = 'base/dashboard/setting_bukutamu';
		return view('base/dashboard/layout', $data);
		
    }
    
    public function do_update_slider_bukutamu(){
	    $avatar = $this->request->getFile('file'); //a
        $kunci = $this->request->getPost('kunci');
        $path = 'assets/users/'.$kunci;
        
        //folder e
        if(!file_exists($path)){
        	$create = mkdir('assets/users/'.$kunci, 0777,true);
        }

        //nama file e
        for($i=1;$i<=10;$i++){
        	$pathName = 'assets/users/'.$kunci.'/slider'.$i.'.png';
        	if(!file_exists($pathName)){
        		$ok = array("no"=>$i,"kunci"=>$kunci);
        		$avatar->move('assets/users/'.$kunci, 'slider'.$i.'.png');
                echo json_encode($ok);
                
                //save to db
                $dataAlbum = [
                    'id_user' => $_SESSION['id'],
                    'nama_slider' => 'slider'.$i
  
                ];
                $saveAlbum = $this->DashboardModel->save_slider($dataAlbum);
        		break;
        	} 
        }
        
     }
     public function do_del_slider_bukutamu(){

       $id = $this->request->getPost('id');
       $kunci = $this->request->getPost('kunci');
       $file = 'assets/users/'.$kunci.'/slider'.$id.'.png';
       unlink($file);
       $data['nama_slider'] = 'slider'.$id;
       $data['id_user'] = $_SESSION['id'];
       $delete = $this->DashboardModel->delete_slider_bukutamu($data);
       echo json_encode("sukses");
    }
     public function do_update_background_bukutamu(){
        
        if (!$this->validate([
			'bg-bukutamu' => [
				'rules' => 'uploaded[bg-bukutamu]'
                            . '|mime_in[bg-bukutamu,image/jpg,image/jpeg,image/gif,image/png]'
                            . '|max_size[bg-bukutamu,2048]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa file mp3',
					'max_size' => 'Ukuran File Maksimal 2 MB'
				],
 			]
		])) {
		    $errors = $this->validate->getError();
			session()->setFlashdata("error", $errors);
			return redirect()->to(base_url('user/setting_bukutamu'));
		}
        $background = $this->request->getFile('bg-bukutamu');
        $data = $this->DashboardModel->get_data_by_id_user();
        $kunci = $data[0]->kunci;
        $path = 'assets/users/'.$kunci;
        if(!file_exists($path)){
            $create = mkdir('assets/users/'.$kunci, 0777,true);
        }
        $pathName = 'assets/users/'.$kunci.'/bg-tamu.png';
        if(file_exists($pathName)){
            unlink($pathName);
        } 
        if ($background->isValid() && !$background->hasMoved())
		{
		    $background->move('assets/users/'.$kunci,'bg-tamu.png');
		    $session = session();
		    $session->setFlashdata("success", "Background Buku Tamu Berhasil diperbarui");
		}else{
		    $session = session();
			$session->setFlashdata("error", "Background Buku Tamu Gagal diupdate");
		}
		return redirect()->to(base_url('user/setting_bukutamu'));
    }
     public function data_hadir(){

        $data['order'] = $this->DashboardModel->get_order_by_id_user(); 
        $data['data'] = $this->DashboardModel->get_data_by_id_user();
        $data['hadir'] = $this->DashboardModel->get_hadir_by_id_user();
        $data['title'] = 'Data Hadir Tamu';
        $data['view'] = 'base/dashboard/data_hadir';
		return view('base/dashboard/layout', $data);
     }
     
    public function autofill()
    {
        $qrcode =$_GET['qrcode'];
        $hasil = $this->DashboardModel->autofill($qrcode);
        
        if(count($hasil) > 0){
            foreach ($hasil as $row)
            $data[]= array('nama_tamu' => $row->nama_tamu, 'alamat_tamu' => $row->alamat_tamu, 'id_tamu' => $row->id_tamu);
            echo json_encode($data);
        } else {
        $data[]= array('nama_tamu' => '-', 'alamat_tamu' => '-');
        echo json_encode($data);
        }   
    }

    public function do_update_hadir(){
        $qrcode = $this->request->getPost('qrcode');
        $nama = $this->request->getPost('nama');
        // $id = $this->request->getPost('id');
        $cekhadir = $this->DashboardModel->cek_hadir($qrcode);
        foreach ($cekhadir->getResult() as $row)
        {   
        $id = $row->id_tamu;
        }
        if ( $nama != '-'){
	    if(is_null(($id))){
	    $update = $this->DashboardModel->update_hadir($qrcode);
        if($update){
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
    public function do_hapus_hadir(){
        $id = $this->request->getPost('id');
        $hapus = $this->DashboardModel->hapus_hadir($id);
        if($hapus){
            $session = session();
            $session->setFlashdata("success", "Data Hadir Tamu Berhasil dihapus");
            echo 'sukses';
        }else{
            $session = session();
            $session->setFlashdata("error", "Data Hadir Tamu Gagal dihapus");
            echo 'gagal';
        }

    }
    public function kirim_undangan(){
	   $id_tamu = $this->request->getPost('id_tamu');
       foreach ($this->DashboardModel->get_setting() as $row){
            $wa_gateway = $row->wa_gateway;
            $token_wa = $row->token_wa;
        }
        foreach ($this->DashboardModel->get_all_undangan($id_tamu) as $row) {
		$order = $this->DashboardModel->get_order_by_id_user();
		$masa_aktif = $order[0]->masa_aktif;
		$tglBayar = $row->tgl_bayar;
        $today = strtotime('now');
        $aktif = '+'.$masa_aktif.' days';
        $tglNonaktif= strtotime($aktif, strtotime($tglBayar));
        if($row->status_bayar == 2 && $today <= $tglNonaktif) {
	 	$domain = $row->domain_undangan;
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
                if($wa_gateway == 'nusagateway' && $this->cek_wa($token, $phone) == false){
                    $data['status_kirim'] = 'tidak terdaftar';
                    $update = $this->DashboardModel->status_undangan($data, $id_tamu);
                    $session = session();
                    $session->setFlashdata("error", "No HP tidak Terdaftar di Whatsapp");
                    echo 'gagal';
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
                $update = $this->DashboardModel->status_undangan($data, $id_tamu);
                $session = session();
                $session->setFlashdata("success", "Undangan Berhasil terkirim");
                echo 'sukses';
            }else{
                $data['status_kirim'] = 'tidak terkirim';
                $update = $this->DashboardModel->status_undangan($data, $id_tamu);
                $session = session();
                $session->setFlashdata("error", "Undangan Gagal dikirim");
                echo 'gagal';
        
                
            }
        }
      }else{
         $session = session();
        $session->setFlashdata("error", "Undangan Gagal dikirim, harap lakukan pembayaran terlebih dahulu");
            echo 'gagal';
      }
    }
}
    public function prosesExcel()
	{
		$file = $this->request->getFile('fileexcel');
		if($file){
			$excelReader  = new PHPExcel();
			//mengambil lokasi temp file
			$fileLocation = $file->getTempName();
			//baca file
			$objPHPExcel = PHPExcel_IOFactory::load($fileLocation);
			//ambil sheet active
			$sheet	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
			//looping untuk mengambil data
			foreach ($sheet as $idx => $data) {
				//skip index 1 karena title excel
				if($idx==1){
					continue;
				}
				$nama_tamu = $data['A'];
				$alamat_tamu = $data['B'];
				$no_wa = $data['C'];
				$tgl_kirim = $data['D'];
				// insert data
				$nama_slug = url_title($nama_tamu, '+', TRUE);
                $alamat_slug = url_title($alamat_tamu, '+', TRUE);
                $domain= $this->DashboardModel->get_order_by_id_user()[0]->domain;
        $qrcode = md5($domain.$nama_slug.$alamat_slug);
        $dataTamu = [
                    'id_user' => $_SESSION['id'],
                    'nama_tamu' => $nama_tamu,
                    'alamat_tamu' => $alamat_tamu,
                    'nama_slug' => $nama_slug,
                    'alamat_slug' => $alamat_slug,
                    'no_wa' => $no_wa,
                    'tgl_kirim' => $tgl_kirim,
                    'qrcode' => $qrcode
  
        ];
         $save = $this->DashboardModel->save_tamu($dataTamu);
				}
		}
		session()->setFlashdata("success", "Data tamu Berhasil ditambahkan");
		return redirect()->to('/user/tamu');
		
	}
    public function invoice(){
        foreach ($this->DashboardModel->get_setting_bayar() as $row){
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
        $data['urlMidtrans'] = $url;
        $data['clientKey'] = $client;
        $data['paket'] = $this->DashboardModel->get_paket();
        $data['pembayaran'] = $this->DashboardModel->get_pembayaran_by_id_user();
        $data['user'] = $this->DashboardModel->get_user_by_id_user();
        $data['order'] = $this->DashboardModel->get_order_by_id_user();
        $data['setting'] = $this->DashboardModel->get_setting();
        $data['setting_bayar'] = $this->DashboardModel->get_setting_bayar();
        $data['title'] = 'Pembayaran';
        $data['view'] = 'base/dashboard/invoice';
		return view('base/dashboard/layout', $data);
    }

	 public function token()
    {
        foreach ($this->DashboardModel->get_setting_bayar() as $row){
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
        $ordernya = $this->DashboardModel->get_pembayaran_by_id_user();
        foreach( $ordernya as $order){
            $order_id = $order->invoice;
            $harga = $order->harga;
            $email = $order->email;
            $hp = $order->hp;
        }
        // Required
        $transaction_details = array(
            'order_id' => $order_id,
            'gross_amount' => $harga // no decimal allowed for creditcard
        );
        $customer_details = array(
			'email'         => $email,
			'phone'         => $hp
		);
		$time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'hour', 
            'duration'  => 1
        );
        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;
        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'customer_details'   	=> $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );
        error_log(json_encode($transaction_data));

        $snapToken = \Midtrans\Snap::getSnapToken($transaction_data);
        echo $snapToken;
    }
    public function attemptOrder()
    {
        if ($result = json_decode($this->request->getPost('result_data'))) {
            if($result->payment_type == 'bank_transfer'){
            if(@$result->va_numbers){
                foreach ($result->va_numbers as $row){
                    $bank       = $row->bank;
                    $vaNumber   = $row->va_number;
                    $billerCode = '';

                }
            }else{
                    $bank        = 'permata';
                    $vaNumber    = $result->permata_va_number;
                    $billerCode  = '';
            }
        }elseif ($result->payment_type == 'echannel'){
                    $bank        = 'mandiri';
                    $vaNumber    = $result->bill_key;
                    $billerCode  = $result->biller_code;
        }else{
		            $bank        = 'alfamart/indomart';
		            $vaNumber    = $result->payment_code;
		            $billerCode  = '';
        }
        $order_id = $result->order_id;
            if($result->status_code == '201'){
                $status = 1;
            }elseif($result->status_code == '200'){
                $status = 2;
            }else{
                $status = 0;
            }
		$data = [
		    'status'            => $status,
            'payment_type'      => $result->payment_type,
            'nama_bank'         => $bank,
            'va_number'         => $vaNumber,
            'biller_code'       => $billerCode,
            'transaction_status'=> $result->transaction_status,
            'transaction_time'  => $result->transaction_time,
            'transaction_expired'  => date('Y-m-d H:i:s', (strtotime($result->transaction_time) + (1 * 60 * 60)))
        ];
        foreach( $this->DashboardModel->get_pembayaran_by_invoice($order_id) as $order){
            $hp = $order->hp;
        }
        $token = $this->DashboardModel->get_token();
        $message = 'Halo Kak, Terima Kasih Sudah Memesan Undangan Digital '.DOMAIN_UTAMA.'
            
Mohon segera selesaikan Pembayaran Anda #'.$order_id.' sebelum tanggal *'.date('Y-m-d H:i', (strtotime($result->transaction_time) + (1 * 60 * 60))).'*.
Nama Bank : '.strtoupper($bank).'
VA Number : '.$vaNumber.'
Nominal : '.number_format($result->gross_amount).'

*Terima Kasih Dan Sukses Selalu*';

        $this->send_wa($token, $hp, $message);
            $save = $this->DashboardModel->update_pembayaran($data,$order_id);
            return redirect()->to(base_url('user/invoice'));
        }
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
	    foreach ($this->DashboardModel->get_setting() as $row){
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
   
	public function pembayaran_tripay(){
		 $token = $this->DashboardModel->get_token();
		foreach ($this->DashboardModel->get_setting_bayar() as $row){
            $apiKey       = $row->apikey_tripay;
            $privateKey   = $row->privatekey_tripay;
            $merchantCode = $row->merchantcode_tripay;
            $urlTrans   = $row->url_tripay;
        }

        $method = $this->request->getPost('metode_bayar');
        $ordernya = $this->DashboardModel->get_pembayaran_by_id_user();
        foreach( $ordernya as $order){
            $merchantRef = $order->invoice;
            $amount = $order->harga;
            $email = $order->email;
            $hp = $order->hp;
        }
        
        $data = [
            'method'         => $method,
            'merchant_ref'   => $merchantRef,
            'amount'         => $amount,
            'customer_name' => $email,
            'customer_email' => $email,
            'customer_phone' => $hp,
            'expired_time' => (time() + (1 * 60 * 60)),// 1 jam
            'signature'    => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey),
            'order_items'    => [
                [
                    'sku'         => $merchantRef,
                    'name'        => 'UNDANGAN',
                    'price'       => $amount,
                    'quantity'    => 1,
                ]
            ],
        ];
        
        $curl = curl_init();
        
        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => $urlTrans,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query($data)
        ]);
        
        $response = curl_exec($curl);
        $error = curl_error($curl);
        
        curl_close($curl);
        error_log($response);
        $result = json_decode($response);
        if(empty($result->data)){
        session()->setFlashdata("error", "Payment channel is not available or under maintenance");
		return redirect()->to('/user/invoice');
        }else{
        $data_simpan = [
		    'status'            => '1',
            'payment_type'      => 'bank transfer',
            'nama_bank'         => $result->data->payment_name,
            'va_number'         => $result->data->pay_code,        
            'transaction_time'  => date("Y-m-d H:i:s"),
            'transaction_expired'  => date('Y-m-d H:i:s', $result->data->expired_time),
            'instruction'       => json_encode($result->data->instructions)
        ];
        $message = 'Halo Kak, Terima Kasih Sudah Memesan Undangan Digital '.DOMAIN_UTAMA.'
            
Mohon segera selesaikan Pembayaran Anda #'.$merchantRef.' sebelum tanggal *'.date('Y-m-d H:i', $result->data->expired_time).'*.
Nama Bank : '.$result->data->payment_name.'
VA Number : '.$result->data->pay_code.'
Nominal : '.number_format($amount).'

*Terima Kasih Dan Sukses Selalu*';

        $this->send_wa($token, $hp, $message);
        $save = $this->DashboardModel->update_pembayaran($data_simpan,$merchantRef);
            return redirect()->to(base_url('user/invoice'));
	}
	}
}
