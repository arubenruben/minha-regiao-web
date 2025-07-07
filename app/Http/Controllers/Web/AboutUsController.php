<?php

namespace App\Http\Controllers\Web;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index()
    {
        return Inertia::render("AboutUs");
    }
}
