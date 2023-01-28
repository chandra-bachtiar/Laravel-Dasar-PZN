<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request): string
    {
        $name = $this->input('name');
        return "Name $name";
    }

    public function helloFirst(Request $request): string
    {
        $first = $this->input('first.name');
        return "First $first";
    }

    public function helloInput(Request $request)
    {
        $input = $this->input();
        return json_encode($input);
    }

    public function helloProduct(Request $request)
    {
        $product = $this->input('product.*.name');
        return json_encode($product);
    }
}
