<?php namespace MichaelBishop\Website\Models;

use Model;

/**
 * Minister Model
 */
class Minister extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pms_pers';

    protected $primaryKey = 'pfnum';

    protected $connection = 'mysql2';

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

}