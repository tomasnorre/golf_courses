<?php
namespace TNM\GolfCourses\Domain\Repository;

/***************************************************************
 *
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

use TYPO3\CMS\Core\Database\DatabaseConnection;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * The repository for GolfCourses
 */
class GolfCourseRepository extends Repository
{

    /**
     * @param $countryUid
     *
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findAllInCountry($countryUid)
    {
        /** @var QueryInterface $query */
        $query = $this->createQuery();

        $querySettings = $query->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $querySettings->setIgnoreEnableFields(false);

        $query->matching($query->equals('country', $countryUid));
        $query->setOrderings(['name' => 'ASC']);
        $query->setQuerySettings($querySettings);

        return $query->execute();
    }

    /**
     * @return array
     */
    public function findCountriesUidsInUse()
    {
        $uids = [];
        $courses = $this->getDatabaseConnection()->exec_SELECTquery(
            'DISTINCT country',
            'tx_golfcourses_domain_model_golfcourse',
            ''
        );

        foreach ($courses as $course) {
            $uids[] = $course['country'];
        }

        return $uids;
    }

    /**
     * @param int $limit
     *
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findCountriesWithOutCoordinates(int $limit = 10)
    {
        /** @var QueryInterface $query */
        $query = $this->createQuery();
        $query->setLimit($limit);

        $querySettings = $query->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $querySettings->setIgnoreEnableFields(false);

        $query->matching($query->equals('longitude', ''));
        $query->matching($query->equals('latitude', ''));
        $query->setQuerySettings($querySettings);

        return $query->execute();
    }

    /**
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findAllActive()
    {
        $query = $this->createQuery();

        $querySettings = $query->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $querySettings->setIgnoreEnableFields(true);
        $query->setQuerySettings($querySettings);

        return $query->execute();
    }

    /**
     * Persist All
     */
    public function persistAll()
    {
        /** @var PersistenceManager $persistenceManager */
        $persistenceManager = GeneralUtility::makeInstance(PersistenceManager::class);
        $persistenceManager->persistAll();

    }

    /**
     * @return DatabaseConnection
     */
    protected function getDatabaseConnection()
    {
        return $GLOBALS['TYPO3_DB'];
    }
}
