<?php
if (!defined('MEDIAWIKI')) die();
/**
 * Class file for the GoogleTranslator extension
 *
 * @addtogroup Extensions
 * @author Joachim De Schrijver
 * @license LGPL
 */
class GoogleTranslator {
        static function GoogleTranslatorInSidebar( $skin, &$bar ) {

                        $bar[ 'googletranslator' ] =  array(
                                array(
                                        'text'   => '',
                                        'href'   => '#',
                                        'id'     => 'google_translate_element',
                                        'active' => ''
                                ),
                        );


                return true;
        }
        static function OnSkinAfterContent (&$data, $skin) {
                global $wgGoogleTranslatorOriginal,$wgGoogleTranslatorLanguages;
        $data .=
                        "
        <script>
                        function googleTranslateElementInit() {
                          new google.translate.TranslateElement({
                                pageLanguage: '".$wgGoogleTranslatorOriginal."',
                                includedLanguages: '".$wgGoogleTranslatorLanguages."',
                                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                          }, 'google_translate_element');
                        }
        </script>
        <script src=\"//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit\"></script>".
                        '';
    }
}
