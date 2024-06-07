<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');
        $results = Product::where('name', 'LIKE', "%{$query}%")->get(); // Adjust according to your needs

        return response()->json($results);
    }
}
