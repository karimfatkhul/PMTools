<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Enkripsi extends CI_Controller {
 
    /**
     * Enkripsi Page for this controller.
     *
     * digunakan untuk membuat library enkripsi codeigniter
     */
 
    public function __construct() {
        parent::__construct();
        $this->load->library('encryption');
    }
 
 
    public function index()
    {
        //sebuah string yang akan kita enkripsi
        $string = "nananina";
        $string2 = "Galang fly";

        //$phase1 = md5($string);

        $encript =  $this->encryption->encrypt($string); //enkripsi string
        $encript2 =  $this->encryption->encrypt($string2); //enkripsi string
         //dekripsi string (mengembalikan string ke semula setelah di enkripsi
 
       //echo $encript.'<br/>';
       $need_dec = '9ce510f8634f67195fb0583851f9cfa9952a2bbc7631e8e3056e48cf1925f96c54a53bb31831ba63f26f920a6e7d42b60d476bed64800bed96e7ea3ebf1bcbf5zVIZMpqtHMk0tBnLeOjIApSC9xTGLPeINARpoq1T6oA9NC1+sJf6wY2wN6YH9Wh3';
      // echo $phase1 = md5($encript).'<br/>';
       //echo $phase1 = md5($encript2).'<br/>';
       //echo $phase2 = md5($string).'<br/>';
        $decript = $this->encryption->decrypt($encript);
        echo $encript.'<br/>';
        //$decript2 = $this->encryption->decrypt($encript2);
        //echo $decript2.'<br/>';
        //echo $imageName = uniqid(rand());
        //$decripts = $this->encryption->decrypt($need_dec);
        //echo $decripts.'<br/>';
    }
}


