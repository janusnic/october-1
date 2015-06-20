<?php namespace GoodWorx\Utilities\Models;

use Model;

/**
 * Person Model
 */
class Person extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'goodworx_utilities_people';

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
    public $hasMany = ['sermons' => ['GoodWorx\Utilities\Models\Sermon']];
    public $belongsTo = [];
    public $belongsToMany = [
        'roles' => [
            'GoodWorx\Utilities\Models\Role',
            'table' => 'goodworx_utilities_people_roles'
        ]
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}