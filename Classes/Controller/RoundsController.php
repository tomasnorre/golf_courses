<?php
namespace TNM\GolfCourses\Controller;

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
use TNM\GolfCourses\Domain\Model\GolfRound;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class BestScoreController
 *
 */
class RoundsController extends ActionController
{

    /**
     * @var \TNM\GolfCourses\Domain\Repository\GolfRoundRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $golfRoundRepository;

    /**
     * @var \TNM\GolfCourses\Domain\Repository\GolfCourseRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $golfCourseRepository;

    /**
     * @var \SJBR\StaticInfoTables\Domain\Repository\CountryRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $countryRepository;

    /**
     * @return void
     */
    public function listAction()
    {
        $rounds = [];
        $golfRounds = $this->golfRoundRepository->findAll();

        /** @var GolfRound $golfRound */
        foreach ($golfRounds as $golfRound) {
            $rounds[] = [
                'date' => $golfRound->getDate(),
                'regulation' => $golfRound->isRegulation(),
                'course' => $this->getCourseNameAndCountry($golfRound->getCourse()),
                'par' => $golfRound->getPar(),
                'strokes' => $golfRound->getStrokes(),
                'score' => $golfRound->getScore(),
            ];
        }
        $this->view->assign('rounds', $rounds);
    }

    /**
     * @param $uid
     *
     * @return string
     */
    private function getCourseNameAndCountry($uid)
    {
        /** @var GolfCourse $golfCourse */
        $golfCourse = $this->golfCourseRepository->findByUid($uid);

        /** @var Country $country */
        $country = $this->countryRepository->findByUid($golfCourse->getCountry());
        $countryName = $country->getIsoCodeA2();

        return $golfCourse->getName() . ' (' . $countryName . ')';
    }
}
