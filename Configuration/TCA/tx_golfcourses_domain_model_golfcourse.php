<?php
return [
	'ctrl' => [
		'title'	=> 'LLL:EXT:golf_courses/Resources/Private/Language/locallang_db.xlf:tx_golfcourses_domain_model_golfcourse',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
        ],
		'searchFields' => 'name,website,comment,country,logo,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('golf_courses') . 'Resources/Public/Icons/tx_golfcourses_domain_model_golfcourse.png'
    ],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, website, comment, country, logo',
    ],
	'types' => [
		'1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, website, comment, country, logo, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
	'palettes' => [
		'1' => ['showitem' => ''],
    ],
	'columns' => [
	
		'sys_language_uid' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => [
					['LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1],
					['LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0]
                ],
            ],
        ],
		'l10n_parent' => [
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					['', 0],
                ],
				'foreign_table' => 'tx_golfcourses_domain_model_golfcourse',
				'foreign_table_where' => 'AND tx_golfcourses_domain_model_golfcourse.pid=###CURRENT_PID### AND tx_golfcourses_domain_model_golfcourse.sys_language_uid IN (-1,0)',
            ],
        ],
		'l10n_diffsource' => [
			'config' => [
				'type' => 'passthrough',
            ],
        ],
		't3ver_label' => [
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'max' => 255,
            ]
        ],
		'hidden' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => [
				'type' => 'check',
            ],
        ],
		'starttime' => [
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => [
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => [
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ],
            ],
        ],
		'endtime' => [
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => [
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => [
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ],
            ],
        ],
		'name' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:golf_courses/Resources/Private/Language/locallang_db.xlf:tx_golfcourses_domain_model_golfcourse.name',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
            ],
        ],
		'website' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:golf_courses/Resources/Private/Language/locallang_db.xlf:tx_golfcourses_domain_model_golfcourse.website',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
            ],
        ],
		'comment' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:golf_courses/Resources/Private/Language/locallang_db.xlf:tx_golfcourses_domain_model_golfcourse.comment',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
            ],
        ],
		'country' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:golf_courses/Resources/Private/Language/locallang_db.xlf:tx_golfcourses_domain_model_golfcourse.country',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					['Select Country', -1],
                ],
				'foreign_table' => 'static_countries',
				'foreign_table_where' => 'ORDER BY cn_official_name_en ASC',
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
            ],
        ],
		'logo' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:golf_courses/Resources/Private/Language/locallang_db.xlf:tx_golfcourses_domain_model_golfcourse.logo',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'logo',
				[
					'appearance' => [
						'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                    ],
					'foreign_types' => [
						'0' => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ]
                    ],
					'maxitems' => 1
                ],
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
        ],

    ],
];