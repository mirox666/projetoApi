<?php
namespace App\model;
use App\model\Conexao;

class ProdutoDAO{
    private $tabela = "produto";

    public function consultar(){
        $comando = "SELECT * FROM {$this->tabela}";

        $preparacao = Conexao::getConexao()->prepare($comando);

        $preparacao->execute();

        if($preparacao->rowCount()>0){
            return $preparacao->fetchAll(\PDO::FETCH_ASSOC);
        }
        else{
            throw new \Exception("Nenhum dado encontrado"); // Estamos lançando um erro para ser tratado pelo catch.
        }
    }

}