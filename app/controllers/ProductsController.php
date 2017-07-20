<?php

class ProductsController extends BaseController {

   public function run()
	{


        $data = ['name1'=>$_POST['name1'],'name2'=>$_POST['name2'],'name3'=>$_POST['name3']];;

        $inp = file_get_contents('data.json');
        $tempArray = json_decode($inp);
        if(!$tempArray) {
            file_put_contents('data.json', "[]");
        }
        $tempArray = json_decode(file_get_contents('data.json'));
        array_push($tempArray, $data);
        $jsonData = json_encode($tempArray);
        file_put_contents('data.json', $jsonData);
        return $jsonData;
    }

}
