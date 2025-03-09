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
            // Check for a complete multi-word phrase
            $phrases = Phrase::whereRaw('LOWER(phrase) = ?', [strtolower($inputText)])->get();

            if ($phrases->isEmpty()) {
                // Split input into individual words and search for each
                $words = explode(' ', $inputText);

                foreach ($words as $word) {
                    $word = trim(strtolower($word));

                    $letters = strlen($word) === 1 && ctype_alpha($word)
                        ? Letter::where('letter', $word)->get()
                        : collect();

                    $numbers = Number::whereRaw('LOWER(number) = ?', [$word])->get();
                    $phrases = Phrase::whereRaw('LOWER(phrase) = ?', [$word])->get();
                    $foods = Food::whereRaw('LOWER(food) = ?', [$word])->get();
                    $timeExpressions = TimeExpression::whereRaw('LOWER(time_expression) = ?', [$word])->get();

                    $signs = $signs->merge($letters)
                                   ->merge($numbers)
                                   ->merge($phrases)
                                   ->merge($foods)
                                   ->merge($timeExpressions);
                }
            } else {
                $signs = $phrases;
            }
        }

        return view('pages.translate', compact('inputText', 'signs'));
    }

}
