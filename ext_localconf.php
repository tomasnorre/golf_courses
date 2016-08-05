<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TNM.' . $_EXTKEY,
	'Golfcourses',
	array(
		'List' => 'list',
		
	),
	// non-cacheable actions
	array(
		'List' => '',
		
	)
);
