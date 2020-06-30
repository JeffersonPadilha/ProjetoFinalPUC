<?php  if ( ! defined('BASEPATH')) exit('Acesso nao permitido!');
/*
| -------------------------------------------------- -----------------
| CARREGADOR AUTOMÁTICO
| -------------------------------------------------- -----------------
| Este arquivo especifica quais sistemas devem ser carregados por padrão.
|
| Para manter a estrutura o mais leve possível, apenas os
| recursos mínimos absolutos são carregados por padrão. Por exemplo,
| o banco de dados não está conectado automaticamente desde que nenhuma suposição
| é feito sobre se você pretende usá-lo. Este arquivo permite
| você define globalmente quais sistemas gostaria de carregar com todos os
| solicitação.
|
| -------------------------------------------------- -----------------
| Instruções
| -------------------------------------------------- -----------------
|
| Estas são as coisas que você pode carregar automaticamente:
|
| 1. Pacotes
| 2. Bibliotecas
| 3. arquivos auxiliares
| 4. Arquivos de configuração personalizados
| 5. Arquivos de Idiomas
| 6. Modelos
|
*/

/*
| -------------------------------------------------- -----------------
| Carregar pacotes automaticamente
| -------------------------------------------------- -----------------
| Protótipo:
|
| $ autoload ['packages'] = array (APPPATH.'third_party ',' / usr / local / shared ');
|
*/

$autoload['packages'] = array();

/*
| -------------------------------------------------- -----------------
| Carregar bibliotecas automaticamente
| -------------------------------------------------- -----------------
| Estas são as classes localizadas na pasta system / libraries
| ou na sua pasta de aplicativos / bibliotecas.
|
| Protótipo:
|
| $autoload ['libraries'] = array ('banco de dados', 'sessão', 'xmlrpc');
*/

$autoload['libraries'] = array('session','pagination', 'xmlrpc' , 'form_validation', 'email','upload','encrypt','paypal');


/*
| -------------------------------------------------- -----------------
| Carregar arquivos auxiliares automaticamente
| -------------------------------------------------- -----------------
| Protótipo:
|
| $autoload ['helper'] = array ('url', 'file');
*/

$autoload['helper'] = array('url','file','form','security','string','inflector','directory','download','multi_language');


/*
| -------------------------------------------------- -----------------
| Carregar arquivos de configuração automaticamente
| -------------------------------------------------- -----------------
| Protótipo:
|
| $autoload ['config'] = array ('config1', 'config2');
|
| NOTA: Este item deve ser utilizado SOMENTE se você tiver criado
| arquivos de configuração. Caso contrário, deixe em branco.
|
*/

$autoload['config'] = array();

/*
| -------------------------------------------------- -----------------
| Carregar arquivos de idioma automaticamente
| -------------------------------------------------- -----------------
| Protótipo:
|
| $autoload ['language'] = matriz ('lang1', 'lang2');
|
| NOTA: Não inclua a parte "_lang" do seu arquivo. Por exemplo
| "codeigniter_lang.php" seria referenciado como array ('codeigniter');
|
*/

$autoload['language'] = array();

/*
| -------------------------------------------------- -----------------
| Modelos de carregamento automático
| -------------------------------------------------- -----------------
| Protótipo:
|
|	$autoload['model'] = array('model1', 'model2');
|
*/

$autoload['model'] = array('language' , 'email_model' , 'crud_model');


/* Fim do arquivo autoload.php */
/* Local: ./application/config/autoload.php */