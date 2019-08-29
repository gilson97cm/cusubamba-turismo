<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryActivity extends Model
{
    protected $table = 'category_activities';
    protected $fillable = [
        'name_category_activity',
        'description_category_activity',
        ];
}
