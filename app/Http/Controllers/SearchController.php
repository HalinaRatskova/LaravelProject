<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search');
    }
 
    /**
     * search records in database and display  results
     * @param  Request $request [description]
     * @return view      [description]
     */
    public function search( Request $request)
    {
 
        $searchterm = $request->input('query');
 
        $searchResults = (new Search())
                    ->registerModel(\App\Product::class, 'name')
                    ->perform($searchterm);
 
        return view('search', compact('searchResults', 'searchterm'));
    }
}
