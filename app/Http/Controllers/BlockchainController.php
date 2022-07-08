<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockchainController extends Controller
{
    public function index(){
        $page = isset($_GET["page"])?$_GET["page"]:1;
        return view("blockchain.index",["page"=>$page]);
    }
    public function details(){
        return view("blockchain.details");
    }
}
