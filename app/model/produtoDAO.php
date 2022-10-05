<?php
namespace App\model;
use App\model\Conexao;

class ProdutoDAO{
    private $tabela = "produto";
    //get
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
    //post
    public function inserir ($dados){
        $comando = "INSERT INTO {$this->tabela} VALUES(NULL,:nome,:preco,:info)";

        $preparacao = Conexao::getConexao()->prepare($comando);

        $preparacao->bindValue(":nome",$dados["nome_produto"]);
        $preparacao->bindValue(":preco",$dados["preco_produto"]);
        $preparacao->bindValue(":info",$dados["info_produto"]);

        $preparacao->execute();

        if($preparacao->rowCount()>0){
            return "Dados cadastrados com sucesso";
        }
        else{
            throw new \Exception("Erro ao cadastrar as informações");
        }


    }
}