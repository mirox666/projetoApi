<?php
namespace App\controller; // usando namespace para identificar a nossa classe

class ProdutoController{
    public function get(){
        return "Estou no método get";
    }

    public function post(){
        "Estou no método post";
    }

    public function put($id){
        "Estou no método put";
    }

    public function delete($id){
        "Estou no método delete";
    }
}