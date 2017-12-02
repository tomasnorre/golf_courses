<?php
namespace TNM\GolfCourses\Controller;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * Class JsonController
 *
 * @package TNM\GolfCourses\Controller
 */
class JsonController extends ActionController
{

    /**
     * @var \TYPO3\CMS\Extbase\Mvc\View\JsonView
     */
    protected $view;

    /**
     * @var string
     */
    protected $defaultViewObjectName = \TYPO3\CMS\Extbase\Mvc\View\JsonView::class;

    /**
     * @var \TNM\GolfCourses\Domain\Repository\GolfCourseRepository
     * @inject
     */
    protected $golfCourseRepository;

    /**
     * action json
     *
     * @return void
     */
    public function listAction()
    {
        $golfCoursesPlayed = $this->golfCourseRepository->findAllActive();
        $golfCoursesFuture = $this->golfCourseRepository->findAllFutureCourses();

        $golfCourses = [
            ['golfCoursesPlayed' => $golfCoursesPlayed],
            ['golfCoursesFuture' => $golfCoursesFuture]
        ];

        $this->view->setVariablesToRender(['view']);
        $this->view->assign('view', $golfCourses);
    }
}