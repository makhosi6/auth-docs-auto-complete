<?php

namespace App\Http\Controllers;

use App\Models\Tokens;
use Illuminate\Http\Request;

class TokensController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return Tokens::all();
    }
}
