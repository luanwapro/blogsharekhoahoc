<?php namespace app\controllers;
use App\Controllers\BaseController;
use App\Controllers\DB;



class Admin extends BaseController{
    function __construct()
    {


    }
    static $ran=array();
    static $thinghiem="";
    public function login(){
        $db = \Config\Database::connect();
        $request = service('request');
        if( $request->getMethod()=="get"){

            return view("admin/adminLogin");

        } else{


            if($request->getPost("email")){

               helper("check");
               $check=loginAdmin($request->getPost("email"),$request->getPost("pass"));
               echo $check;
              if($check==1){

              }elseif($check==0){
                  return  redirect()->to("login");
              }

            }

        }
    }
    public function resetPassword(){
        $session = \Config\Services::session();
        $request = service("request");
        if($request->getMethod()=="post"){



          if($request->getPost('csrf_test_name')!=null){
              $name = $session->get($request->getPost('csrf_test_name')."a");
              if($request->getPost('email')==$name["email"]&&$request->getPost('code')==$name["ran"]){

                  echo "hihi";

              }else{
                return redirect()->to('password');
              }
          }elseif($request->getPost('csrf')!=null){
              $a=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
              $ran =["ran"=>$a,
                  "email"=>$request->getPost('email')];
              $session->set($request->getPost('csrf')."a",$ran );

             echo  $request->getPost('csrf')."a";

              $session->markAsTempdata($request->getPost('csrf')."a", 60);


              self::sendMail($request->getPost('email'),$a);
          }




        }else{



                return view("admin/resetPassword");


//           return view("admin/resetPassword");
        }


        $session->destroy();
    }
    public function sendMail($emaila=null,$noidung=null){
        $email = \Config\Services::email();
        $config['protocol'] = 'smtp';
        $config['SMTPHost'] = 'smtp.mailtrap.io';
        $config['SMTPUser']  = 'f30320fb67339f';
        $config['SMTPPass'] = '5ebdcb6e66f6cc';
        $config['SMTPPort'] = 2525;


        $email->initialize($config);
        $email->setFrom('kingminhluan9@gmail.com', 'xin chào');
        $email->setTo("kingminhluan9@gmail.com");
        $email->setCC('another@another-example.com');
        $email->setBCC('them@their-example.com');

        $email->setSubject('Email Test');
//        $body =view("mail",['rand'=>$noidung],true);
        $view = \Config\Services::renderer();

        $email->setMessage(view('mail',['rand'=>$noidung]) );


        $email->send();

    }

     public function quanlybaiviet(){
        ini_set('display_errors', 1);
        $request = service("request");
    
  
       

     
        if($request->getMethod()=="post"){
            
            
            if($request->getPost("linkbaiviet")!=null){
              
            $thembaiviet =(new DB())->table("khoahoc");
            $anh = $request->getFile("anhbaiviet");
            if($anh->isValid() && !$anh->hasMoved()){
                $anh->move("./uploads/images");

                $filename="uploads/images/".$anh->getName();
                $date=date('Y/m/d H:i:s');
                $thembaiviet->insert("'','{$request->getPost("chude")}','{$request->getPost("tenkhoahoc")}','{$request->getPost("linkcmt")}','{$request->getPost("linkbaiviet")}', '{$request->getPost("themnoidung")}','{$filename}',' $date','0'");
            }
       
    
          
        }else if($request->getPost("idchudecanxoa")!=null){

            (new DB())->table("khoahoc")->delete("id=".$request->getPost("idchudecanxoa"));
           
        }

        }
        $danhsachchude =(new DB())->table("chude")->get();
        $baiviet = (new DB())->table("khoahoc")->get();

    
      return view('admin/adminquanlybaiviet',['baiviet'=>$baiviet,'danhsachchude1'=>$danhsachchude]);
     }

    public function quanlychude(){
        ini_set('display_errors', 1);
        $chude = (new DB())->table("chude");
        $request = service("request");
        if($request->getMethod()=="post"){
            if($request->getPost("chude")!=null){


                $capchude =(int)$request->getPost("capchude");

                if($request->getPost("chudecha")!=null) {
                   $chude->insert("'','{$request->getPost("chude")}','{$capchude}','{$request->getPost("chudecha")}'");
               
                }else{
                    $chude->insert("'','{$request->getPost("chude")}','{$capchude}',0");
                }

                return  redirect()->to("/quanlychude");
            }
            if($request->getPost("idchudecanxoa")!=null){

                $chude->delete("id=".$request->getPost("idchudecanxoa"));
               
            }
            if($request->getPost("chudecantim")!=null){

                $ds=$chude->where("tenchude like %".$request->getPost("chudecantim")."%")->get();
                foreach ($ds as $value){
                    if($value->cap==1)
                        echo "<option value='".$value->id."'>".$value->tenchude."-".$value->id."</option>";
                }
            }

        }else{

        
            $danhsachchude=$chude->get();

            return view('admin/adminquanlychude',['chude'=>$danhsachchude]);
        }

    }


}
