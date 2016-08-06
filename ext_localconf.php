<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

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
