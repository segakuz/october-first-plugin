<?php namespace SergeiKuznetsov\JuniorTestPlugin\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Illuminate\Support\Facades\Input;
use SergeiKuznetsov\JuniorTestPlugin\Models\Category;
use SergeiKuznetsov\JuniorTestPlugin\Classes\Resources\CategoryResource;

/**
 * Categories Back-end Controller
 */
class Categories extends Controller
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

        BackendMenu::setContext('SergeiKuznetsov.JuniorTestPlugin', 'juniortestplugin', 'categories');
    }

    /**
     * Shows category and its products
     */
    public function apiShow() {
        $slug = Input::get('category');
        $category = Category::where('slug', $slug)->first();

        if (!is_null($category)) {
            return new CategoryResource($category);
        }

        return response()->json(['message' => 'Not Found!'], 404);
    }
}
