<?php namespace App\Controllers;

use CodeIgniter\Controller;

class DB extends Controller
{
    static $table="";

    static $conn;
    static $db;
    static $config;
    static $nametb;
    function __construct()
    {
        self::$conn = \Config\Database::connect();
    }


    function connection(){
       self::$conn = \Config\Database::connect();

        return  self::$conn;
    }
    function queryDB($query){
        self::$conn->query($query);
    }
    function insert($data,$column=null,$where=null){

        if($column==null){

          self::$conn->query("insert into ".self::$nametb." "." values(".$data." )");


   
        }else{
            
            self::$conn->query("insert into ".self::$nametb."(".$column.")"." values( ".$data." )");

        }

    }
    function delete($where){

        if (self::$conn->query("DELETE FROM ".self::$nametb."  where ".$where) === TRUE) {
            echo "delete successfully";
        }else {
            echo "Error: " ;
        }
    }
    function  update($column,$where){
        self::$conn->query("UPDATE `chude` SET ".$column.$where!=null?" where".$where:" ");
    }
    function table($nametable){

            self::$table = "select * from ".$nametable;
            self::$nametb=$nametable;



        return new static();
    }

    function where($where){
       
            if (self::$table != "") {
                if (substr_count(self::$table, "where") > 0) {
                    self::$table .= " and " . $where;
                } else {
                    self::$table .= " where " . $where;
                }
                 

            } else {
                echo "error: not found table";
            }
        
    
        return new static();
    }
    function orwhere($where){
        if(self::$db=="mysql") {
            if (self::$table != "") {
                self::$table .= " or " . $where;
            } else {
                echo "error: not found table";
            }
        }
        return new static();
    }
    function join($table,$frist,$operator,$second,$where=null){

        if(self::$db=="mysql") {
            if (!is_bool(mysqli_query(self::$conn, self::$table))) {
                self::$table .= " INNER JOIN " . $table . " on " . $frist . "  " . $operator . " " . $second . " " . $where . " ";
            } else {
                echo "error: not found table";
            }
        }
        return new static();
    }
    function groupBy($groupBy,$having){
        if(self::$db=="mysql") {
            self::$table .= " " . $groupBy . " HAVING " . $having . " ";
        }
        return new static();
    }
    function oderBy($column,$type,$where=null){
        if(self::$db=="mysql") {
            self::$table .= " order by " . $where . " " . $column . " " . $type . " ";
            return new  static();
        }
        return new static();
    }
    function get($number=null)
    {

            try {


                if (is_int($number)) {




                return    self::$conn->table(self::$nametb)->get($number)->getResult();



                } else if (!is_int($number)) {



                    return    self::$conn->table(self::$nametb)->get()->getResult();

                }


            } catch (Exception $exception) {

                echo $exception;
            }

        }
        function dbAll(){
            return    self::$conn->table(self::$nametb);
        }


}