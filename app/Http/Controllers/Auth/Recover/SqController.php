<?php

namespace App\Http\Controllers\Auth\Recover;

use App\Http\Requests\Recover\sq;
use App\Http\Controllers\Controller;
use App\Model\Recover\Question_secrete;
use Illuminate\Support\Facades\Auth;

class SqController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('recover.sq');
    }
    public function show()
    {
        $questions = Question_secrete::all();
        $response = Auth::user()->recover->response;
        return view('recover.sq',compact('questions','response'));
    }

    public function store(sq $request)
    {
        $question = Question_secrete::find($request->question);
        if($question){
            Auth::user()->recover()->update(['response'=>$request->response,'question_secrete_id'=>$request->question]);
            Session()->flash('success','Votre validation est terminer');
            return redirect()->route('home');
        }
        return back()->withErrors(['question'=>'veuillez choisir une question'])->withInput();

    }
}
