<?php
namespace TNM\GolfCourses\Service;

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

/**
 * Class GoogleCoordinatesService
 *
 * @package TNM\GolfCourses\Service
 */
class GoogleCoordinatesService
{
    /**
     * @param $address
     *
     * @return array
     * @codeCoverageIgnore
     */
    public static function getCoordinates($address)
    {

        if (empty($address)) {
            return [];
        }

        $address = urlencode($address);
        $address = str_replace(' ', '+', $address);
        $url = 'http://maps.google.com/maps/api/geocode/json?sensor=false&address=' . $address;

        $response = file_get_contents($url);

        //generate array object from the response from the web
        $json = json_decode($response, true);

        return [
            'longitude' => $json['results'][0]['geometry']['location']['lng'],
            'latitude' => $json['results'][0]['geometry']['location']['lat']
        ];
    }
}