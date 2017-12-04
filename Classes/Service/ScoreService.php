<?php
namespace TNM\GolfCourses\Service;

/**
 * Class ScoreService
 *
 */
class ScoreService
{

    /**
     * @return int
     */
    public function calculateScoreToPar($coursePar, $strokes)
    {
        if ($coursePar === $strokes) {
            return 'par';
        }

        $prefix = '';
        $score = $strokes - $coursePar;

        if ($score > 0) {
            $prefix = '+';
        }
        return $prefix . $score;
    }
}
