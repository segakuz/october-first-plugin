<?php namespace SergeiKuznetsov\JuniorTestPlugin\Models;

use Model;

/**
 * Buy Model
 */
class Buy extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'sergeikuznetsov_juniortestplugin_buys';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'product_id',
        'user_phone'
    ];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'product_id' => 'required|exists:sergeikuznetsov_juniortestplugin_products,id',
        'user_phone' => ['required', 'regex:/^((8|\+?7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/']
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'product' => 'SergeiKuznetsov\JuniorTestPlugin\Models\Product'
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
