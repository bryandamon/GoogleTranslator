<?php
if (!defined('MEDIAWIKI')) die();
/**
 * Class file for the GoogleTranslator extension
 *
 * @addtogroup Extensions
 * @author Joachim De Schrijver
 * @license LGPL
 */


# Default values for the variables.
#$wgGoogleTranslatorOriginal  = $wgLanguageCode; // Original languages of the page that needs translation
#$wgGoogleTranslatorLanguages  = 'fr,de';	// Languages included in the translating box

class GoogleTranslator {
	static function GoogleTranslatorInSidebar( $skin, &$bar ) {
		global $wgOut;

		$wgOut->addModules( 'ext.GoogleTranslator' );

		$bar[ 'googletranslator' ] =  [
			[
				'text'   => '',
				'href'   => '#',
				'id'     => 'google_translate_element',
				'active' => '',
			],
		];

		return true;
	}

	static function OnSkinAfterContent ( &$data, $skin ) {
		global $wgGoogleTranslatorOriginal, $wgGoogleTranslatorLanguages;

		# Default values for the variables.
		#$wgGoogleTranslatorOriginal  = $wgLanguageCode; // Original languages of the page that needs translation
		#$wgGoogleTranslatorLanguages  = 'fr,de';	// Languages included in the translating box

		$data = <<<EOD
<script>
	function googleTranslateElementInit() {
	new google.translate.TranslateElement({
		pageLanguage: '$wgGoogleTranslatorOriginal',
		includedLanguages: '$wgGoogleTranslatorLanguages',
		layout: google_translate_element
	}, 'google_translate_element');
	}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
EOD;
	}
}
