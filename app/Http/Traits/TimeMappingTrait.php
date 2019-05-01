<?php
namespace App\Http\Traits;

trait TimeMappingTrait
{
    /**
     * Following updated to used standard.
     * https://stackoverflow.com/questions/3903317/how-can-i-make-an-array-of-times-with-half-hour-intervals
     *
     * @return array
     */
    public function halfHourTimes(): array
    {
        $formatter = function ($time) {
            if ($time % 3600 == 0) {
                return date('G.i', $time);
            }
            return date('G.i', $time);
        };
        $halfHourSteps = range(0, 47*1800, 1800);
        return array_map($formatter, $halfHourSteps);
    }
}
