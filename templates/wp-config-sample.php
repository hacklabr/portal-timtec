<?php
/**
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'wordpress');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'j!7g@,cf=gQq|zus:bPDZjiEpenY`5M+y27TB2Ef,Fo0$A_<gu@?|GFytb}p3HL4');
define('SECURE_AUTH_KEY',  'nVHpF{,:C30I*A$+U2GTQi;T8O~q89bA;-v0_W-Zn9RUNHxAPIA?O6ve!8O-uzb5');
define('LOGGED_IN_KEY',    ';sRJ:zzJu5?1*.|CJ%+Xd`y&L3>)k5rYaBnh=TLmf7-s*W/%oWr-g&o|yNwI?wt9');
define('NONCE_KEY',        '9K<TZhZ.&b*~=6V9GUj2,mqng]V>QH1%a|/RjdnC~FFc;F/!9(+C@1,0$zdLu<%6');
define('AUTH_SALT',        '2jQ| 4~~xEav/#? !y,_ze;#WB)gY{Op}5y1RMvgoLNEl]NU;Js|gH9cL^I)&.l&');
define('SECURE_AUTH_SALT', '5P[&5|/3f}(cNa{}^^6{3 6jX!HY(K(%@@10<o^w.W<K)_-qbjI{&yM+gI0X$U;C');
define('LOGGED_IN_SALT',   'XAzW$uEM-VZ>}+C[[_YOoDrhqs7JA+$5+I-Q~0hN*{.[upT|?=*!(3NT-ktEG>^_');
define('NONCE_SALT',       '8&q!gm+e3&%__PvFd%kDqt]=a+Jry#v+a{NKej`UUh+u7}[7kP(GTd;}I@v77.H|');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
