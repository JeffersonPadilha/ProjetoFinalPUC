<?php  if ( ! defined('BASEPATH')) exit('Acesso nao permitido!');

/*
| -------------------------------------------------- -----------------
| CONFIGURAÇÕES DE CONECTIVIDADE DA BASE DE DADOS
| -------------------------------------------------- -----------------
| Este arquivo conterá as configurações necessárias para acessar seu banco de dados.
|
| Para obter instruções completas, consulte o 'Conexão com o banco de dados'
| página do Guia do Usuário.
|
| -------------------------------------------------- -----------------
| EXPLICAÇÃO DE VARIÁVEIS
| -------------------------------------------------- -----------------
|
| ['hostname'] O nome do host do seu servidor de banco de dados.
| ['username'] O nome de usuário usado para conectar-se ao banco de dados
| ['password'] A senha usada para conectar-se ao banco de dados
| ['database'] O nome do banco de dados ao qual você deseja se conectar
| ['dbdriver'] O tipo de banco de dados. ou seja: mysql. Atualmente suportado:
mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
| ['dbprefix'] Você pode adicionar um prefixo opcional, que será adicionado
| ao nome da tabela ao usar a classe Active Record
| ['pconnect'] TRUE / FALSE - se deseja usar uma conexão persistente
| ['db_debug'] TRUE / FALSE - se erros do banco de dados devem ser exibidos.
| ['cache_on'] TRUE / FALSE - Ativa / desativa o cache de consultas
| ['cachedir'] O caminho para a pasta em que os arquivos em cache devem ser armazenados
| ['char_set'] O conjunto de caracteres usado na comunicação com o banco de dados
| ['dbcollat'] O agrupamento de caracteres usado na comunicação com o banco de dados
| NOTA: Para bancos de dados MySQL e MySQLi, essa configuração é usada apenas
| como backup se o servidor estiver executando PHP <5.2.3 ou MySQL <5.0.7
| (e nas consultas de criação de tabela feitas com o DB Forge).
| Existe uma incompatibilidade no PHP com mysql_real_escape_string () que
| pode tornar seu site vulnerável à injeção de SQL se você estiver usando um
| conjunto de caracteres de vários bytes e versões em execução inferiores a estas.
| Sites usando o conjunto de caracteres e agrupamento de banco de dados Latin-1 ou UTF-8 não são afetados.
| ['swap_pre'] Um prefixo de tabela padrão que deve ser trocado com o dbprefix
| ['autoinit'] Se deve ou não inicializar automaticamente o banco de dados.
| ['stricton'] TRUE / FALSE - força as conexões 'Strict Mode'
| - bom para garantir SQL rigoroso ao desenvolver
|
| A variável $ active_group permite escolher qual grupo de conexões
| tornar ativa. Por padrão, há apenas um grupo (o grupo 'padrão').
|
| As variáveis ​​$ active_record permitem determinar se o carregamento deve ou não
| a classe de registro ativa
*/

$active_group = 'default';
$active_record = TRUE;
/**/
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'codsystem_base';
$db['default']['password'] = 'base123';
$db['default']['database'] = 'codsystem_base';


$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


/* Fim do arquivo database.php */
/* Local: ./application/config/database.php */