<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function showAllCategory()
    {
        return response()->json(Categories::all());
    }

}