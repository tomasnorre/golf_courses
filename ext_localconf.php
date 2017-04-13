<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'TNM.' . $_EXTKEY,
    'GolfCourses',
    [
        'List' => 'list',
    ],
    // non-cacheable actions
    [
        'List' => 'list',
    ]
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'TNM.' . $_EXTKEY,
    'GolfRounds',
    [
        'Rounds' => 'list',

    ],
    // non-cacheable actions
    [
        'Rounds' => 'list',
    ]
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][$_EXTKEY] =
    \TNM\GolfCourses\Hook\Tcemain::class;
