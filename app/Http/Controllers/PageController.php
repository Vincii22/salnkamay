<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Number;
use App\Models\Letter;
use App\Models\Phrase;
use App\Models\TimeExpression;
use App\Models\Animal;
use App\Models\Weather;
use App\Models\Month;
use App\Models\Transportations;
use App\Models\FamilySigns;
use App\Models\MoneyMatters;
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
                    $animals = Animal::whereRaw('LOWER(animal) = ?', [$word])->get();
                    $weathers = Weather::whereRaw('LOWER(weather) = ?', [$word])->get();
                    $months = Month::whereRaw('LOWER(month) = ?', [$word])->get();
                    $transportations = Transportations::whereRaw('LOWER(transportation) = ?', [$word])->get();
                    $moneyMatters = MoneyMatters::whereRaw('LOWER(money_matter) = ?', [$word])->get();
                    $familySigns = FamilySigns::whereRaw('LOWER(family_sign) = ?', [$word])->get();
                    $timeExpressions = TimeExpression::whereRaw('LOWER(time_expression) = ?', [$word])->get();

                    $signs = $signs->merge($letters)
                                   ->merge($numbers)
                                   ->merge($phrases)
                                   ->merge($foods)
                                   ->merge($animals)
                                   ->merge($timeExpressions)
                                   ->merge($weathers)
                                   ->merge($months)
                                   ->merge($transportations)
                                   ->merge($moneyMatters)
                                   ->merge($familySigns);
                }
            } else {
                $signs = $phrases;
            }
        }

        return view('pages.translate', compact('inputText', 'signs'));
    }

}
