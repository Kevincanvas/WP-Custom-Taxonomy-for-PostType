<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'wp_test');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'root');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'Ex4wlL04gC%YKjqYSiRr<alKod4&EiPtxFU-EbP&ZEHEz,0#s=&b1F~k.h=.]ZCm');
define('SECURE_AUTH_KEY', ';+(iegr~3dh:6SNi2U#m+K |YI.X%gV!hVe4_h&%dt%^is,e<K4!z9jEPzw:C$!o');
define('LOGGED_IN_KEY', 'Q6gG!RX%mYFbJDzjKJD]-v#f)UZ.f87Ccyn!~I:G}P*,[P7QCVlW@z$?:h;%4Zb7');
define('NONCE_KEY', '%m?(nLXkVk$Q{ZI7S6:FR)f|C4DLi@9Q$CpK?WAKgb/9;v YfDNs}dIuE5v74amv');
define('AUTH_SALT', '7f<cQQmhvCs_Q).p$d_Ko0B^Wz l6ME6.;Q[!<R0[s_g^PaY@a$9,S:?JdR@Q&!{');
define('SECURE_AUTH_SALT', 'nD*cS+)?GlB/F8D/65F/NR&Jz:Bp*Vfh?x= i=Az>>i@wOF+vp2Q^Pfv.XOatUG5');
define('LOGGED_IN_SALT', 's+8 d<VTXG>-YV;z#O(h!02 H@g=1(Q{>?3.h_2$lOmj{d%frYuHvNSG:P3$uCIT');
define('NONCE_SALT', ':?(|oeK<Y]tY}p#~fAnd=pAE:UbBgwpE7aIq=Fz3vi473I}%Ko!HcP2z*Mq3`mh?');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

