<?php
namespace App\controller; // usando namespace para identificar a nossa classe
use App\model\ProdutoDAO;

class ProdutoController{
    public function get(){
        $meuProduto = new ProdutoDAO();
       return $meuProduto->consultar();
    }

    public function post(){
        $meuProduto = new ProdutoDAO($_POST);
       return $meuProduto->inserir($_POST);
        //print_r($_POST);
    }

    public function put($id){
        "Estou no método put";
    }

    public function delete($id){
        "Estou no método delete";
    }
}