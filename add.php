<?php 

include_once('conexao.php');

$postjson = json_decode(file_get_contents("php://input"), true);

 
 $query_buscar = $pdo->query("SELECT * from users where email = '$postjson[email]' ");
 $dados_buscar = $query_buscar->fetchAll(PDO::FETCH_ASSOC);
 if(@count($dados_buscar) > 0){
 	 $result = json_encode(array('success'=>'Email já Cadastrado!'));
 	 echo $result;
 	 exit();
 }else{
 	$query = $pdo->prepare("INSERT INTO users SET nameInstituicao= :nameInstituicao, endereco= :endereco,cep= :cep,numero= :numero, cidade= :cidade, estado= :estado, email= :email, usuario= :usuario, senha= :senha, telefone= :telefone, nomeresponsavel= :nomeresponsavel");
   
       $query->bindValue(":nameInstituicao", $postjson['nameInstituicao']);
       $query->bindValue(":endereco", $postjson['endereco']);
       $query->bindValue(":cep", $postjson['cep']);
       $query->bindValue(":numero", $postjson['numero']);
       $query->bindValue(":cidade", $postjson['cidade']);
       $query->bindValue(":estado", $postjson['estado']);
       $query->bindValue(":email", $postjson['email']);
       $query->bindValue(":usuario", $postjson['usuario']);
       $query->bindValue(":senha", $postjson['senha']);
       $query->bindValue(":telefone", $postjson['telefone']);
       $query->bindValue(":nomeresponsavel", $postjson['nomeresponsavel']);
      
       $query->execute();
  
             
  
      if($query){
        $result = json_encode(array('success'=>true));
  
        }else{
        $result = json_encode(array('success'=>false));
    
        }

        echo $result;
 }

 
     


?>