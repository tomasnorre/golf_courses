<?php
namespace TNM\GolfCourses\Tests\Functional\Domain\Repository;

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

use Nimut\TestingFramework\TestCase\FunctionalTestCase;
use TNM\GolfCourses\Domain\Model\GolfCourse;
use TNM\GolfCourses\Domain\Repository\GolfCourseRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * Class GolfCourseRepositoryTest
 *
 */
class GolfCourseRepositoryTest extends FunctionalTestCase
{

    /**
     * @var array
     */
    protected $coreExtensionsToLoad = ['cms', 'core', 'fluid', 'extensionmanager'];

    /**
     * @var array
     */
    protected $testExtensionsToLoad = [
        'typo3conf/ext/golf_courses',
        'typo3conf/ext/static_info_tables'
    ];

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var GolfCourseRepository
     */
    protected $subject;

    /**
     * Setup
     */
    public function setUp()
    {
        parent::setUp();
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->subject = $this->objectManager->get(GolfCourseRepository::class);
        $this->importDataSet(dirname(__FILE__) . '/../../Fixtures/tx_golfcourses_domain_model_golfcourse.xml');
    }

    /**
     * @test
     */
    public function findCountriesUidsInUseTest()
    {
        $this->assertEquals(
            [1, 4],
            array_values($this->subject->findCountriesUidsInUse())
        );
    }

    /**
     * @test
     */
    public function findAllInCountryTest()
    {
        $expectedCoursesUid = [1, 2];
        $actualCoursesUid = [];

        $actualCourses = $this->subject->findAllInCountry(1);
        /** @var GolfCourse $course */
        foreach ($actualCourses as $course) {
            array_push($actualCoursesUid, $course->getUid());
        }

        $this->assertEquals(
            $expectedCoursesUid,
            $actualCoursesUid
        );
    }

    /**
     * @test
     */
    public function findCountriesWithOutCoordinatesTest()
    {
        $expectedCoursesUid = [4];
        $actualCoursesUid = [];

        $actualCourses = $this->subject->findCountriesWithOutCoordinates(10);
        /** @var GolfCourse $course */
        foreach ($actualCourses as $course) {
            array_push($actualCoursesUid, $course->getUid());
        }

        $this->assertEquals(
            $expectedCoursesUid,
            $actualCoursesUid
        );
    }

    /**
     * @test
     */
    public function findAllActiveTest()
    {
        $expectedCoursesUid = [1, 2, 4];
        $actualCoursesUid = [];

        $actualCourses = $this->subject->findAllActive();
        /** @var GolfCourse $course */
        foreach ($actualCourses as $course) {
            array_push($actualCoursesUid, $course->getUid());
        }

        $this->assertEquals(
            $expectedCoursesUid,
            $actualCoursesUid
        );
    }
}
