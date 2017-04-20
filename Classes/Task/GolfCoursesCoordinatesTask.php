<?php
namespace TNM\GolfCourses\Task;

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

use TNM\GolfCourses\Domain\Model\GolfCourse;
use TNM\GolfCourses\Domain\Repository\GolfCourseRepository;
use TNM\GolfCourses\Service\GoogleCoordinatesService;
use TNM\GolfCourses\Utility\ExtensionSettingsUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Scheduler\Task\AbstractTask;

/**
 * Class GolfCoursesCoordinatesTask
 *
 * @package TNM\GolfCourses\Task
 */
class GolfCoursesCoordinatesTask extends AbstractTask
{
    /**
     * @var \TNM\GolfCourses\Domain\Repository\GolfCourseRepository
     */
    protected $golfCourseRepository;

    /**
     *
     */
    public function execute()
    {
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->golfCourseRepository = $objectManager->get(GolfCourseRepository::class);

        $limit = ExtensionSettingsUtility::getSetting('schedulerProcessLimit');
        $golfCoursesWithOutCoordinates = $this->golfCourseRepository->findCountriesWithOutCoordinates($limit);
        /** @var GolfCourse $golfCourse */
        foreach ($golfCoursesWithOutCoordinates as $golfCourse) {
            $coordinates = GoogleCoordinatesService::getCoordinates($golfCourse->getName());
            if (!empty($coordinates)) {
                $golfCourse->setLatitude((string) $coordinates['latitude']);
                $golfCourse->setLongitude((string) $coordinates['longitude']);
                $this->golfCourseRepository->update($golfCourse);
                $this->golfCourseRepository->persistAll();
            }
        }
        return true;
    }
}

