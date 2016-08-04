<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'TNM.' . $_EXTKEY,
	'Golfcourses',
	'Played courses List'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Golf Courses');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_golfcourses_domain_model_golfcourse', 'EXT:golf_courses/Resources/Private/Language/locallang_csh_tx_golfcourses_domain_model_golfcourse.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_golfcourses_domain_model_golfcourse');
