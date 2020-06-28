<?php
class DateModifier{
    public function  calcolateDateDiff(string $dateFrom, $dateTo):int
    {
        $minDate = $dateFrom;
        $maxDate = $dateTo;

        $dateFromParts = array_map('intval', explode(" ", $dateFrom));
        $dateToParts = array_map('intval', explode(" ", $dateTo));

        if ($dateFromParts[0] > $dateToParts[0]){
            $minDate = $dateTo;
            $maxDate = $dateFrom;
        }
        elseif ($dateFromParts[0] == $dateToParts[0] && $dateFromParts[1] > $dateToParts[1]){
            $minDate = $dateTo;
            $maxDate = $dateFrom;
        }
        elseif ($dateFromParts[0] == $dateToParts[0] && $dateFromParts[1] == $dateToParts[1] && $dateFromParts[2] > $dateToParts[2]){
            $minDate = $dateTo;
            $maxDate = $dateFrom;
        }

        $days = 0;

        $dateFromParts = array_map('intval', explode(" ", $minDate));
        $dateToParts = array_map('intval', explode(" ", $maxDate));

        $days += (($dateToParts[0] - $dateFromParts[0]) * 365);

        for ($year = $dateFromParts[0]; $year <= $dateToParts[0]; $year++) {
            if ($this->isLeapYear($year)) {
                $days++;
            }
        }

        if ($this->isLeapYear($dateFromParts[0]) && $dateToParts[0] == $dateFromParts[0] && $dateFromParts[1] >= 3) {
            $days--;
        }

        if ($this->isLeapYear($dateToParts[0]) && $dateToParts[1] < 3) {
            $days--;
        }

        $days +=
            $this->getDayFromBeginning($dateToParts[0], $dateToParts[1], $dateToParts[2])
            -
            $this->getDayFromBeginning($dateFromParts[0], $dateFromParts[1], $dateFromParts[2]);

        return $days;
    }

    private function isLeapYear(int $year):bool {
        if($year % 4  == 0 && $year % 100  != 0 || $year % 400  == 0) return true;

        return false;
    }

    private function getDayFromBeginning(int $year, int $month, int $days):int {

        if ($month == 1)return $days;
        if ($month == 2) return  31 + $days;

        $fullMonth = $month / 2 + 1;

        if ($month <= 7){
            $fullMonth = ceil($month / 2);
        }

        $halfMonth = $month - $fullMonth - 1;

        $daysPass = $fullMonth * 31 + $halfMonth * 30;

        $daysPass--;

        if (!$this->isLeapYear($year)){
            $daysPass--;
        }

        $daysPass += $days;

        return  $daysPass;
    }
}
$diff = new DateModifier();

echo $diff->calcolateDateDiff(readline(), readline());
