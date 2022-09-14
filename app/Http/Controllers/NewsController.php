<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function test()
    {
        foreach (News::all() as $item) {
            echo '<pre>';
            print_r($item->getAttributes());
            echo '</pre>';
        }
    }

   public function parseNews() {
        
   }
}
