<?php  if ( ! defined('BASEPATH')) exit('Acesso nao permitido!');

/*
| ------------------------------------------------- -------------------------
| URL do site base
| ------------------------------------------------- -------------------------
|
| URL para sua raiz do CodeIgniter. Normalmente, este será o seu URL base,
| COM uma barra à direita:
|
| http://example.com/
|
| Se isso não estiver definido, o CodeIgniter adivinhará o protocolo, domínio e
| caminho para sua instalação.
|
*/


$config['base_url']	= '';

/*
|--------------------------------------------------------------------------
| Arquivo Index
|--------------------------------------------------------------------------
|
| Normalmente, esse será o seu arquivo index.php, a menos que você o renomeou para
| algo mais. Se você estiver usando o mod_rewrite para remover a página, configure este
| variável para que fique em branco.
|
*/
$config['index_page'] = 'index.php?';

/*
|--------------------------------------------------------------------------
| PROTOCOLO URI
|--------------------------------------------------------------------------
|
| Este item determina qual servidor global deve ser usado para recuperar o
| String de URI. A configuração padrão de 'AUTO' funciona para a maioria dos servidores.
|
| 'AUTO'			Default - detecta automaticamente
| 'PATH_INFO'		Use o PATH_INFO
| 'QUERY_STRING'	Use o QUERY_STRING
| 'REQUEST_URI'		Use o REQUEST_URI
| 'ORIG_PATH_INFO'	Use o ORIG_PATH_INFO
|
*/
$config['uri_protocol']	= 'QUERY_STRING';

/*
| ------------------------------------------------- -------------------------
| Sufixo de URL
| ------------------------------------------------- -------------------------
|
| Esta opção permite adicionar um sufixo a todos os URLs gerados pelo CodeIgniter.
| Para mais informações, consulte o guia do usuário:
|
| http://codeigniter.com/user_guide/general/urls.html
*/

$config['url_suffix'] = '';

/*
| ------------------------------------------------- -------------------------
| Idioma padrão
| ------------------------------------------------- -------------------------
|
| Isso determina qual conjunto de arquivos de idioma deve ser usado. Certificar-se de que
| existe uma tradução disponível se você pretende usar algo diferente
| do que portugues.
|
*/
$config['language']	= 'portuguese';

/*
| ------------------------------------------------- -------------------------
| Conjunto de caracteres padrão
| ------------------------------------------------- -------------------------
|
| Isso determina qual conjunto de caracteres é usado por padrão em vários métodos
| que exigem que um conjunto de caracteres seja fornecido.
|
*/
$config['charset'] = 'UTF-8';

/*
| ------------------------------------------------- -------------------------
| Ativar / desativar hooks do sistema
| ------------------------------------------------- -------------------------
|
| Se você deseja usar o recurso 'hooks', deve habilitá-lo
| definindo esta variável como TRUE (booleano). Consulte o guia do usuário para obter detalhes.
|
*/
$config['enable_hooks'] = FALSE;


/*
| ------------------------------------------------- -------------------------
| Prefixo de extensão de classe
| ------------------------------------------------- -------------------------
|
| Este item permite definir o prefixo nome do arquivo / nome da classe ao estender
| bibliotecas nativas. Para mais informações, consulte o guia do usuário:
|
| http://codeigniter.com/user_guide/general/core_classes.html
| http://codeigniter.com/user_guide/general/creating_libraries.html
|
*/
$config['subclass_prefix'] = 'MY_';


/*
| ------------------------------------------------- -------------------------
| Caracteres de URL permitidos
| ------------------------------------------------- -------------------------
|
| Isso permite que você especifique com uma expressão regular quais caracteres são permitidos
| dentro dos seus URLs. Quando alguém tenta enviar um URL com não permitido
| caracteres, eles receberão uma mensagem de aviso.
|
| Como medida de segurança, você é fortemente encorajado a restringir URLs a
| o menor número possível de caracteres. Por padrão, apenas estes são permitidos: a-z 0-9 ~%.: _-
|
| Deixe em branco para permitir todos os caracteres - mas apenas se você for louco.
|
| NÃO MUDE ISTO A MENOS QUE VOCÊ COMPREENDE TODAS AS REPERCUSSÕES !!
|
*/
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';


