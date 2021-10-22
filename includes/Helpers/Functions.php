<?php

namespace Exdda\Helpers; 

class Functions {  

    public static function locate_template($name) {
        // Look within passed path within the theme - this is priority.
        $template = []; 

        $template[] = exdda()->get_template_path() . $name . ".php";

        if (!$template_file = locate_template(apply_filters('exdda_locate_template_names', $template))) {
            $template_file = EXDDA_PATH . "templates/$name.php";
        }

        return apply_filters('exdda_locate_template', $template_file, $name);
    }

    /**
     * Get template part (for templates like the shop-loop).
     *
     * EXDDA_TEMPLATE_DEBUG_MODE will prevent overrides in themes from taking priority.
     *
     * @param mixed  $slug Template slug.
     * @param string $name Template name (default: '').
     */
    static function get_template_part($slug, $args = null, $include = true ) { 
        // load template from theme if exist
        $template = EXDDA_TEMPLATE_DEBUG_MODE ? '' : locate_template(
            array(
                "{$slug}.php",
                exdda()->get_template_path() . "{$slug}.php"
            )
        ); 

        // load template from pro plugin if exist
        if ( !$template && function_exists('exddap') ) { 
            $fallback = exdda()->plugin_path() . "-pro" . "/templates/{$slug}.php";  
            $template = file_exists($fallback) ? $fallback : '';
        }

        // load template from current plugin if exist
        if ( !$template ) { 
            $fallback = exdda()->plugin_path() . "/templates/{$slug}.php";  
            $template = file_exists($fallback) ? $fallback : '';
        }

        // Allow 3rd party plugins to filter template file from their plugin.
        $template = apply_filters('exdda_get_template_part', $template, $slug);

        if ( $template ) {
            if ( !empty($args) && is_array($args) ) {
                extract($args); // @codingStandardsIgnoreLine
            }

            // load_template($template, false, $args);
            if ( $include ) {
                include $template;
            } else {
                return $template;
            } 
        }
    }

    static function doing_it_wrong($function, $message, $version) {
        // @codingStandardsIgnoreStart
        $message .= ' Backtrace: ' . wp_debug_backtrace_summary();
        _doing_it_wrong($function, $message, $version);
    }

    static function get_template($fileName, $args = null) {

        if (!empty($args) && is_array($args)) {
            extract($args); // @codingStandardsIgnoreLine
        }

        $located = self::locate_template($fileName); 

        if (!file_exists($located)) {
            /* translators: %s template */
            self::doing_it_wrong(__FUNCTION__, sprintf(__('%s does not exist.', 'dda'), '<code>' . $located . '</code>'), '1.0');

            return;
        }

        // Allow 3rd party plugin filter template file from their plugin.
        $located = apply_filters('exdda_get_template', $located, $fileName, $args);

        do_action('exdda_before_template_part', $fileName, $located, $args);

        include $located;

        do_action('exdda_after_template_part', $fileName, $located, $args);

    } 

    /**
     * @param $id
     *
     * @return bool|mixed|void
     */

    public static function get_default_placeholder_url() {
        $placeholder_url = EXDDA_URL . '/assets/imgs/placeholder.jpg';
        return apply_filters('exdda_default_placeholder_url', $placeholder_url);
    }

    /**
     * is_edit_page 
     * function to check if the current page is a post edit page
     * 
     * @param  string  $new_edit what page to check for accepts new - new post page ,edit - edit post page, null for either
     * @return boolean
     */
    public static function is_edit_page($new_edit = null){
        global $pagenow;
        //make sure we are on the backend
        if ( !is_admin() ) return false; 
        
        if ($new_edit == "edit")
            return in_array( $pagenow, array( 'post.php',  ) );
        else if ($new_edit == "new") //check for new post page
            return in_array( $pagenow, array( 'post-new.php' ) );
        else //check for either new or edit
            return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
    }  

    /**
     *  String to slug convert
     *
     * @package DDA Project
     * @since 1.0
     */
    public static function slugify($string){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
    }  

    /**
     * Sanitize out put
     *
     * @package DDA Project
     * @since 1.0
     */
    function sanitizeOutPut( $value, $type = 'text' ) {
        $newValue = null;
        if ( $value ) {
            if ( $type == 'text' ) {
                $newValue = esc_html( stripslashes($value) );
            } elseif ($type == 'url') {
                $newValue = esc_url( stripslashes($value) );
            } elseif ($type == 'textarea') {
                $newValue = esc_textarea( stripslashes($value) );
            } else {
                $newValue = esc_html( stripslashes($value) );
            }
        }
        return $newValue;
    }

