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
                global $wgGoogleTranslatorOriginal,$wgGoogleTranslatorLanguages;

                $bar['Translate'] = "<div id=\"google_translate_element\"></div><script>
                                        function googleTranslateElementInit() {
                                          new google.translate.TranslateElement({
                                            pageLanguage: '".$wgGoogleTranslatorOriginal."',
                                            includedLanguages: '".$wgGoogleTranslatorLanguages."'
                                          }, 'google_translate_element');
                                        }
                                        </script><script src=\"//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit\"></script>";
                return $bar;
                return true;
        }
}
