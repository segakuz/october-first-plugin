<?php namespace SergeiKuznetsov\JuniorTestPlugin\Controllers;

use BackendMenu;
use Illuminate\Http\Request;
use Backend\Classes\Controller;
use Illuminate\Support\Facades\Validator;
use SergeiKuznetsov\JuniorTestPlugin\Models\Buy;


/**
 * Buys Back-end Controller
 */
class Buys extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('SergeiKuznetsov.JuniorTestPlugin', 'juniortestplugin', 'buys');
    }

    public function apiStore(Request $request) {

        $rules = [
            'product_id' => 'required|exists:sergeikuznetsov_juniortestplugin_products,id',
            'user_phone' => ['required', 'regex:/^((8|\+?7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/']
        ];

        $validator = Validator::make([
            'product_id' => post('product_id'),
            'user_phone' => post('user_phone')
        ], $rules);

        if ($validator->fails()) {

            return response()->json(['message' => $validator->errors()], 400);

        }

        $buy = new Buy;
        $buy->product_id = post('product_id');
        $buy->user_phone = post('user_phone');
        $buy->save();

        return response()->json(['message' => 'Success. New Buy created'], 201);
    }
}
