<?php
namespace TNM\GolfCourses\Service;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 3 Nov 2017 Tomas Norre Mikkelsen <tomasnorre@gmail.com>
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

use TYPO3\CMS\Extensionmanager\Utility\ConfigurationUtility;

/**
 * Class ExtensionSettingsService
 *
 * @package TNM\GolfCourses\Service
 */
class ExtensionSettingsService
{
    /**
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     * @inject
     */
    protected $objectManager;

    /**
     * @param $settingKey
     *
     * @return string
     */
    public function getSetting($settingKey)
    {
        $extensionSetting = $this->getAllSettings();
        if ( key_exists($settingKey, $extensionSetting)) {
            return $extensionSetting[$settingKey];
        }

        return '';
    }

    /**
     * @return array
     */
    private function getAllSettings()
    {
        /** @var ConfigurationUtility $configurationUtility */
        $configurationUtility = $this->objectManager->get(ConfigurationUtility::class);
        return $configurationUtility->getCurrentConfiguration('golf_courses');
    }
}