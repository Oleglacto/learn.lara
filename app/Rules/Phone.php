<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Phone implements Rule
{
    protected $errorMessage = '';
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function validation($attribute, $value)
    {

    }
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $inputPhone = str_replace(['+', ' ', '(' , ')', '-'], '', $value);
        // только ли цифры?
        if (!is_numeric($inputPhone)) {
            $this->errorMessage = 'Введен неверный формат телфона';
            return false;
        }
        // Длина телефона
        if (!$this->checkLength($inputPhone,6,12)) {
            $this->errorMessage = 'Телефон введен верно?';
            return false;
        }
        return true;
    }

    /**
     * Функция для проверки длины input'а
     * @param string $value - input field
     * @param $min
     * @param $max
     * @return bool
     */
    protected function checkLength($value = "", $min, $max)
    {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if($this->errorMessage != '') {
            return $this->errorMessage;
        }

        return 'Введите телефон, пожалуйста';
    }
}
