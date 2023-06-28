<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ItemController extends Controller
{
    public function index()
    {
        $response = Http::get('127.0.0.1:8000/api/exercises/');
        $items = $response->json();

        return view('index', compact('items'));
    }
}