/*
| ------------------------------------------------- -------------------------
| Ativar cadeias de consulta
| ------------------------------------------------- -------------------------
|
| Por padrão, o CodeIgniter usa URLs baseados em segmentos compatíveis com o mecanismo de pesquisa:
| example.com/who/what/where/
|
| Por padrão, o CodeIgniter permite o acesso à matriz $ _GET. Se por algum
| motivo pelo qual você deseja desativá-lo, defina 'allow_get_array' como FALSE.
|
| Opcionalmente, é possível ativar URLs padrão baseados em cadeias de consulta:
| example.com?who=me&what=something&where=here
|
| As opções são: TRUE ou FALSE (booleano)
|
| Os outros itens permitem definir a string de consulta 'palavras' que
| chame seus controladores e suas funções:
| example.com/index.php?c=controller&m=function
|
| Observe que alguns dos auxiliares não funcionarão conforme o esperado quando
| esse recurso está ativado, pois o CodeIgniter foi projetado principalmente para
| use URLs baseados em segmento.
|
*/
$config['allow_get_array']		= TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger']	= 'c';
$config['function_trigger']		= 'm';
$config['directory_trigger']	= 'd'; // experimental not currently in use

/*
| ------------------------------------------------- -------------------------
| Limite de log de erro
| ------------------------------------------------- -------------------------
|
| Se você ativou o log de erros, pode definir um limite de erro para
| determinar o que é registrado. As opções de limite são:
| Você pode habilitar o log de erros definindo um limite acima de zero. o
| O limite determina o que é registrado. As opções de limite são:
|
| 0 = Desativa o log, log de erro DESLIGADO
| 1 = Mensagens de erro (incluindo erros de PHP)
| 2 = Mensagens de depuração
| 3 = Mensagens informativas
| 4 = Todas as mensagens
|
| Para um site ativo, você normalmente só habilita o registro de erros (1), caso contrário
| seus arquivos de log serão preenchidos muito rapidamente.
|
*/
$config['log_threshold'] = 1;

/*
| ------------------------------------------------- -------------------------
| Erro ao registrar o caminho do diretório
| ------------------------------------------------- -------------------------
|
| Deixe este campo em branco, a menos que você queira definir algo diferente do padrão
| aplicativo / logs / pasta. Use um caminho completo do servidor com barra final.
|
*/
$config['log_path'] = '';

/*
| ------------------------------------------------- -------------------------
| Formato de data para logs
| ------------------------------------------------- -------------------------
|
| Cada item registrado tem uma data associada. Você pode usar a data do PHP
| códigos para definir sua própria formatação de data
|
*/
$config['log_date_format'] = 'Y-m-d H:i:s';

/*
| ------------------------------------------------- -------------------------
| Caminho do diretório de cache
| ------------------------------------------------- -------------------------
|
| Deixe este campo em branco, a menos que você queira definir algo diferente do padrão
| system/cache/ folder. Use um caminho completo do servidor com barra final.
|
*/

$config['cache_path'] = '';

/*
| ------------------------------------------------- -------------------------
| Chave de encriptação
| ------------------------------------------------- -------------------------
|
| Se você usa a classe Criptografia ou Sessão, você
| DEVE definir uma chave de criptografia. Consulte o guia do usuário para obter informações.
|
*/
$config['encryption_key'] = 'school_management_system';

/*
| ------------------------------------------------- -------------------------
| Variáveis de sessão
| ------------------------------------------------- -------------------------
|
| 'sess_cookie_name' = o nome que você deseja para o cookie
| 'sess_expiration' = o número de SEGUNDOS que você deseja que a sessão dure.
| por padrão, as sessões duram 7200 segundos (duas horas). Defina como zero sem expiração.
| 'sess_expire_on_close' = Se a sessão expira automaticamente
| quando a janela do navegador é fechada
| 'sess_encrypt_cookie' = Criptografar o cookie
| 'sess_use_database' = Se deseja salvar os dados da sessão em um banco de dados
| 'sess_table_name' = O nome da tabela do banco de dados da sessão
| 'sess_match_ip' = Se deve corresponder ao endereço IP do usuário ao ler os dados da sessão
| 'sess_match_useragent' = Se deve corresponder ao User Agent ao ler os dados da sessão
| 'sess_time_to_update' = quantos segundos entre o IC atualizando as informações da sessão
|
*/
$config['sess_cookie_name']		= 'ci_session';
$config['sess_expiration']		= 7200;
$config['sess_expire_on_close']	= FALSE;
$config['sess_encrypt_cookie']	= FALSE;
$config['sess_use_database']	= FALSE;
$config['sess_table_name']		= 'ci_sessions';
$config['sess_match_ip']		= FALSE;
$config['sess_match_useragent']	= TRUE;
$config['sess_time_to_update']	= 300;

