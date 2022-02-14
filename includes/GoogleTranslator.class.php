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
#$wgGoogleTranslatorLanguages  = 'fr,de';        // Languages included in the translating box

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

        # Default values for the variables.
        #$wgGoogleTranslatorOriginal  = $wgLanguageCode; // Original languages of the page that needs translation
        #$wgGoogleTranslatorLanguages  = 'fr,de';        // Languages included in the translating box


        $data = "
        <script src='https://code.jquery.com/jquery-2.1.4.js'></script>
        <script>
                function googleTranslateElementInit() {
                        new google.translate.TranslateElement({
                                pageLanguage: '".$wgGoogleTranslatorOriginal."',
                                includedLanguages: '".$wgGoogleTranslatorLanguages."',
                                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                        }, 'google_translate_element');
                }
        </script>
        <script src=\"//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit\"></script>
        <script>
                $(document).ready(function(){
                  $('#google_translate_element').bind('DOMNodeInserted', function(event) {
                    $('.goog-te-menu-value span:first').html('Language');
                    $('.goog-te-menu-frame.skiptranslate').load(function(){
                      setTimeout(function(){
                        $('.goog-te-menu-frame.skiptranslate').contents().find('.goog-te-menu2-item-selected .text').html('Language');
                      }, 100);
                    });
                  });
                });
        </script>";
    }
}
