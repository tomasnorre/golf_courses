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
    'GolfCoursesJson',
    [
        'Json' => 'list',
    ],
    // non-cacheable actions
    [
        'Json' => 'list',
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

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][$_EXTKEY . '_scoresHook'] =
    \TNM\GolfCourses\Hook\TcemainScoresHook::class;

//$GLOBALS ['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][$_EXTKEY . '_coordinatesHook'] =
//    \TNM\GolfCourses\Hook\TcemainCoordinatesHook::class;


$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\TNM\GolfCourses\Task\GolfCoursesCoordinatesTask::class] = [
    'extension' => $_EXTKEY,
    'title' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_db.xlf:tx_golfcourses_task_coordinates.name',
    'description' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_db.xlf:tx_golfcourses_task_coordinates.description',
];
