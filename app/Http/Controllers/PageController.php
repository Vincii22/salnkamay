<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Number;
use App\Models\Letter;
use App\Models\Phrase;
use App\Models\TimeExpression;
class PageController extends Controller
{
    public function index()
    {
        return view('pages.index'); // Return the view for the index page
    }
    public function about()
    {
        return view('pages.about'); // Return the view for the index page
    }
    public function translate(Request $request)
    {
        $inputText = $request->input('inputText');
        $signs = collect(); // Initialize an empty collection

        if ($inputText) {
            // Check for a single letter
            $letters = strlen($inputText) === 1 && ctype_alpha($inputText)
                ? Letter::where('letter', $inputText)->get()
                : collect();

            // Check if input is numeric and treat it as a word/phrase for numbers
            $numbers = Number::whereRaw('LOWER(number) = ?', [strtolower($inputText)])->get();

            // Check if input matches a phrase (words or multi-word phrase)
            $phrases = Phrase::whereRaw('LOWER(phrase) = ?', [strtolower($inputText)])->get();

            // Check if input matches a food (single or multi-word food)
            $foods = Food::whereRaw('LOWER(food) = ?', [strtolower($inputText)])->get();

            // Check if input matches a time expression (single or multi-word time expression)
            $timeExpressions = TimeExpression::whereRaw('LOWER(time_expression) = ?', [strtolower($inputText)])->get();

            // Merge all results into a single collection
            $signs = $signs->merge($letters)
                           ->merge($numbers)
                           ->merge($phrases)
                           ->merge($foods)
                           ->merge($timeExpressions);
        }

        return view('pages.translate', compact('inputText', 'signs'));
    }
}