/*
| ------------------------------------------------- -------------------------
| Variáveis relacionadas a cookies
| ------------------------------------------------- -------------------------
|
| 'cookie_prefix' = Defina um prefixo se você precisar evitar conflitos
| 'cookie_domain' = Defina como .seudominio.com.br para cookies em todo o site
| 'cookie_path' = Normalmente será uma barra
| 'cookie_secure' = Os cookies serão definidos apenas se houver uma conexão HTTPS segura.
|
*/
$config['cookie_prefix']	= "";
$config['cookie_domain']	= "";
$config['cookie_path']		= "/";
$config['cookie_secure']	= FALSE;

/*
| ------------------------------------------------- -------------------------
| Filtragem Global XSS
| ------------------------------------------------- -------------------------
|
| Determina se o filtro XSS está sempre ativo quando GET, POST ou
| Dados COOKIE são encontrados
|
*/
$config['global_xss_filtering'] = TRUE;

/*
|--------------------------------------------------------------------------
| Site Request Forgery
|--------------------------------------------------------------------------
| Permite que um token de cookie CSRF seja definido. Quando definido como TRUE, o token será
| verificado em um formulário enviado. Se você estiver aceitando dados do usuário, é fortemente
| a proteção CSRF recomendada seja ativada.
|
| 'csrf_token_name' = O nome do token
| 'csrf_cookie_name' = O nome do cookie
| 'csrf_expire' = O número em segundos que o token deve expirar.
*/
$config['csrf_protection'] = TRUE;
$config['csrf_token_name'] = 'authenticity_token';
$config['csrf_cookie_name'] = 'bayanno_hospital_management_system_pro';
$config['csrf_expire'] = 7200;

/*
| ------------------------------------------------- -------------------------
| Compressão de saída
| ------------------------------------------------- -------------------------
|
| Permite compactação de saída Gzip para carregamentos de página mais rápidos. Quando ativado,
| a classe de saída testará se o seu servidor suporta o Gzip.
| Mesmo que isso aconteça, nem todos os navegadores suportam compactação
| portanto, ative apenas se tiver certeza razoável de que seus visitantes podem lidar com isso.
|
| MUITO IMPORTANTE: Se você estiver recebendo uma página em branco quando a compactação estiver ativada,
| significa que você está produzindo algo prematuramente no seu navegador. Poderia
| até ser uma linha de espaço em branco no final de um de seus scripts. Para
| compressão para funcionar, nada pode ser enviado antes que o buffer de saída seja chamado
| pela classe de saída. Não 'ecoe' nenhum valor com a compactação ativada.
|
*/
$config['compress_output'] = FALSE;

/*
| ------------------------------------------------- -------------------------
| Referência de master
| ------------------------------------------------- -------------------------
|
| As opções são 'local' ou 'gmt'. Este pref diz ao sistema se deve usar
| hora local do servidor como referência principal 'agora' ou converta-a em
| GMT. Consulte a página 'date helper' do guia do usuário para obter informações
| em relação à manipulação de datas.
|
*/
$config['time_reference'] = 'local';


/*
|--------------------------------------------------------------------------
| Reescrever PHP Short Tags
|--------------------------------------------------------------------------
|
| Se sua instalação do PHP não tiver suporte a tags curtas ativado
| pode reescrever as tags on-the-fly, permitindo que você utilize essa sintaxe
| em seus arquivos de exibição. As opções são VERDADEIRO ou FALSO (booleano)
|
*/
$config['rewrite_short_tags'] = FALSE;


/*
|--------------------------------------------------------------------------
| Reverso Proxy IPs
|--------------------------------------------------------------------------
|
| Se o servidor estiver protegido por um proxy reverso, 
| você deverá colocar na lista de permissões o IP do proxy
| endereços dos quais o CodeIgniter deve confiar no HTTP_X_FORWARDED_FOR
| cabeçalho para identificar corretamente o endereço IP do visitante.
| Delimitado por vírgula, p. «10 .0.1.200,10.0.1.201»
|
*/
$config['proxy_ips'] = '';


/* Fim do arquivo config.php */
/* Local: ./application/config/config.php */
