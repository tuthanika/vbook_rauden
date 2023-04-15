<?php
include $_SERVER['DOCUMENT_ROOT'] . "/inc/head.php";
echo '<title>Settings</title>';
include $_SERVER['DOCUMENT_ROOT'] . "/inc/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/search_widget_index.php";
$options_google = ['af' => 'Afrikaans', 'sq' => 'Albanian', 'am' => 'Amharic', 'ar' => 'Arabic', 'hy' => 'Armenian', 'as' => 'Assamese', 'ay' => 'Aymara', 'az' => 'Azerbaijani', 'bm' => 'Bambara', 'eu' => 'Basque', 'be' => 'Belarusian', 'bn' => 'Bengali', 'bho' => 'Bhojpuri', 'bs' => 'Bosnian', 'bg' => 'Bulgarian', 'ca' => 'Catalan', 'ceb' => 'Cebuano', 'zh' => 'Chinese (Simplified)', 'zh-TW' => 'Chinese (Traditional)', 'co' => 'Corsican', 'hr' => 'Croatian', 'cs' => 'Czech', 'da' => 'Danish', 'dv' => 'Dhivehi', 'doi' => 'Dogri', 'nl' => 'Dutch', 'en' => 'English', 'eo' => 'Esperanto', 'et' => 'Estonian', 'ee' => 'Ewe', 'fil' => 'Filipino (Tagalog)', 'fi' => 'Finnish', 'fr' => 'French', 'fy' => 'Frisian', 'gl' => 'Galician', 'ka' => 'Georgian', 'de' => 'German', 'el' => 'Greek', 'gn' => 'Guarani', 'gu' => 'Gujarati', 'ht' => 'Haitian Creole', 'ha' => 'Hausa', 'haw' => 'Hawaiian', 'he or iw' => 'Hebrew', 'hi' => 'Hindi', 'hmn' => 'Hmong', 'hu' => 'Hungarian', 'is' => 'Icelandic', 'ig' => 'Igbo', 'ilo' => 'Ilocano', 'id' => 'Indonesian', 'ga' => 'Irish', 'it' => 'Italian', 'ja' => 'Japanese', 'jv or jw' => 'Javanese', 'kn' => 'Kannada', 'kk' => 'Kazakh', 'km' => 'Khmer', 'rw' => 'Kinyarwanda', 'gom' => 'Konkani', 'ko' => 'Korean', 'kri' => 'Krio', 'ku' => 'Kurdish', 'ckb' => 'Kurdish (Sorani)', 'ky' => 'Kyrgyz', 'lo' => 'Lao', 'la' => 'Latin', 'lv' => 'Latvian', 'ln' => 'Lingala', 'lt' => 'Lithuanian', 'lg' => 'Luganda', 'lb' => 'Luxembourgish', 'mk' => 'Macedonian', 'mai' => 'Maithili', 'mg' => 'Malagasy', 'ms' => 'Malay', 'ml' => 'Malayalam', 'mt' => 'Maltese', 'mi' => 'Maori', 'mr' => 'Marathi', 'mni-Mtei' => 'Meiteilon (Manipuri)', 'lus' => 'Mizo', 'mn' => 'Mongolian', 'my' => 'Myanmar (Burmese)', 'ne' => 'Nepali', 'no' => 'Norwegian', 'ny' => 'Nyanja (Chichewa)', 'or' => 'Odia (Oriya)', 'om' => 'Oromo', 'ps' => 'Pashto', 'fa' => 'Persian', 'pl' => 'Polish', 'pt' => 'Portuguese (Portugal, Brazil)', 'pa' => 'Punjabi', 'qu' => 'Quechua', 'ro' => 'Romanian', 'ru' => 'Russian', 'sm' => 'Samoan', 'sa' => 'Sanskrit', 'gd' => 'Scots Gaelic', 'nso' => 'Sepedi', 'sr' => 'Serbian', 'st' => 'Sesotho', 'sn' => 'Shona', 'sd' => 'Sindhi', 'si' => 'Sinhala (Sinhalese)', 'sk' => 'Slovak', 'sl' => 'Slovenian', 'so' => 'Somali', 'es' => 'Spanish', 'su' => 'Sundanese', 'sw' => 'Swahili', 'sv' => 'Swedish', 'tl' => 'Tagalog (Filipino)', 'tg' => 'Tajik', 'ta' => 'Tamil', 'tt' => 'Tatar', 'te' => 'Telugu', 'th' => 'Thai', 'ti' => 'Tigrinya', 'ts' => 'Tsonga', 'tr' => 'Turkish', 'tk' => 'Turkmen', 'ak' => 'Twi (Akan)', 'uk' => 'Ukrainian', 'ur' => 'Urdu', 'ug' => 'Uyghur', 'uz' => 'Uzbek', 'vi' => 'Vietnamese', 'cy' => 'Welsh', 'xh' => 'Xhosa', 'yi' => 'Yiddish', 'yo' => 'Yoruba', 'zu' => 'Zulu'];
$options_bing = ['af' => 'Afrikaans', 'sq' => 'Albanian', 'am' => 'Amharic', 'ar' => 'Arabic', 'hy' => 'Armenian', 'as' => 'Assamese', 'az' => 'Azerbaijani (Latin)', 'bn' => 'Bangla', 'ba' => 'Bashkir', 'eu' => 'Basque', 'bs' => 'Bosnian (Latin)', 'bg' => 'Bulgarian', 'yue' => 'Cantonese (Traditional)', 'ca' => 'Catalan', 'lzh' => 'Chinese (Literary)', 'zh-Hans' => 'Chinese Simplified', 'zh-Hant' => 'Chinese Traditional', 'hr' => 'Croatian', 'cs' => 'Czech', 'da' => 'Danish', 'prs' => 'Dari', 'dv' => 'Divehi', 'nl' => 'Dutch', 'en' => 'English', 'et' => 'Estonian', 'fo' => 'Faroese', 'fj' => 'Fijian', 'fil' => 'Filipino', 'fi' => 'Finnish', 'fr' => 'French', 'fr-ca' => 'French (Canada)', 'gl' => 'Galician', 'ka' => 'Georgian', 'de' => 'German', 'el' => 'Greek', 'gu' => 'Gujarati', 'ht' => 'Haitian Creole', 'he' => 'Hebrew', 'hi' => 'Hindi', 'mww' => 'Hmong Daw (Latin)', 'hu' => 'Hungarian', 'is' => 'Icelandic', 'id' => 'Indonesian', 'ikt' => 'Inuinnaqtun', 'iu' => 'Inuktitut', 'iu-Latn' => 'Inuktitut (Latin)', 'ga' => 'Irish', 'it' => 'Italian', 'ja' => 'Japanese', 'kn' => 'Kannada', 'kk' => 'Kazakh', 'km' => 'Khmer', 'tlh-Latn' => 'Klingon', 'tlh-Piqd' => 'Klingon (plqaD)', 'ko' => 'Korean', 'ku' => 'Kurdish (Central)', 'kmr' => 'Kurdish (Northern)', 'ky' => 'Kyrgyz (Cyrillic)', 'lo' => 'Lao', 'lv' => 'Latvian', 'lt' => 'Lithuanian', 'mk' => 'Macedonian', 'mg' => 'Malagasy', 'ms' => 'Malay (Latin)', 'ml' => 'Malayalam', 'mt' => 'Maltese', 'mi' => 'Maori', 'mr' => 'Marathi', 'mn-Cyrl' => 'Mongolian (Cyrillic)', 'mn-Mong' => 'Mongolian (Traditional)', 'my' => 'Myanmar', 'ne' => 'Nepali', 'nb' => 'Norwegian', 'or' => 'Odia', 'ps' => 'Pashto', 'fa' => 'Persian', 'pl' => 'Polish', 'pt' => 'Portuguese (Brazil)', 'pt-pt' => 'Portuguese (Portugal)', 'pa' => 'Punjabi', 'otq' => 'Queretaro Otomi', 'ro' => 'Romanian', 'ru' => 'Russian', 'sm' => 'Samoan (Latin)', 'sr-Cyrl' => 'Serbian (Cyrillic)', 'sr-Latn' => 'Serbian (Latin)', 'sk' => 'Slovak', 'sl' => 'Slovenian', 'so' => 'Somali (Arabic)', 'es' => 'Spanish', 'sw' => 'Swahili (Latin)', 'sv' => 'Swedish', 'ty' => 'Tahitian', 'ta' => 'Tamil', 'tt' => 'Tatar (Latin)', 'te' => 'Telugu', 'th' => 'Thai', 'bo' => 'Tibetan', 'ti' => 'Tigrinya', 'to' => 'Tongan', 'tr' => 'Turkish', 'tk' => 'Turkmen (Latin)', 'uk' => 'Ukrainian', 'hsb' => 'Upper Sorbian', 'ur' => 'Urdu', 'ug' => 'Uyghur (Arabic)', 'uz' => 'Uzbek (Latin', 'vi' => 'Vietnamese', 'cy' => 'Welsh', 'yua' => 'Yucatec Maya', 'zu' => 'Zulu'];
$options_button = ['stv' => '🇻🇳 Sangtacviet', 'bing' => 'Bing Translator', 'google' => 'Google Translate', 'lingvanex' => 'Lingvanex Translate'];
$options_lingvanex = ['af' => 'Afrikaans', 'sq' => 'Albanian', 'am' => 'Amharic', 'ar' => 'Arabic', 'hy' => 'Armenian', 'az' => 'Azerbaijani', 'eu' => 'Basque', 'be' => 'Belarusian', 'bn' => 'Bengali', 'bs' => 'Bosnian', 'bg' => 'Bulgarian', 'ca' => 'Catalan', 'ceb' => 'Cebuano', 'ny' => 'Chichewa', 'zh-Hans' => 'Chinese (Simplified)', 'zh-Hant' => 'Chinese (Traditional)', 'co' => 'Corsican', 'ht' => 'Haitian Creole', 'hr' => 'Croatian', 'cs' => 'Czech', 'da' => 'Danish', 'nl' => 'Dutch', 'en' => 'English', 'eo' => 'Esperanto', 'et' => 'Estonian', 'fi' => 'Finnish', 'fr' => 'French', 'fy' => 'Frisian', 'gl' => 'Galician', 'ka' => 'Georgian', 'de' => 'German', 'el' => 'Greek', 'gu' => 'Gujarati', 'ha' => 'Hausa', 'haw' => 'Hawaiian', 'he' => 'Hebrew', 'hi' => 'Hindi', 'hmn' => 'Hmong', 'hu' => 'Hungarian', 'is' => 'Icelandic', 'ig' => 'Igbo', 'id' => 'Indonesian', 'ga' => 'Irish', 'it' => 'Italian', 'ja' => 'Japanese', 'jv' => 'Javanese', 'kn' => 'Kannada', 'kk' => 'Kazakh', 'km' => 'Khmer', 'rw' => 'Kinyarwanda', 'ko' => 'Korean', 'ku' => 'Kurdish (Kurmanji)', 'ky' => 'Kyrgyz', 'lo' => 'Lao', 'la' => 'Latin', 'lv' => 'Latvian', 'lt' => 'Lithuanian', 'lb' => 'Luxembourgish', 'mk' => 'Macedonian', 'mg' => 'Malagasy', 'ms' => 'Malay', 'ml' => 'Malayalam', 'mt' => 'Maltese', 'mi' => 'Maori', 'mr' => 'Marathi', 'mn' => 'Mongolian', 'my' => 'Myanmar (Burmese)', 'ne' => 'Nepali', 'no' => 'Norwegian', 'or' => 'Odia', 'ps' => 'Pashto', 'fa' => 'Persian', 'pl' => 'Polish', 'pt' => 'Portuguese', 'pa' => 'Punjabi', 'ro' => 'Romanian', 'ru' => 'Russian', 'sm' => 'Samoan', 'gd' => 'Scots Gaelic', 'sr-Cyrl' => 'Serbian Cyrilic', 'st' => 'Sesotho', 'sn' => 'Shona', 'sd' => 'Sindhi', 'si' => 'Sinhala', 'sk' => 'Slovak', 'sl' => 'Slovenian', 'so' => 'Somali', 'es' => 'Spanish', 'su' => 'Sundanese', 'sw' => 'Swahili', 'sv' => 'Swedish', 'tl' => 'Filipino (Tagalog)', 'tg' => 'Tajik', 'ta' => 'Tamil', 'tt' => 'Tatar', 'te' => 'Telugu', 'th' => 'Thai', 'tr' => 'Turkish', 'tk' => 'Turkmen', 'uk' => 'Ukrainian', 'ur' => 'Urdu', 'ug' => 'Uyghur', 'uz' => 'Uzbek', 'vi' => 'Vietnamese', 'cy' => 'Welsh', 'xh' => 'Xhosa', 'yi' => 'Yiddish', 'yo' => 'Yoruba', 'zu' => 'Zulu'];

