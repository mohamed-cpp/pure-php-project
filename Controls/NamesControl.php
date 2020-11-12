<?php

include_once "Models/Names.php";


class NamesControl
{

    public function index(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        $name = new Names();
        $all = $name->getAll();
        if ($all){
            echo json_encode($all);
            die();
        }
        header("HTTP/1.0 404 Not Found");
        echo json_encode("No Data Found");
    }
    public function create(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $data = json_decode(file_get_contents("php://input"),true);
        $name = new Names();
        $create = $name->create($data);

        if($create) {
            echo json_encode(['message' => 'Created']);
            die();
        }
        header("HTTP/1.0 505 Error Server");
        echo json_encode(['message' => 'Not Created']);
    }
    public function delete($id){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        $name = new Names();
        $name = $name->destroy($id);
        if ($name){
            echo $name;
            die();
        }
        header("HTTP/1.0 404 Not Found");
        echo json_encode(['message'=> "Unsuccessfully" ]);
    }

}