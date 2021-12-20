<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'project_number',
        'name',
        'type',
        'start_date',
        'end_date',
        'liability_min',
        'liability_max',
        'currency',
        'countries',
        'has_file',
    ];
}