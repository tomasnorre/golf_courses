<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:golf_courses/Resources/Private/Language/locallang_db.xlf:tx_golfcourses_domain_model_golfround',
        'label' => 'date',
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
        'searchFields' => 'date,course,par,strokes,score',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('golf_courses') . 'Resources/Public/Icons/tx_golfcourses_domain_model_golfround.png'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, date, course, par, strokes, regulation, score',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, date, course, par, strokes, regulation, score, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_golfcourses_domain_model_golfround',
                'foreign_table_where' => 'AND tx_golfcourses_domain_model_golfround.pid=###CURRENT_PID### AND tx_golfcourses_domain_model_golfround.sys_language_uid IN (-1,0)',
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
        'date' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:golf_courses/Resources/Private/Language/locallang_db.xlf:tx_golfcourses_domain_model_golfround.date',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'date',
                'checkbox' => 0,
                'default' => 0,
            ],
        ],
        'course' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:golf_courses/Resources/Private/Language/locallang_db.xlf:tx_golfcourses_domain_model_golfround.course',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_golfcourses_domain_model_golfcourse',
                'foreign_table_where' => 'ORDER BY tx_golfcourses_domain_model_golfcourse.name',
            ],
        ],
        'par' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:golf_courses/Resources/Private/Language/locallang_db.xlf:tx_golfcourses_domain_model_golfround.par',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'trim'
            ],
        ],
        'strokes' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:golf_courses/Resources/Private/Language/locallang_db.xlf:tx_golfcourses_domain_model_golfround.strokes',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'trim'
            ],
        ],
        'regulation' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:golf_courses/Resources/Private/Language/locallang_db.xlf:tx_golfcourses_domain_model_golfround.regulation',
            'config' => [
                'type' => 'check',
                'default' => 0
            ],
        ],
        'score' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:golf_courses/Resources/Private/Language/locallang_db.xlf:tx_golfcourses_domain_model_golfround.score',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'trim',
                'readOnly' =>1,
            ],
        ],
    ],
];