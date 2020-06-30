<?php
//DEFINE AS CONEXAO SQL
define( 'SQL_HOST', 'localhost' );
define( 'SQL_USER', 'codsystem_base' );
define( 'SQL_PASSWORD', 'base123' );
define( 'SQL_DB_NAME', 'codsystem_base' );
define( 'DRIVER', 'mysql' );


//CONECTA SQL
try
{
    $PDO = new PDO( DRIVER .':host=' . SQL_HOST .';dbname=' . SQL_DB_NAME, SQL_USER, SQL_PASSWORD );
}
catch ( PDOException $e )
{
    echo 'Erro ao conectar com o SQL: ' . $e->getMessage();
}

$paciente_id = $_GET["paciente_id"];
$descricao	 = $_POST["descricao"];


// Gerando nome aleatório para a imagem
$nome = md5(uniqid(time()));

$uploadfile = "./../../upload/$nome.jpg";

if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadfile)) {
 
 $data = date("Y-m-d");
 //INSERE IMAGEM NA DB
	$sql = "INSERT INTO anexos(anexo_id, paciente_id, descricao, patch, data_envio) VALUES ('', '$paciente_id', '$descricao', '$nome.jpg', '$data')";
	$result = $PDO->query( $sql );
	$result = null;
	
	header ("Location: ./../../index.php?atendente/gerenciar_paciente/edit/$paciente_id#list_anexos");
	
	
	
} else { }



	
	

?>