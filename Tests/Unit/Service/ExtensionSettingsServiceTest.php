<?php
namespace TNM\GolfCourses\Tests\Unit\Service;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Tomas Norre Mikkelsen <tomasnorre@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TNM\GolfCourses\Service\ExtensionSettingsService;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Class ExtensionSettingsServiceTest
 *
 * @package TNM\GolfCourses\Tests\Unit\Service
 */
class ExtensionSettingsServiceTest extends UnitTestCase
{

    /**
     * @var ExtensionSettingsService
     */
    protected $subject;

    /**
     * Set Up
     */
    public function setUp()
    {
        $settings = [
            'api_key' => 'this-is-my-api-key-for-testing',
            'extkey' => 'golf_course'
        ];

        $this->subject = $this->getAccessibleMock(ExtensionSettingsService::class, ['getAllSettings'], [], '', false);
        $this->subject->expects($this->any())->method('getAllSettings')->willReturn($settings);
    }

    /**
     * @test
     */
    public function getSettingExpectsEmptySettingsAsKeyIsUnknown()
    {
        $this->assertEquals(
            '',
            $this->subject->getSetting('no_valid_key')
        );
    }

    /**
     * @test
     */
    public function getSettingExpectsReturnValue()
    {
        $this->assertEquals(
            'this-is-my-api-key-for-testing',
            $this->subject->getSetting('api_key')
        );

        $this->assertEquals(
            'golf_course',
            $this->subject->getSetting('extkey')
        );
    }
}