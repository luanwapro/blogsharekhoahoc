<?php namespace App\Controllers;
use App\Controllers\DB;

class Home extends BaseController
{
	function __construct()
	{
		self::$danhsachxemnhieunhat =(new DB())->table("khoahoc")->dbAll()->orderBy('luotxem',"DESC")->get(10)->getResult();
		self::$danhsach5chude = (new DB())->table("chude")->get(5);
		self::$danhsachchude =(new DB())->table("chude")->get();
	}
	 static $danhsachxemnhieunhat;
	 static $danhsach5chude;
	 static $danhsachchude;
	public function index()
	{ini_set('display_errors', 1);

		$danhsach5chude = (new DB())->table("chude")->get(5);
		$danhsachchude =(new DB())->table("chude")->get();
		$danhsachchudetmp =(new DB())->table("chude")->get();
		$chude2=(new DB())->table("chude")->dbAll()->where('cap',"1")->get(2)->getResult();
		$danhsachbaiviet = (new DB())->table("khoahoc")->get(11);
		$baivietall =(new DB())->table("khoahoc")->get(10);
		
		return view('site/trangchu',['danhsach5chude'=>$danhsach5chude,'danhsachchude'=>$danhsachchude,"chude2"=>$chude2,'danhsachchudetmp'=>$danhsachchudetmp,'danhsachbaiviet'=>$danhsachbaiviet,"danhsachxemnhieunhat"=>self::$danhsachxemnhieunhat
		,"allbaiviet"=>$baivietall]);
	}

	function tomtat($str){

		echo  (substr($str,0,50));
	}

	function xembaiviet($id){
		ini_set('display_errors', 1);
	
	$baivietdangxem=(new DB())->table("khoahoc")->dbAll()->where("id",explode( '-',$id)[0])->get()->getResult();
	$baivietall =(new DB())->table("khoahoc")->dbAll()->where("id_chude",	$baivietdangxem[0]->id_chude)->get(10)->getResult();
	return view("site/baiviet",["baivietdangxem"=>$baivietdangxem,"danhsach5chude"=>self::$danhsach5chude,"danhsachchude"=>self::$danhsachchude,"danhsachxemnhieunhat"=>self::$danhsachxemnhieunhat,
	"allbaiviet"=>$baivietall]);
	}
	function xemthem(){
		$request = service("request");
		$page=$request->getPost("page");
		$landem =(int)$request->getPost("page");
	
		if($page=="tt"){
		
			$baiviet =array_splice((new DB())->table("khoahoc")->dbAll()->orderBy('id',"DESC")->get()->getResult(),$landem-5,$landem*5);
			foreach($baiviet as $values){

				echo '<div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
				<!-- Post Thumbnail -->
				<div class="post-thumbnail">
					<img src='. $values->anh.' " alt="">
				</div>
				<!-- Post Content -->
				<div class="post-content">
					<a href="#" class="headline">
						<h5>'. $values->tenkhoahoc  .'</h5>
					</a>
					<p>'. substr($values->noidung,0,50).'....' .'</p>
					<!-- Post Meta -->
					<div class="post-meta">
						<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
					</div>
				</div>
			</div>';

			}

			return 0;
		}else if(empty(strpos($page,"bv"))){

		

			$baiviet =array_splice(	(new DB())->table("khoahoc")->dbAll()->where("id_chude",(explode("-",$page)[1]))->get()->getResult(),($landem-1)*5,$landem*5);
			foreach($baiviet as $values){

				echo '<div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
				<!-- Post Thumbnail -->
				<div class="post-thumbnail">
					<img src='. $values->anh.' " alt="">
				</div>
				<!-- Post Content -->
				<div class="post-content">
					<a href="#" class="headline">
						<h5>'. $values->tenkhoahoc  .'</h5>
					</a>
					<p>'. substr($values->noidung,0,50).'....' .'</p>
					<!-- Post Meta -->
					<div class="post-meta">
						<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
					</div>
				</div>
			</div>';

			}
            
		return 0;
		}
		
	}

	function chude($id,$page=null){

		ini_set('display_errors', 1);
	
		
		$baivietall =(new DB())->table("khoahoc")->dbAll()->where("id_chude",	explode( '-',$id)[0])->get(10)->getResult();
		$tatcabaiviet =(new DB())->table("khoahoc")->dbAll()->where("id_chude",	explode( '-',$id)[0])->get()->getResult();

		$pagi =0;
		if($page==null){
			$page=1;
		}

		$baivietall = array_slice($baivietall,($page-1)*10,$page*10);
		if(count($tatcabaiviet)>10){

			$sodu=count($tatcabaiviet)/10;
			if($sodu-(int)$sodu<0){
				$sodu+=1;
				$pagi=$sodu;
			}
		}

		$tenchude =(new DB())->table("chude")->dbAll()->where("id",	$baivietall[0]->id_chude)->get()->getResult();
	

		
		return view("site/chude",["page"=>$page,"tenchude"=>$tenchude[0]->tenchude,"danhsach5chude"=>self::$danhsach5chude,"danhsachchude"=>self::$danhsachchude,"danhsachxemnhieunhat"=>self::$danhsachxemnhieunhat,
		"allbaiviet"=>$baivietall,"pagi"=>$pagi]);
	}


	//--------------------------------------------------------------------

}