echo '

<div class="card fluid center div_color_yellow1">
    <h3><i class="fa fa-cogs" aria-hidden="true"></i> Settings</h3>
</div>
<div class="card fluid" style="background-color:#EDE6DB;">

<div>
    <h4><b><i class="fa fa-language" aria-hidden="true"></i> Translate</b></h4>
    <p><b>Translate button <small>(lower left corner)</small></b></p>';
echo '<select id="translator_button">';

foreach ($options_button as $value => $label) {
    echo "<option value=\"$value\"";
    if ($value == $translator_button) {
        echo ' selected';
    }
    echo ">$label</option>\n";
}
echo '</select>

    </p>
    <p><b>Bing Translator</b><br/>';



echo '<select id="translator_bing">';

foreach ($options_bing as $value => $label) {
    echo "<option value=\"$value\"";
    if ($value == $translator_bing) {
        echo ' selected';
    }
    echo ">$label</option>\n";
}
echo '</select><br/>';
echo '<p><b>Lingvanex Translate</b><br/>';

echo '
  - Lingvanex: ';
echo '<select id="translator_lingvanex">';

foreach ($options_lingvanex as $value => $label) {
    echo "<option value=\"$value\"";
    if ($value == $translator_lingvanex) {
        echo ' selected';
    }
    echo ">$label</option>\n";
}
echo '</select><br/>';

echo '
  <p><b>Google Translate</b><br/>';

echo '<select id="translator_google">';

foreach ($options_google as $value => $label) {
    echo "<option value=\"$value\"";
    if ($value == $translator_google) {
        echo ' selected';
    }
    echo ">$label</option>\n";
}
echo '</select><br/>';


echo '

    </p>
    <button class="shadowed small primary" onclick="saveTranslateSettings()">Save translate settings</button>

</div>

</div>



<script>

function saveTranslateSettings() {
    const selected_translator_button = document.getElementById("translator_button").value;
    const selected_translator_bing = document.getElementById("translator_bing").value;
    const selected_translator_lingvanex = document.getElementById("translator_lingvanex").value;
    const expires = { expires: 300 };
    Cookies.set("translator_button", selected_translator_button, expires);
    Cookies.set("translator_bing", selected_translator_bing, expires);
    Cookies.set("translator_lingvanex", selected_translator_lingvanex, expires);
    alert("Saved");
  }
  

</script>

';



include $_SERVER['DOCUMENT_ROOT'] . "/inc/footer.php";

?>