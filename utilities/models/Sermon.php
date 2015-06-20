<?php namespace GoodWorx\Utilities\Models;

use Model;

/**
 * Sermon Model
 */
class Sermon extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'goodworx_utilities_sermons';

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

    public $belongsTo = [
    'series' => ['GoodWorx\Utilities\Models\Series'],
    'person' => ['GoodWorx\Utilities\Models\Person']
    ];
}