<?php  if ( ! defined('BASEPATH')) exit('Acesso nao permitido!');

/*
| ------------------------------------------------- -------------------------
| Modos de arquivo e diretório
| ------------------------------------------------- -------------------------
|
| Essas prefs são usadas ao verificar e definir modos ao trabalhar
| com o sistema de arquivos. Os padrões são bons em servidores com
| segurança, mas você pode desejar (ou até precisar) alterar os valores em
| determinados ambientes (o Apache executando um processo separado para cada
| usuário, PHP sob CGI com Apache suEXEC, etc.). Os valores devem
| sempre ser usado para definir o modo corretamente.
|
*/


define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
| ------------------------------------------------- -------------------------
| Modos de fluxo de arquivos
| ------------------------------------------------- -------------------------
|
| Esses modos são usados ao trabalhar com fopen () / popen ()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb');
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b');
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* Fim do arquivo constants.php */
/* Local: ./application/config/constants.php */