    /**
     * Image information
     *
     * @package DDA Project
     * @since 1.0
     */
    function imageInfo($attachment_id) {
        $data = array();
        $imgData = wp_get_attachment_metadata($attachment_id);
        $data['id'] = $attachment_id;
        $data['url'] = wp_get_attachment_url($attachment_id);
        $data['width'] = !empty($imgData['width']) ? absint($imgData['width']) : 0;
        $data['height'] = !empty($imgData['height']) ? absint($imgData['height']) : 0;

        return $data;
    }   

    /**
     *  DDA Project Star Icon
     *
     * @package DDA Project
     * @since 1.0
     */
    public static function review_stars( $rating, $dash_icon = false ) {
        ob_start(); 
        for ( $x = 0; $x < 5; $x++ ) {
            if ( floor( $rating )-$x >= 1 ) { 
                if ( $dash_icon ) {
                    echo '<i class="dashicons dashicons-star-filled"></i>';
                } else {
                    echo '<i class="exdda-star"></i>'; 
                }
            } elseif( $rating-$x > 0 ) { 
                if ( $dash_icon ) {
                    echo '<i class="dashicons dashicons-star-half"></i>';
                } else {
                    echo '<i class="exdda-star-half-alt"></i>';
                }
            } else { 
                if ( $dash_icon ) {
                    echo '<i class="dashicons dashicons-star-empty"></i>';
                } else {
                    echo '<i class="exdda-star-empty"></i>';
                } 
            }
        } 
        return ob_get_clean();
    }

    /**
     *  DDA Project Entity Star Icon
     *
     * @package DDA Project
     * @since 1.0
     */
    public static function review_entity_stars($rating) {
        ob_start(); 
        foreach (array(1,2,3,4,5) as $val) {
            $score = $rating - $val;
            if ($score >= 0) { 
                echo '&#9733;';
            } else if ($score > -1 && $score < 0) { 
                // half star will show full star in url 
                echo '&#9733;';
            } else { 
                echo '&#9734;';
            }
        } 
        return ob_get_clean(); 
    } 

    static function filter_content($content, $limit = 0) {
        $content = preg_replace('#\[[^\]]+\]#', '', wp_strip_all_tags($content));
        $content = self::characterToHTMLEntity($content);
        if ($limit && strlen($content) > $limit) {
            $content = mb_substr($content, 0, $limit, "utf-8");
            $content = preg_replace('/\W\w+\s*(\W*)$/', '$1', $content);
        }

        return $content;
    }

    static function characterToHTMLEntity($str) {
        $replace = array(
            "'", '&', '<', '>', '€', '‘', '’', '“', '”', '–', '—', '¡', '¢', '£', '¤', '¥', '¦', '§', '¨', '©', 'ª', '«', '¬', '®', '¯', '°', '±', '²', '³', '´', 'µ', '¶', '·', '¸', '¹', 'º', '»', '¼', '½', '¾', '¿', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', '×', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'Þ', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', '÷', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'þ', 'ÿ', 'Œ', 'œ', '‚', '„', '…', '™', '•', '˜'
        );

        $search = array(
            '&#8217;', '&amp;', '&lt;', '&gt;', '&euro;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&ndash;', '&mdash;', '&iexcl;', '&cent;', '&pound;', '&curren;', '&yen;', '&brvbar;', '&sect;', '&uml;', '&copy;', '&ordf;', '&laquo;', '&not;', '&reg;', '&macr;', '&deg;', '&plusmn;', '&sup2;', '&sup3;', '&acute;', '&micro;', '&para;', '&middot;', '&cedil;', '&sup1;', '&ordm;', '&raquo;', '&frac14;', '&frac12;', '&frac34;', '&iquest;', '&Agrave;', '&Aacute;', '&Acirc;', '&Atilde;', '&Auml;', '&Aring;', '&AElig;', '&Ccedil;', '&Egrave;', '&Eacute;', '&Ecirc;', '&Euml;', '&Igrave;', '&Iacute;', '&Icirc;', '&Iuml;', '&ETH;', '&Ntilde;', '&Ograve;', '&Oacute;', '&Ocirc;', '&Otilde;', '&Ouml;', '&times;', '&Oslash;', '&Ugrave;', '&Uacute;', '&Ucirc;', '&Uuml;', '&Yacute;', '&THORN;', '&szlig;', '&agrave;', '&aacute;', '&acirc;', '&atilde;', '&auml;', '&aring;', '&aelig;', '&ccedil;', '&egrave;', '&eacute;', '&ecirc;', '&euml;', '&igrave;', '&iacute;', '&icirc;', '&iuml;', '&eth;', '&ntilde;', '&ograve;', '&oacute;', '&ocirc;', '&otilde;', '&ouml;', '&divide;', '&oslash;', '&ugrave;', '&uacute;', '&ucirc;', '&uuml;', '&yacute;', '&thorn;', '&yuml;', '&OElig;', '&oelig;', '&sbquo;', '&bdquo;', '&hellip;', '&trade;', '&bull;', '&asymp;'
        );

        //REPLACE VALUES
        $str = str_replace($search, $replace, $str);

        //RETURN FORMATED STRING
        return $str;
    }

