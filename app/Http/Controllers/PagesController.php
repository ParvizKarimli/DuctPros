<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $services = Service::paginate(10);
        return view('index', [
            'services' => $services
        ]);
    }
}
