<?php namespace GoodWorx\Utilities\Models;

use Model;

/**
 * Series Model
 */
class Series extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'goodworx_utilities_series';

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
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}