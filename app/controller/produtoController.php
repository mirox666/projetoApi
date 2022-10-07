<?php
namespace App\controller; // usando namespace para identificar a nossa classe
use App\model\ProdutoDAO;

class ProdutoController{
    public function get($id = null){
        $meuProduto = new ProdutoDAO();
        if($id){
            return $meuProduto->consultarUnico($id);
        }
        else{
            return $meuProduto->consultar();
        }  
    }
    
    public function post(){
        $meuProduto = new ProdutoDAO($_POST);
       return $meuProduto->inserir($_POST);
        //print_r($_POST);
    }

    public function put($id){
        $meuProduto = new ProdutoDAO();
        $dados = json_decode(file_get_contents('php://input'),true);//File_get_contentes é utilizado para pegar dados de algum lugar específico.
        return $meuProduto->atualizar($id,$dados);

        
    }

    public function delete($id){
        $meuProduto = new ProdutoDAO();
        return $meuProduto->delete($id);
         
    }
}