<?php defined('BASEPATH') OR exit('Acesso nao permitido!');
/*
| ------------------------------------------------- -------------------------
| Ativar / desativar migrações
| ------------------------------------------------- -------------------------
|
| As migrações estão desativadas por padrão, mas devem estar ativadas
| sempre que você pretende fazer uma migração de esquema.
|
*/
$config['migration_enabled'] = FALSE;


/*
| ------------------------------------------------- -------------------------
| Versão das migrações
| ------------------------------------------------- -------------------------
|
| Isso é usado para definir a versão de migração na qual o sistema de arquivos deve estar.
| Se você executar $this-> migration-> latest (), esta é a versão que o esquema irá
| ser atualizado.
|
*/
$config['migration_version'] = 0;


/*
| ------------------------------------------------- -------------------------
| Caminho das migrações
| ------------------------------------------------- -------------------------
|
| Caminho para sua pasta de migrações.
| Normalmente, ele estará dentro do caminho do aplicativo.
| Além disso, é necessária permissão de gravação no caminho das migrações.
|
*/
$config['migration_path'] = APPPATH . 'migrations/';


/* Fim do arquivo migration.php */
/* Local: ./application/config/migration.php */