    /**
     *  Format bye 
     *
     * @package DDA Project
     * @since 1.0
     */
    public static function format_bytes($bytes) {
        $label = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB' );
        for( $i = 0; $bytes >= 1024 && $i < ( count( $label ) -1 ); $bytes /= 1024, $i++ );
        return( round( $bytes, 2 ) . " " . $label[$i] );
    } 

    /**
     * Remove Generate ShortCode CSS
     *
     * @param integer $scID
     *
     * @return void
     */
    static function removeGeneratorShortCodeCss($scID, $post_type) {
        global $wp_filesystem;
        // Initialize the WP filesystem, no more using 'file-put-contents' function
        if ( empty($wp_filesystem) ) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }

        $cssFile = EXDDA_PATH . '/assets/css/'.$post_type.'-sc.css';

        if (file_exists($cssFile) && ($oldCss = $wp_filesystem->get_contents($cssFile)) && strpos($oldCss, '/*sc-' . $scID . '-start') !== false) {
            $css = preg_replace('/\/\*sc-' . $scID . '-start[\s\S]+?sc-' . $scID . '-end\*\//', '', $oldCss);
            $css = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "", $css); 
            
            $wp_filesystem->put_contents( $cssFile, $css);
        }
    }  
    
    static function getCountryList() {
        $countryList = array(
            "AF" => "Afghanistan",
            "AX" => "Aland Islands",
            "AL" => "Albania",
            "DZ" => "Algeria",
            "AS" => "American Samoa",
            "AD" => "Andorra",
            "AO" => "Angola",
            "AI" => "Anguilla",
            "AQ" => "Antarctica",
            "AG" => "Antigua and Barbuda",
            "AR" => "Argentina",
            "AM" => "Armenia",
            "AW" => "Aruba",
            "AU" => "Australia",
            "AT" => "Austria",
            "AZ" => "Azerbaijan",
            "BS" => "Bahamas",
            "BH" => "Bahrain",
            "BD" => "Bangladesh",
            "BB" => "Barbados",
            "BY" => "Belarus",
            "BE" => "Belgium",
            "BZ" => "Belize",
            "BJ" => "Benin",
            "BM" => "Bermuda",
            "BT" => "Bhutan",
            "BO" => "Bolivia, Plurinational State of",
            "BQ" => "Bonaire, Sint Eustatius and Saba",
            "BA" => "Bosnia and Herzegovina",
            "BW" => "Botswana",
            "BV" => "Bouvet Island",
            "BR" => "Brazil",
            "IO" => "British Indian Ocean Territory",
            "BN" => "Brunei Darussalam",
            "BG" => "Bulgaria",
            "BF" => "Burkina Faso",
            "BI" => "Burundi",
            "KH" => "Cambodia",
            "CM" => "Cameroon",
            "CA" => "Canada",
            "CV" => "Cape Verde",
            "KY" => "Cayman Islands",
            "CF" => "Central African Republic",
            "TD" => "Chad",
            "CL" => "Chile",
            "CN" => "China",
            "CX" => "Christmas Island",
            "CC" => "Cocos (Keeling) Islands",
            "CO" => "Colombia",
            "KM" => "Comoros",
            "CG" => "Congo",
            "CD" => "Congo, the Democratic Republic of the",
            "CK" => "Cook Islands",
            "CR" => "Costa Rica",
            "CI" => "Côte d Ivoire",
            "HR" => "Croatia",
            "CU" => "Cuba",
            "CW" => "Curaçao",
            "CY" => "Cyprus",
            "CZ" => "Czech Republic",
            "DK" => "Denmark",
            "DJ" => "Djibouti",
            "DM" => "Dominica",
            "DO" => "Dominican Republic",
            "EC" => "Ecuador",
            "EG" => "Egypt",
            "SV" => "El Salvador",
            "GQ" => "Equatorial Guinea",
            "ER" => "Eritrea",
            "EE" => "Estonia",
            "ET" => "Ethiopia",
            "FK" => "Falkland Islands (Malvinas)",
            "FO" => "Faroe Islands",
            "FJ" => "Fiji",
            "FI" => "Finland",
            "FR" => "France",
            "GF" => "French Guiana",
            "PF" => "French Polynesia",
            "TF" => "French Southern Territories",
            "GA" => "Gabon",
            "GM" => "Gambia",
            "GE" => "Georgia",
            "DE" => "Germany",
            "GH" => "Ghana",
            "GI" => "Gibraltar",
            "GR" => "Greece",
            "GL" => "Greenland",
            "GD" => "Grenada",
            "GP" => "Guadeloupe",
            "GU" => "Guam",
            "GT" => "Guatemala",
            "GG" => "Guernsey",
            "GN" => "Guinea",
            "GW" => "Guinea-Bissau",
            "GY" => "Guyana",
            "HT" => "Haiti",
            "HM" => "Heard Island and McDonald Islands",
            "VA" => "Holy See (Vatican City State)",
            "HN" => "Honduras",
            "HK" => "Hong Kong",
            "HU" => "Hungary",
            "IS" => "Iceland",
            "IN" => "India",
            "ID" => "Indonesia",
            "IR" => "Iran, Islamic Republic of",
            "IQ" => "Iraq",
            "IE" => "Ireland",
            "IM" => "Isle of Man",
            "IL" => "Israel",
            "IT" => "Italy",
            "JM" => "Jamaica",
            "JP" => "Japan",
            "JE" => "Jersey",
            "JO" => "Jordan",
            "KZ" => "Kazakhstan",
            "KE" => "Kenya",
            "KI" => "Kiribati",
            "KP" => "Korea, Democratic People's Republic of",
            "KR" => "Korea, Republic of,",
            "KW" => "Kuwait",
            "KG" => "Kyrgyzstan",
            "LA" => "Lao Peoples Democratic Republic",
            "LV" => "Latvia",
            "LB" => "Lebanon",
            "LS" => "Lesotho",
            "LR" => "Liberia",
            "LY" => "Libya",
            "LI" => "Liechtenstein",
            "LT" => "Lithuania",
            "LU" => "Luxembourg",
            "MO" => "Macao",
            "MK" => "Macedonia, the former Yugoslav Republic of",
            "MG" => "Madagascar",
            "MW" => "Malawi",
            "MY" => "Malaysia",
            "MV" => "Maldives",
            "ML" => "Mali",
            "MT" => "Malta",
            "MH" => "Marshall Islands",
            "MQ" => "Martinique",
            "MR" => "Mauritania",
            "MU" => "Mauritius",
            "YT" => "Mayotte",
            "MX" => "Mexico",
            "FM" => "Micronesia, Federated States of",
            "MD" => "Moldova, Republic of",
            "MC" => "Monaco",
            "MN" => "Mongolia",
            "ME" => "Montenegro",
            "MS" => "Montserrat",
            "MA" => "Morocco",
            "MZ" => "Mozambique",
            "MM" => "Myanmar",
            "NA" => "Namibia",
            "NR" => "Nauru",
            "NP" => "Nepal",
            "NL" => "Netherlands",
            "NC" => "New Caledonia",
            "NZ" => "New Zealand",
            "NI" => "Nicaragua",
            "NE" => "Niger",
            "NG" => "Nigeria",
            "NU" => "Niue",
            "NF" => "Norfolk Island",
            "MP" => "Northern Mariana Islands",
            "NO" => "Norway",
            "OM" => "Oman",
            "PK" => "Pakistan",
            "PW" => "Palau",
            "PS" => "Palestine, State of",
            "PA" => "Panama",
            "PG" => "Papua New Guinea",
            "PY" => "Paraguay",
            "PE" => "Peru",
            "PH" => "Philippines",
            "PN" => "Pitcairn",
            "PL" => "Poland",
            "PT" => "Portugal",
            "PR" => "Puerto Rico",
            "QA" => "Qatar",
            "RE" => "Reunion",
            "RO" => "Romania",
            "RU" => "Russian Federation",
            "RW" => "Rwanda",
            "BL" => "Saint Barthélemy",
            "SH" => "Saint Helena, Ascension and Tristan da Cunha",
            "KN" => "Saint Kitts and Nevis",
            "LC" => "Saint Lucia",
            "MF" => "Saint Martin (French part)",
            "PM" => "Saint Pierre and Miquelon",
            "VC" => "Saint Vincent and the Grenadines",
            "WS" => "Samoa",
            "SM" => "San Marino",
            "ST" => "Sao Tome and Principe",
            "SA" => "Saudi Arabia",
            "SN" => "Senegal",
            "RS" => "Serbia",
            "SC" => "Seychelles",
            "SL" => "Sierra Leone",
            "SG" => "Singapore",
            "SX" => "Sint Maarten (Dutch part)",
            "SK" => "Slovakia",
            "SI" => "Slovenia",
            "SB" => "Solomon Islands",
            "SO" => "Somalia",
            "ZA" => "South Africa",
            "GS" => "South Georgia and the South Sandwich Islands",
            "SS" => "South Sudan",
            "ES" => "Spain",
            "LK" => "Sri Lanka",
            "SD" => "Sudan",
            "SR" => "Suriname",
            "SJ" => "Svalbard and Jan Mayen",
            "SZ" => "Swaziland",
            "SE" => "Sweden",
            "CH" => "Switzerland",
            "SY" => "Syrian Arab Republic",
            "TW" => "Taiwan, Province of China",
            "TJ" => "Tajikistan",
            "TZ" => "Tanzania, United Republic of",
            "TH" => "Thailand",
            "TL" => "Timor-Leste",
            "TG" => "Togo",
            "TK" => "Tokelau",
            "TO" => "Tonga",
            "TT" => "Trinidad and Tobago",
            "TN" => "Tunisia",
            "TR" => "Turkey",
            "TM" => "Turkmenistan",
            "TC" => "Turks and Caicos Islands",
            "TV" => "Tuvalu",
            "UG" => "Uganda",
            "UA" => "Ukraine",
            "AE" => "United Arab Emirates",
            "GB" => "United Kingdom",
            "US" => "United States",
            "UM" => "United States Minor Outlying Islands",
            "UY" => "Uruguay",
            "UZ" => "Uzbekistan",
            "VU" => "Vanuatu",
            "VE" => "Venezuela, Bolivarian Republic of",
            "VN" => "Viet Nam",
            "VG" => "Virgin Islands, British",
            "VI" => "Virgin Islands, U.S.",
            "WF" => "Wallis and Futuna",
            "EH" => "Western Sahara",
            "YE" => "Yemen",
            "ZM" => "Zambia",
            "ZW" => "Zimbabwe",
        );

        return apply_filters('rtseo_country_list', $countryList);
    }

    static function getLanguageList() {
        $language_list = array(
            "Akan",
            "Amharic",
            "Arabic",
            "Assamese",
            "Awadhi",
            "Azerbaijani",
            "Balochi",
            "Belarusian",
            "Bengali",
            "Bhojpuri",
            "Burmese",
            "Cantonese",
            "Cebuano",
            "Chewa",
            "Chhattisgarhi",
            "Chittagonian",
            "Czech",
            "Deccan",
            "Dhundhari",
            "Dutch",
            "English",
            "French",
            "Fula",
            "Gan",
            "German",
            "Greek",
            "Gujarati",
            "Haitian Creole",
            "Hakka",
            "Haryanvi",
            "Hausa",
            "Hiligaynon",
            "Hindi / Urdu",
            "Hmong",
            "Hungarian",
            "Igbo",
            "Ilokano",
            "Italian",
            "Japanese",
            "Javanese",
            "Jin",
            "Kannada",
            "Kazakh",
            "Khmer",
            "Kinyarwanda",
            "Kirundi",
            "Konkani",
            "Korean",
            "Kurdish",
            "Madurese",
            "Magahi",
            "Maithili",
            "Malagasy",
            "Malay/Indonesian",
            "Malayalam",
            "Mandarin",
            "Marathi",
            "Marwari",
            "Min Bei",
            "Min Dong",
            "Min Nan",
            "Mossi",
            "Nepali",
            "Oriya",
            "Oromo",
            "Pashto",
            "Persian",
            "Polish",
            "Portuguese",
            "Punjabi",
            "Quechua",
            "Romanian",
            "Russian",
            "Saraiki",
            "Serbo-Croatian",
            "Shona",
            "Sindhi",
            "Sinhalese",
            "Somali",
            "Spanish",
            "Sundanese",
            "Swahili",
            "Swedish",
            "Sylheti",
            "Tagalog",
            "Tamil",
            "Telugu",
            "Thai",
            "Turkish",
            "Ukrainian",
            "Uyghur",
            "Uzbek",
            "Vietnamese",
            "Wu",
            "Xhosa",
            "Xiang",
            "Yoruba",
            "Zulu",
        );

        $language_with_key = [];

        foreach( $language_list as $value ) {
            $language_with_key[$value] = $value;
        }

        return apply_filters('rtseo_language_list', $language_with_key);
    }
}
