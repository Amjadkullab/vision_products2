<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\client;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class pagecontroller extends Controller
{

public function index(){
    $categories = category::select('id', 'name')->get();
    $clients = client::select('id','name')->get();
     $products= product::all();
    return view('front.index', compact('products'),compact('categories'),compact('clients'));
}

public function services(){
    return view('front.services');
}

public function portfolio(){
    $products= product::all();

    return view('front.portfolio',compact('products'));
}

public function about(){

    return view('front.about');
}

public function team(){

    return view('front.team');
}

public function contact(){

    return view('front.contact');
}

public function contactsubmit(Request $request){

    $request->validate([

        'name' => 'required',
        'email' => 'required |email',
        'number' => 'required',
        'message' => 'required',
    ]);


    Mail::to('admin@gmail.com')->Send(new TestMail($request->except('_token')));

    return redirect()->route('homepage');







}

















}
