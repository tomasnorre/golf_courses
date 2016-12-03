<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'TNM.' . $_EXTKEY,
    'Golfcourses',
    'Played courses List'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'TNM.' . $_EXTKEY,
    'Golfrounds',
    'Best Rounds List'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Golf Courses');

// Golf Courses
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_golfcourses_domain_model_golfcourse', 'EXT:golf_courses/Resources/Private/Language/Csh/locallang_csh_tx_golfcourses_domain_model_golfcourse.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_golfcourses_domain_model_golfcourse');

// Golf Round
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_golfcourses_domain_model_golfround', 'EXT:golf_courses/Resources/Private/Language/Csh/locallang_csh_tx_golfcourses_domain_model_golfround.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_golfcourses_domain_model_golfround');
