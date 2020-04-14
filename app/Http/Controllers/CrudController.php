<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index(){
        return view('index');
    }
    public function show( $id = 0 ){
        return view('detail');
    }
    
    public function create(){
        return view('create');
    }
    public function new(){
        // return redirect('');
    }

    public function edit( $id = 0 ){
        return view('edit');
    }
    public function update(){
        // return redirect('');
    }

    public function delete( $id = 0 ){
        // return redirect('');
    }
}
