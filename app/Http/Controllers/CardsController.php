<?php

namespace App\Http\Controllers;

use App\Card;
use App\Note;
use App\Categories;
use Illuminate\Http\Request;

use App\Http\Requests;

class CardsController extends Controller
{
    public function index()
    {
        $categories = Categories::category();
        $cards = Card::all();
        return view('cards.index', ['cards' => $cards, 'categories' => $categories]);
    }

    public function show(Card $card)
    {
        return view('cards.show', compact('card'));
    }

    public function addNote(Note $note)
    {
//        $card = new Card;//
//        $card->notes()->save($note);
    }
}
