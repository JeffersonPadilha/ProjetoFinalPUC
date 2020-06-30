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

$anexo = $_GET["anexo"];
$paciente_id = $_GET["paciente_id"];


$deletefile = "./../../upload/$anexo";
 
 $deletar = unlink ($deletefile);
 
 //APAGA IMAGEM NA DB
	$sql = "DELETE FROM anexos WHERE paciente_id='$paciente_id'";
	$result = $PDO->query( $sql );
	$result = null;
	
	header ("Location: ./../../index.php?atendente/gerenciar_paciente/edit/$paciente_id#list_anexos");
	

?>