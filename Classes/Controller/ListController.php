<?php
namespace TNM\GolfCourses\Controller;

/***************************************************************
 *
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

use SJBR\StaticInfoTables\Domain\Model\Country;
use TNM\GolfCourses\Domain\Model\GolfCourse;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * GolfCourseController
 */
class ListController extends ActionController
{

    /**
     * golfCourseRepository
     *
     * @var \TNM\GolfCourses\Domain\Repository\GolfCourseRepository
     * @TYPO3CMSExtbaseAnnotationInject
     */
    protected $golfCourseRepository = null;

    /**
     * @var \SJBR\StaticInfoTables\Domain\Repository\CountryRepository
     * @TYPO3CMSExtbaseAnnotationInject
     */
    protected $countryRepository = null;

    /**
     * @var \TYPO3\CMS\Core\Configuration\ExtensionConfiguration
     * @TYPO3CMSExtbaseAnnotationInject
     */
    protected $extensionConfiguration = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $countryAndCourses = [];
        $coursesTotal = 0;
        $countriesUidsInUse = $this->golfCourseRepository->findCountriesUidsInUse();

        foreach ($countriesUidsInUse as $countryUid) {
            /** @var Country $country */
            $country = $this->countryRepository->findByUid($countryUid);
            $countryName = $country->getShortNameEn();
            $coursesInCountry = $this->golfCourseRepository->findAllInCountry($countryUid);
            if (!count($coursesInCountry)) {
                continue;
            }
            $countryAndCourses[$countryName]['name'] = $countryName;
            /** @var GolfCourse $course */
            foreach ($coursesInCountry as $course) {
                $countryAndCourses[$countryName]['courses'][$course->getUid()] = $course;
                $coursesTotal++;
            }
            $countryAndCourses[$countryName]['coursesPlayed'] = $coursesInCountry->count();
        }

        $this->view->assign('mapsApiKey', $this->extensionConfiguration->get('apiKey'));
        $this->view->assign('countryAndCourses', $countryAndCourses);
        $this->view->assign('coursesCount', $coursesTotal);
        $this->view->assign('countriesCount', count($countryAndCourses));
    }
}
