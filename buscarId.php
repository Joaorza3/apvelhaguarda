<?php 

include_once('conexao.php');

$id = $_GET['id'];

$query = $pdo->query("SELECT * from users where id = '$id'");

 $res = $query->fetchAll(PDO::FETCH_ASSOC);

 	for ($i=0; $i < count($res); $i++) { 
      foreach ($res[$i] as $key => $value) {
      }
 		
    $id = $res[$i]['id'];
    $nameInstituicao = $res[$i]['nameInstituicao'];
    $endereco = $res[$i]['endereco'];
    $cep = $res[$i]['cep'];
    $numero = $res[$i]['numero'];
    $cidade = $res[$i]['cidade'];
    $estado = $res[$i]['estado'];
    $email = $res[$i]['email'];
    $senha = $res[$i]['senha'];
    $telefone = $res[$i]['telefone'];
    $nomeresponsavel = $res[$i]['nomeresponsavel'];
 		}

        if(count($res) > 0){
                $result = json_encode(array('success'=>true, 'id'=>$id, 'nameInstituicao'=>$nameInstituicao, 'endereco'=>$endereco, 'cep'=>$cep,'numero'=>$numero,'cidade'=>$cidade,'estado'=>$estado,'email'=>$email,'senha'=>$senha,'telefone'=>$telefone,'nomeresponsavel'=>$nomeresponsavel ));

            }else{
                $result = json_encode(array('success'=>false, 'result'=>'0'));

            }
            echo $result;

 ?>