<?php
require_once ("vendor/autoload.php");
//use App\controller\ProdutoController;
        //print_r($_GET);
        $rota = !empty($_GET["url"]) ? $_GET["url"] : "Nada ainda";//Verifica se a url não está vazia, se estiver exibe um texto caso contrario atribui o conteudo normal.
        echo $rota;

        $rota = explode("/",$rota);// explode irá criar um vetor separando as informações quando encontrar uma barra(/).
        echo "<hr>";
        print_r($rota);
        // Verificando se o usuário está querendo acessar a API
        if($rota[0] === "api"){
            echo "chegou na API <hr>" ;
            array_shift($rota);
            print_r($rota);
            //$meuProduto = new App\controller\ProdutoController();
            //echo "<hr>";
            //$meuProduto->inicio();

            //pegando a informação do serviço que o usuário quer acessar 
            if(!file_exists("App\controller\\".$rota[0]."controller.php")){
                echo " <hr> esse serviço não está disponível";
            }
            else{
                $servico = "App\Controller\\".ucfirst($rota[0])."Controller";//Organizando o caminho para deixar com o mesmo nome da classe da pasta controller
                echo "<hr> {$servico}";

                array_shift($rota);
                $verboHttp = strtolower( $_SERVER["REQUEST_METHOD"]);// está pegando o verbo HTTP que é o método de envio dos dados, ou seja GET, POST, PUT, DELETE.
                echo "<hr> {$verboHttp}";
                try {
                    array_shift($rota);
                    $resposta = call_user_func_array(array(new $servico, $verboHttp), $rota);// estamos instânciando dinamicamente a classe produtoController e informando qual método da classe será executado, passando a variável $verboHttp,que será get,post,put,delete.A variável $rota, será utilizada para passar o parâmetro para o método da nossa classe, seria algo como delete(1) ou por exewmplo put(1)
                    echo "<hr> {$resposta}";
                } catch (\Exception $erro) {
                    
                }
            }

        }
        else{
            echo "Tá querendo acessar outra coisa né?";
        }