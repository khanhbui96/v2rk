<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RechargeRule implements Rule
{
    private $minValue;
    private $maxValue;

    /**
     * RechargeRule constructor.
     * @param $minValue
     * @param $maxValue
     */
    public function __construct($minValue, $maxValue)
    {
        $this->minValue = (int)$minValue;
        $this->maxValue = (int)$maxValue;
    }


    public function passes($attribute, $value)
    {
        $value = (int)$value / 100;
        if ($value > $this->maxValue) {
            return false;
        }

        if ($value < $this->minValue) {
            return false;
        }
        return true;
    }

    public function message()
    {
        return __("Recharge amount range::min-:max", ["min" => $this->minValue, 'max' => $this->maxValue]);
    }
}