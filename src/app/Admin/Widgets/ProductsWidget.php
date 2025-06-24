<?php

namespace Src\App\Admin\Widgets;

use App\Models\Product;
use Arrilot\Widgets\AbstractWidget;

class ProductsWidget extends AbstractWidget
{

    protected $config = [];

    public function run()
    {
        $count = Product::count();
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'=>'voyager-bread',
            'title'=>'Product counter',
            'text' => "Count of products: {$count}",
            'button' => [
                'text' => 'Перейти к списку',
                'link' => '',
                // 'link' => route('voyager.product.index'),
            ],
            'image' => 'news-bg.png',
        ]));
    }

    public function shouldBeDisplayed()
    {
        return true;
    }

}
