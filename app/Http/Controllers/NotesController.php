<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Card;
use App\Note;

//use App\Http\Requests;
//use App\Http\Controllers\Controller;

class NotesController extends Controller
{
    public function store(Request $request, Card $card)
    {
//        return \Request::all();
//        return request()->all();

//        $note = new Note();
//        $note->body = $request->body;
//        $card->notes()->save($note);
//        return back();

//        $card->notes()->save(
//            Note(['body' => $request->body])
//        );

//        $card->notes()->create([
//            'body' => $request->body
//        ]);

//        $card->notes()->create($request->all());

        $card->addNote(
            new Note($request->all())
        );
        return redirect('/shop/public/cards/{{ $card->id }}');


    }
}
