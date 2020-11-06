<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'sub' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ',,Pu)0)H=55&/:?rdXd&`fp==<f9c+DuxA;y[1QA2(_i_l=9uUQ,/?Q|MiJJ:D19' );
define( 'SECURE_AUTH_KEY',  'AG~AHinZ9s~1M-|C#Z=Z=6j>Efe;tQ:|( G5RF=bY_F@Q5_yHB|=3NMCfqpzM!>D' );
define( 'LOGGED_IN_KEY',    '33(tEdU)uOlg$I=+UZu7*)w:3jE2}]a?`}ugUFW23<@i@tJ=v1Vd*WENlm-~(BPR' );
define( 'NONCE_KEY',        'c[p&#^bB<@@)JNUT@o#Hw0ULJc`U-%*:gszDc1kJ:e$<%~}$-e>hLZlkfd&YR3yk' );
define( 'AUTH_SALT',        'guNe1~Tata$,4+l%BHk6XD[0V#toZAf_4`s#Yj5GTVm$:{wgfPYv[^k |8hxktm ' );
define( 'SECURE_AUTH_SALT', 'U!GmI6-JUY-hN/KI:`D[R+`t.y>)jt;cz/KOU%}!#]g$8G>+vDyci</m)xS9wAyt' );
define( 'LOGGED_IN_SALT',   '/<4fS)@HMf3GE)S_:@cdzoFXMC`<5E?.gmbes,K6SU,El4dDsxE0,F2|GM[}2|,=' );
define( 'NONCE_SALT',       '%1(,&^^LgVJgFpe{vqrY=MHyQ?Kqzk6T-l+R<gRTFF.!Q4Zk92^-Ss|cBkHQ*Vc>' );

// ВКЛЮЧЕНИЕ АБСОЛТНЫХ ССЫЛОК
define('WP_HOME',  "http://{$_SERVER['HTTP_HOST']}");
define('WP_SITEURL', "http://{$_SERVER['HTTP_HOST']}");

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
