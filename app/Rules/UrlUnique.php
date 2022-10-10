<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Support\Facades\DB;

class UrlUnique implements Rule
{
    /**
     * All of the data under validation.
     *
     * @var array
     */
    protected $id = 0;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
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
        return DB::table('links')->where('url', $value)->where('id', '<>', $this->id)->count() == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute has already been taken.';
    }
}
