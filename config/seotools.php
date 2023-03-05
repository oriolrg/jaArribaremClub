<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Ja Arribarem Club. - Caminada Popular Vall de Lord", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Ja Arribarem Club. Caminada Popular Vall de Lord. Som un grup de persones vinculades d\'una manera o altra a la Vall de Lord, que tenim en comú la passió per la natura. I és per això, que volem conservar al màxim possible els entorns que des de sempre han envoltat la nostra vall, i de la mateixa manera donar-ho a conèixer a persones que no han tingut el privilegi de viure en un lloc tan meravellós com és el nostre.', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['JaArribaremClub', 'Ja Arribarem Club', 'Vall de Lord', 'ValldeLord', 'La Coma', 'Guixers', 'Sant Llorenç de Morunys', 'Caminada popular Vall de Lord', 'Caminada'],
            'canonical'    => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => "Ja Arribarem Club. - Caminada Popular Vall de Lord", // set false to total remove
            'description' => 'Ja Arribarem Club. Caminada Popular Vall de Lord. Som un grup de persones vinculades d\'una manera o altra a la Vall de Lord, que tenim en comú la passió per la natura. I és per això, que volem conservar al màxim possible els entorns que des de sempre han envoltat la nostra vall, i de la mateixa manera donar-ho a conèixer a persones que no han tingut el privilegi de viure en un lloc tan meravellós com és el nostre.', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => ['https://jaarribaremclub.com/img/favicon.png'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'Ja Arribarem Club. Caminada Popular Vall de Lord. Som un grup de persones vinculades d\'una manera o altra a la Vall de Lord, que tenim en comú la passió per la natura. I és per això, que volem conservar al màxim possible els entorns que des de sempre han envoltat la nostra vall, i de la mateixa manera donar-ho a conèixer a persones que no han tingut el privilegi de viure en un lloc tan meravellós com és el nostre.',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Ja Arribarem Club. - Caminada Popular Vall de Lord',
            'description' => 'Ja Arribarem Club. Caminada Popular Vall de Lord. Som un grup de persones vinculades d\'una manera o altra a la Vall de Lord, que tenim en comú la passió per la natura. I és per això, que volem conservar al màxim possible els entorns que des de sempre han envoltat la nostra vall, i de la mateixa manera donar-ho a conèixer a persones que no han tingut el privilegi de viure en un lloc tan meravellós com és el nostre.', // set false to total remove
            'url'         => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
