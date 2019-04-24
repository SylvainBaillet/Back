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
define( 'DB_NAME', 'portfolio' );

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
define( 'AUTH_KEY',         'Am*tl9~}(euAHotqhhCK 5uO<prF!07,>h>ba9e&}0V~(e7ngFw,)sbljRm5Rl.K' );
define( 'SECURE_AUTH_KEY',  'l+fR:tu^Dx.]W&@$sh+Ys1SD6e7yoc?0W(`9O<Nnjr%mF,i{N#M0ZKst,caR(Lbw' );
define( 'LOGGED_IN_KEY',    'EUUH4F-()I_AsL.pO!;YvoD,W&UYID?>hPeMjNiY&Ec<}FFBRN~k@$h,OG1 8[|5' );
define( 'NONCE_KEY',        '2|j;twl{{TXYC@<*5w]@hmlFci@~7r;M +C},f2/(?_tKmbApY8BTAPcyWU~87pg' );
define( 'AUTH_SALT',        '/XpBT=nIAY@H ,TkJ&cy/qhJ@vJ$ 2pP*p<j_*^Ye(aXwat>AH :*FjU,SnINPH*' );
define( 'SECURE_AUTH_SALT', ',g9KurJ#zJS5ekw_B7bUDgr1AG+=(E]0QPqir[Ar[o{SfM%Rk8GyI&S)SI^%*}Ow' );
define( 'LOGGED_IN_SALT',   'uGBf+8JS#!+0SfR;hRp-`O h0[Cf]uS7S#we<(XKO5%La$#}VPoy8m^kU!K6QKVh' );
define( 'NONCE_SALT',       'ez[;?iThsgt(4}Hsvl$)+bd-d5`$h^Vs7+VEZq,JwF{XnTj5$7q={~-C+q5suzKb' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'pf';

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
