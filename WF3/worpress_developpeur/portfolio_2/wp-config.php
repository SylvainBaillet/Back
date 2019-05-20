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
define( 'DB_NAME', 'portfolio_sylvain' );

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
define( 'AUTH_KEY',         'gB*=~qugf5@P`CvMP0yalNJ*b%WgW;i!* db!ZwHu9Xw.df134{|*p{RS7k%IE+?' );
define( 'SECURE_AUTH_KEY',  '6EF,G,SBLn|Shr9opUh?]d=qgVw,;`&,:I$FkKkX)XD@9 >N,6sZcTac,VcBV{Ww' );
define( 'LOGGED_IN_KEY',    'N.:]0i%77*ep,Vk:>hfm5Jw%JdOOwdsjyo:_Nv*..dyp:fYg^njb#uXH97I.tw1$' );
define( 'NONCE_KEY',        'b8QGdl~:EdUB+/TXyIfiPR!^Q/?F6IXb5]EI_Avri([@Rc$%7T[Ca;[ns#KyX_^f' );
define( 'AUTH_SALT',        '?}qXMamy,o A:Z+aSEtObN~ETT}aI-`aDJQb+( @~+PpuGG8#Tn`hqT[,JI+p]We' );
define( 'SECURE_AUTH_SALT', 'b@$,M0`|z>m>4y@3f*DIIi!02FK-gr[B>$WYF$7iF9EOZs;b+gZQdH@FTqdXR2<N' );
define( 'LOGGED_IN_SALT',   '<Ab9UDF/.<oLbW8d;E/bpOHeajX]gD()D0E8advjoG+ec-&6]marxIp7jpBi~F)T' );
define( 'NONCE_SALT',       'n@OdN=lWVckq/*CGm05WNyB*zc#MY+x%rvoSlC8r!aT.O4v7ZK$kJi~*vN=&YAs2' );
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
