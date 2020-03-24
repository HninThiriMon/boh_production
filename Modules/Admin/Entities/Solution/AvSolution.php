<?php

namespace Modules\Admin\Entities\solution;

use Illuminate\Database\Eloquent\Model;

class AvSolution extends Model
{
    protected $fillable = [
        'name',
        'description',
        'list_1',
        'list_2',
        'list_3',
        'list_4',
        'main_image',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
    ];
}
