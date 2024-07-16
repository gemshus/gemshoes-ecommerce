<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SliderModel;

class HomeController extends Controller
{
    public function home()
    {

        $data['getSlider'] = 

        $data['meta_title'] = 'Gem-Shoes';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';


        return view('home', $data);
    }
}
