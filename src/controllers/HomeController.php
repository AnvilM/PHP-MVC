<?php


namespace src\controllers;

use mysqli;
use src\core\Controller;
use src\core\Model;

Class HomeController extends Controller{

    public function ShiftAction(){
        
   
        $this->View->render();
    }  
    
    public function ShiftPOSTAction(){
        if(isset($_POST['src']) && $_POST['src'] != ""){
    
            $src = $_POST['src'];
            $shift = '';
            $table_size = 2;

            //определение размеров рещётки
            for($i=2; $i < strlen($src); $i+=2){
                
                if($i*$i > strlen($src)){$table_size = $i; break;}
                
            }

            //заполение строки
            if(strlen($src) < $table_size*$table_size){
                $alphabet = "abcdefghigklmnopqastuvwxyz";
                for($i = $table_size*$table_size - strlen($src); $i > 0; $i--){
                    $src = $src.$alphabet[rand(0, strlen($alphabet)-1)];
                }
            }
            //заполнение таблицы нулями
            $table = [];
            for($i = 0; $i < $table_size; $i++){
                for($j = 0; $j < $table_size; $j++){
                    $table[$i][$j] = 0;
                }
            }

            //Определение индексов, для заполнения таблицы

            $indexs = [];

            echo '<pre>';
            for($k=0; $k < 4; $k++){
                switch($k){
                    case 0:
                        $a = true;
                        $i = 0;
                        break;
                    case 1:
                        $a = false;
                        $i = 0;
                        break;
                    case 2:
                        $a = false;
                        $i = 1;
                        break;
                    case 3:
                        $a = true;
                        $i = 1;
                        break;
                }
                
                //строка
                for($i; $i < $table_size; $i+=2){
                    
                    //элемент
                    if($a == true){$j = 0;}
                    else{$j = 1;}

                    for($j; $j < $table_size; $j+=2){
                        array_push($indexs, [$i, $j]);
                    }

                    if($a == true){$a = false;}
                    else{$a = true;}
                }

            }

            //Заполнение таблицы
            for($i = 0; $i < count($indexs); $i++){
                $table[$indexs[$i][0]][$indexs[$i][1]] = $src[$i];
            }
            
            // //Вывод таблицы
            for($i=0; $i < $table_size; $i++){
                for($j=0; $j < $table_size; $j++){
                    $shift = $shift.$table[$j][$i];
                }
            }

            echo $shift;



        }



    }

    public function DecodePOSTaction(){
        if(isset($_POST['src']) && $_POST['src'] != ""){
    
            $shift = $_POST['src'];
            $src = '';
            $table_size = 0;
            //определение размеров таблицы
            for($i=0; $i < strlen($shift); $i+=2){
                if($i*$i == strlen($shift)){$table_size = $i; break;}
            }
            
            if($table_size == 0){header('Location: /Shift?err');}
            

           //Заполнение таблицы
           $table = [];
           $k=0;
            for($i = 0; $i < $table_size; $i++){
                for($j = 0; $j < $table_size; $j++){
                    $table[$i][$j] = $shift[$k];
                    $k++;
                }
            }



            //Определение индексов для расшифровки.
            $indexs = [];

            echo '<pre>';
            for($k=0; $k < 4; $k++){
                switch($k){
                    case 0:
                        $a = true;
                        $i = 0;
                        break;
                    case 1:
                        $a = false;
                        $i = 0;
                        break;
                    case 2:
                        $a = false;
                        $i = 1;
                        break;
                    case 3:
                        $a = true;
                        $i = 1;
                        break;
                }
                
                //строка
                for($i; $i < $table_size; $i+=2){
                    
                    //элемент
                    if($a == true){$j = 0;}
                    else{$j = 1;}

                    for($j; $j < $table_size; $j+=2){
                        array_push($indexs, [$i, $j]);
                    }

                    if($a == true){$a = false;}
                    else{$a = true;}
                }

            }


            //Расшифровка таблицы
            for($i = 0; $i < count($indexs); $i++){
                $src[$i] = $table[$indexs[$i][1]][$indexs[$i][0]];
            }

            echo $src;




            
           
        }
    }
} 