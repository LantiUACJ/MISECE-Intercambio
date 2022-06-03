<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockchainController extends Controller
{
    public function index(){
        return view("blockchain.index");
    }
    public function details(){
        return view("blockchain.details");
    }
}
