<?php  if ( ! defined('BASEPATH')) exit('Acesso nao permitido!');
/*
| -------------------------------------------------- -----------------------
| URI ROUTING
| -------------------------------------------------- -----------------------
| Esse arquivo permite mapear novamente as solicitações de URI para funções específicas do controlador.
|
| Normalmente, há um relacionamento individual entre uma string de URL
| e sua classe / método de controlador correspondente. Os segmentos em um
| URL normalmente segue este padrão:
|
| example.com/class/method/id/
|
| Em alguns casos, no entanto, convém remapear esse relacionamento
| para que seja chamada uma classe / função diferente daquela
| correspondente ao URL.
|
| Consulte o guia do usuário para obter detalhes completos:
|
| http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------- -----------------------
| ROTAS RESERVADAS
| -------------------------------------------------- -----------------------
|
| Existem duas rotas reservadas:
|
| $ route ['default_controller'] = 'bem-vindo';
|
| Essa rota indica qual classe de controlador deve ser carregada se o
| O URI não contém dados. No exemplo acima, a classe "bem-vindo"
| seria carregado.
|
| $route ['404_override'] = 'erros / falta de página';
|
| Essa rota informará ao roteador quais segmentos de URI usar se os fornecidos
| no URL não pode ser correspondido a uma rota válida.
|
*/


/*
| controlador padrão inicial será 'login'
| depois que a logon for concluída com êxito, o controlador padrão será 'login'
*/

$route['default_controller'] = "login";
$route['404_override'] = 'login/four_zero_four';


/* Fim do arquivo routes.php */
/* Local: ./application/config/routes.php */