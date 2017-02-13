<?php
/**
 * Created by PhpStorm.
 * User: sopheak
 * Date: 2/13/2017 AD
 * Time: 10:24 PM
 */

namespace app\Models;


use Illuminate\Database\Eloquent\Model;

class MyModels extends Model
{
    public function __construct(array $attributes)
    {
        parent::__construct($attributes);
    }
}