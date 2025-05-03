<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;

class DogController extends Controller
{
    public function index(Request $request)
    {
        $query = Dog::where('status', 'available');

        if ($request->filled('breed')) {
            $breeds = (array) $request->breed;
            $query->whereIn('breed', $breeds);
        }
        if ($request->filled('size')) {
            $sizes = (array) $request->size;
            $query->whereIn('size', $sizes);
        }
        if ($request->filled('age')) {
            $ages = (array) $request->age;
            $query->where(function($q) use ($ages) {
                foreach ($ages as $age) {
                    switch ($age) {
                        case 'puppy':
                            $q->orWhere('age', '<', 1);
                            break;
                        case 'young':
                            $q->orWhereBetween('age', [1, 3]);
                            break;
                        case 'adult':
                            $q->orWhereBetween('age', [4, 8]);
                            break;
                        case 'senior':
                            $q->orWhere('age', '>', 8);
                            break;
                    }
                }
            });
        }
        if ($request->filled('sex')) {
            $sexes = (array) $request->sex;
            $query->whereIn('sex', $sexes);
        }

        $dogs = $query->orderBy('created_at', 'desc')->paginate(9)->withQueryString();
        $breeds = Dog::where('status', 'available')->select('breed')->distinct()->pluck('breed');

        return view('dogs.index', compact('dogs', 'breeds'));
    }

    public function show($id)
    {
        $dog = Dog::findOrFail($id);
        return view('dogs.show', compact('dog'));
    }
}