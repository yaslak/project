<?php

namespace App\Http\Controllers\Auth\Recover;

use App\Http\Controllers\Controller;
use App\Model\Recover\Question_secrete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SqController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('recover.sq');
    }
    public function show()
    {
        $user = Auth::user();
        $questions = Question_secrete::all();
        $response = $user->recover->response;
        return view('recover.sq')->with(['questions'=>$questions,'response'=>$response,'user'=>$user]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|int',
            'response' => 'required|min:4',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $question = Question_secrete::find($request->question);
        if($question){
            Auth::user()->recover()->update(['response'=>$request->response,'question_secrete_id'=>$request->question]);
            Session()->flash('success','Votre validation est terminer');
            return redirect()->route('home');
        }
        return back()->withErrors(['question'=> 'veuillez choisir une question'])->withInput();

    }
}
