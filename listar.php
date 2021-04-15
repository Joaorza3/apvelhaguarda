<?php 

include_once('conexao.php');

$busca = '%' .$_GET['busca']. '%';

$query = $pdo->query("SELECT * from users where nameInstituicao LIKE '$busca'");

 $res = $query->fetchAll(PDO::FETCH_ASSOC);

 	for ($i=0; $i < count($res); $i++) { 
      foreach ($res[$i] as $key => $value) {
      }
 		$dados[] = array(
 			'id' => $res[$i]['id'],
 			'nameInstituicao' => $res[$i]['nameInstituicao'],
			'endereco' => $res[$i]['endereco'],
            'cep' => $res[$i]['cep'],
            'numero' => $res[$i]['numero'],
            'cidade' => $res[$i]['cidade'],
            'estado' => $res[$i]['estado'],
            'email' => $res[$i]['email'],
            'usuario' => $res[$i]['usuario'],
            'senha' => $res[$i]['senha'],
            'telefone' => $res[$i]['telefone'],
            'nomeresponsavel' => $res[$i]['nomeresponsavel'],


           
            
        
 		);

 		}

        if(count($res) > 0){
                $result = json_encode(array('success'=>true, 'result'=>$dados));

            }else{
                $result = json_encode(array('success'=>false, 'result'=>'0'));

            }
            echo $result;

 ?>