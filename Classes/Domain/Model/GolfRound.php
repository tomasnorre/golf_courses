<?php
namespace TNM\GolfCourses\Domain\Model;

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

/**
 * Class GolfRound
 *
 * @package TNM\GolfCourses\Domain\Model
 */
class GolfRound extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var int
     */
    protected $date;

    /**
     * @var int
     */
    protected $course;

    /**
     * @var int
     */
    protected $par;

    /**
     * @var int
     */
    protected $strokes;

    /**
     * @var string
     */
    protected $score;

    /**
     * @var boolean
     */
    protected $regulation;

    /**
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @param int $course
     */
    public function setCourse($course)
    {
        $this->course = $course;
    }

    /**
     * @return int
     */
    public function getPar()
    {
        return $this->par;
    }

    /**
     * @param int $par
     */
    public function setPar($par)
    {
        $this->par = $par;
    }

    /**
     * @return int
     */
    public function getStrokes()
    {
        return $this->strokes;
    }

    /**
     * @param int $strokes
     */
    public function setStrokes($strokes)
    {
        $this->strokes = $strokes;
    }

    /**
     * @return string
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param string $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return boolean
     */
    public function isRegulation()
    {
        return $this->regulation;
    }

    /**
     * @param boolean $regulation
     */
    public function setRegulation($regulation)
    {
        $this->regulation = $regulation;
    }
}