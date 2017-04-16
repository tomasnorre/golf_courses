<?php

namespace TNM\GolfCourses\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Tomas Norre Mikkelsen <tomasnorre@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case for class \TNM\GolfCourses\Domain\Model\GolfCourse.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Tomas Norre Mikkelsen <tomasnorre@gmail.com>
 */
class GolfCourseTest extends UnitTestCase
{
    /**
     * @var \TNM\GolfCourses\Domain\Model\GolfCourse
     */
    protected $subject = null;

    public function setUp()
    {
        $this->subject = new \TNM\GolfCourses\Domain\Model\GolfCourse();
    }

    public function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getWebsiteReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getWebsite()
        );
    }

    /**
     * @test
     */
    public function setWebsiteForStringSetsWebsite()
    {
        $this->subject->setWebsite('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'website',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCommentReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getComment()
        );
    }

    /**
     * @test
     */
    public function setCommentForStringSetsComment()
    {
        $this->subject->setComment('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'comment',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCountryReturnsInitialValueForInt()
    {
        $this->assertEquals(
            0,
            $this->subject->getCountry()
        );
    }

    /**
     * @test
     */
    public function setCountryForIntSetsCountry()
    {
        $countryUid = 701;
        $this->subject->setCountry($countryUid);

        $this->assertEquals(
            $countryUid,
            $this->subject->getCountry()
        );
    }

    /**
     * @test
     */
    public function getLogoReturnsInitialValueForFileReference()
    {
        $this->assertEquals(
            null,
            $this->subject->getLogo()
        );
    }

    /**
     * @test
     */
    public function setLogoForFileReferenceSetsLogo()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setLogo($fileReferenceFixture);

        $this->assertAttributeEquals(
            $fileReferenceFixture,
            'logo',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLongitudeReturnsInitialValueForFloat()
    {
        $this->assertSame(
            '',
            $this->subject->getLongitude()
        );
    }

    /**
     * @test
     */
    public function setLongitude()
    {
        $this->subject->setLongitude('9.6125169');

        $this->assertAttributeEquals(
            '9.6125169',
            'longitude',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLatitudeReturnsInitialValueForFloat()
    {
        $this->assertSame(
            '',
            $this->subject->getLatitude()
        );
    }

    /**
     * @test
     */
    public function setLatitude()
    {
        $this->subject->setLatitude('57.232696');

        $this->assertAttributeEquals(
            '57.232696',
            'latitude',
            $this->subject
        );
    }
}
