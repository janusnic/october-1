<?php namespace GoodWorx\Utilities\Models;

use Model;

/**
 * Role Model
 */
class Role extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'goodworx_utilities_roles';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [
        'people' => [
            'GoodWorx\Utilities\Models\Person',
            'table' => 'goodworx_utilities_people_roles'
        ]
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}