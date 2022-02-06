<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecipesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $ingredients = Ingredient::all();
        $recipes = Recipe::where('user_id', $user->id,)->with('ingredients')->orderBy('created_at', 'desc')->get();
        return view('/pages.recipes', compact('ingredients', 'recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = Ingredient::all();
        return view('/pages.createRecipes', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/images/recipes', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


        $recipes = new Recipe;
        $recipes->user_id = Auth()->user()->id;
        $recipes->name = $request->input('name');
        $recipes->note = $request->input('note');
        $recipes->image = $fileNameToStore;

        $recipes->save();
        $ingredients = collect($request->input('ingredients', []))->map(function ($ingredient) {

            return ['amount' => $ingredient];
        });

        // dd($ingredients);
        $recipes->ingredients()->sync($ingredients);

        return back();
    }

    // dd($recipes);
    // $recipes->ingredients()->attach($request->ingredient_id);

    // private function mapIngredients($ingredients)
    // {
    //     return collect($ingredients)->map(function ($i) {
    //         return ['amount' => $i];
    //     });
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredients = Ingredient::all();
        $recipe = Recipe::find($id);
        return view('/pages.showRecipe', compact('ingredients', 'recipe'));

        // return Recipe::findOrFail($id);
        // return Ingredient::findOrFail($id);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
}
