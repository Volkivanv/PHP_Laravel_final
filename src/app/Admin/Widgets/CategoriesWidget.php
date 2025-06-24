<?php

namespace App\Admin\Widgets;

use App\Models\Category;
use Arrilot\Widgets\AbstractWidget;

class CategoriesWidget extends AbstractWidget
{
    /**
     * Create a new class instance.
     */


    protected $config = [];
    public function __construct()
    {
        //
    }

    public function run()
    {
        $count = Category::count();
        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-categories',
            'title' => 'Category counter',
            'text' => "Count of categories: {$count}",
            'button' => [
                'text' => 'Перейти к списку',
                'link' => '',
                // 'link' => route('voyager.category.index'),
            ],
            'image' => 'category-png.png',
        ]));
    }

    public function shouldBeDisplayed()
    {
        return true;
    }
}
