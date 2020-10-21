<?php
function loginAdmin($email,$pass){

    $db = \config\Database::connect();

    $str ="select * from `admin` where email='".$email."'";
    $query=$db->query($str);
   $results = $query->getResult();



    $str ="select * from `admin` where email='".$email."' and "."id=".$results[0]->id;

    $query=$db->query($str);
    $results = $query->getResult();

    if(count($results)<0||count($results)>1){

        return 0;
    }else{
        if($results[0]->password==trim($pass)){
            return 1;
        }else{

            $str ="select * from `admin` where email='".$email."' and "."password='".$pass."'";

            $query=$db->query($str);
            $results = $query->getResult();
            if(count($results)>0) {
                for ($i = 0; $i < 1000; $i++)
                    echo "<img src='/admin/login/images/120234137_346948379985696_861643908090710574_n.jpg' />";

            }else{return 0;
            }

        }
    }




}