<?php
namespace TNM\GolfCourses\Hook;

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

use TNM\GolfCourses\Service\GoogleCoordinatesService;
use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class TcemainCoordinatesHook
 *
 * @package TNM\GolfCourses\Hook
 */
class TcemainCoordinatesHook
{

    const GOLF_COURSE_TALBE = 'tx_golfcourses_domain_model_golfcourse';

    /**
     *
     * @param array $incomingFieldArray
     * @param string $table
     * @param string|int $id
     * @param DataHandler $dataHandler
     * @return void
     */
    public function processDatamap_preProcessFieldArray(&$incomingFieldArray, $table, $id, DataHandler $dataHandler)
    {
        if (static::GOLF_COURSE_TALBE !== $table) {
            return;
        }

        $coordinates = GoogleCoordinatesService::getCoordinates($incomingFieldArray['name']);

        $incomingFieldArray['latitude'] = (string) $coordinates['latitude'];
        $incomingFieldArray['longitude'] = (string) $coordinates['longitude'];
    }
}
