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
define( 'DB_NAME', 'approve_media_user' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'approve_media_user' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'approve_media' );

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
define( 'AUTH_KEY',         's-c8}z1L3E*w~2B|.lxU:<W4&*7S$.##L5ry*fK=Xd#Dt>JQ{!FE/0Q8O&^2>Ik4' );
define( 'SECURE_AUTH_KEY',  'bLX[H~}PnjS?iP2t`b:*I5pmTvkE?3qL8>eOhv@r?w<_Yau1l!@B!2&^@0iw9Pso' );
define( 'LOGGED_IN_KEY',    'nMWf=uIo^v~*uSE[S?h[<K1HdH&&nZNCV&MV1vzKZ$A%Kmc.ya*@SXryFJ9Pc.eO' );
define( 'NONCE_KEY',        'c#w8.z4R6?6&}1?i/7VUCY!a=,]]GH5*Ytu:o8Ma>WC>vqpr~UQ0eV|^3TFXkIG~' );
define( 'AUTH_SALT',        'WS2?Ip_jDXbker(z]TC~{^3U#+5y}5i-vB1}$-1;dH[I3T:T`7:xOQ*[-zh3*9n*' );
define( 'SECURE_AUTH_SALT', ':%T8t JSKOt#C4,>C2<s|QuuOBC;HIWdi31KR?KCk,E#lE~JFz28&aN[,f>M_2)q' );
define( 'LOGGED_IN_SALT',   '$PSr@=[eSN7zI/?F2+5OMU?dRyy!(@cDB;M$H`HP`DPSs|e!/Y=<f,0QW+dMr}!q' );
define( 'NONCE_SALT',       '?H)+&@gjM]!|8no9nSM|,6%_ueOQRPvAT~|_T<eURQn{E:70*eW+9&/>g]^X9ro7' );

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
define( 'WP_DEBUG', true );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
