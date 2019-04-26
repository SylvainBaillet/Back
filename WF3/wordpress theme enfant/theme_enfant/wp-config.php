<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'theme_enfant' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '+V3Z`aRbP#aBmb@{t<PRVXU,&PCs~BbQ&yp6f-!SJ$s:Z^smXl@3KINS}}y)mE7`' );
define( 'SECURE_AUTH_KEY',  '&Hw@^rSl|jC<EtkYR~,Eip+iM)3YIc_?+@P*0aa/I-$WtmfI%C^~$4O]C(yRVf6(' );
define( 'LOGGED_IN_KEY',    'n[XdN!,Ayj@)S#<}koXO>>Pja*01/P <oeg#}8_vf<tsu2ARo)Q&1~#lAQ64ivd ' );
define( 'NONCE_KEY',        ']C(,[x2:*EhGMi9l$F6O=(qeSyf~usRCN4HV>@8ky$`%/6aW1ZT!2xzM .@ay|zv' );
define( 'AUTH_SALT',        'jXcuvkVfz6+=m=HZ$j]_oV9e2Nz|(xbi$iv`(R|S,f499%s[{`NwXT+Rpm7^{%hu' );
define( 'SECURE_AUTH_SALT', 'M_T4t01-5jIV]y1#WvI;:*oi5wI5~Fccmz]|:V-a%C?/ewnI%M-8gk#7h;p#)+E0' );
define( 'LOGGED_IN_SALT',   '/xYmNj%b>FM3&.FssC!%r(oHXk_lgg8zNTByLQzfOucDbmSx&oL-E%ISN?ajNz%2' );
define( 'NONCE_SALT',       'eSU[|fT5%%lClH][7_Pg}hxeU|e8xT}B*!RMC=>5|cd4{0]bp?+}44zU5Gzh[{83' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
