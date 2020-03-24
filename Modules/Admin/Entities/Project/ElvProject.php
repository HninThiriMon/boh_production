<?php

namespace Modules\Admin\Entities\project;

use Illuminate\Database\Eloquent\Model;

class ElvProject extends Model
{
    protected $fillable = [
        'description',
        'company_name',
        'solution_name',
        'awarded_date',
        'city',
        'cover_image',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
    ];
}
