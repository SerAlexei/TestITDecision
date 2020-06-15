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
define( 'DB_NAME', 'itdecision' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '-ucN&*tw`s]GKl#5)&^gp4&kq-y7u9FB|LIgt|>4%3V[OxY7Tl28I@cx%xz0D)R?' );
define( 'SECURE_AUTH_KEY',  'Xki9]zVk]-e]qtQ)N~(C?ZV)fb_4~1U&;& won5<FW({o)|~9x`:.HdNgKtz/SA^' );
define( 'LOGGED_IN_KEY',    '!*bMRyNBi^xUM`+ ]E:tm37Q!Wwj5~Q0z/t%ukM}EbVL#@%b+|1;^WEL&T764[XQ' );
define( 'NONCE_KEY',        '?}H;%I8A18AwBED,:{xDv+x4B&+{MDAi@4c+6 58t`A?>~qVI|G*N/:d;RM^Kcd2' );
define( 'AUTH_SALT',        '[T.w(zo@M1,ls/QA7*R>duD0er0a]T>AEu`d^IgCz]s_?fO/|9%}Xj.nRQtxF*#c' );
define( 'SECURE_AUTH_SALT', 'Y?tQ/i<QzX5+5KwSyDJS-k%mEqZ=Nso}I?e-03va$i rf6EakHP4FI*aaBhryFk3' );
define( 'LOGGED_IN_SALT',   '|ZS4)xK2h/I6%t38|w(CBDvo<jVMW|R/<`dslk]{)}7rYM0gVGm>:}q()tvI,+{_' );
define( 'NONCE_SALT',       'PySSzMkw(6AeV2 |U/l* >JL*&C*5Dw>0U%Cx<u[ ?^Yo;];i>?v;d8fs.G//Q^j' );

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
