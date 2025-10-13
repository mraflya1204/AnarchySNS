<?php

namespace App\Http\Controllers;

use \App\Models\SNS;
use \App\Models\Identifier;
use Illuminate\Http\Request;

class SNSController extends Controller
{
    public function home(){
        return view('sns.index');
    }

    public function about(){
        return view('about');
    }

    public function index(){
        $sns = SNS::with('identifier')->orderBy('created_at', 'desc')->paginate(10);
        return view('sns.index', ["sns" => $sns]);
    }
    
    public function show(SNS $sns){
        $sns->load('identifier');
        return view('sns.show', ['sns' => $sns]);
    }
    public function create(){
        $identifierList = Identifier::all();
        return view('sns.create', ['identifierList' => $identifierList]);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'post' => 'required',
            'username' => 'required|string|min:3|max:50',
        ]);

        // pick any random identifier (overlap allowed)
        $identifier = Identifier::inRandomOrder()->first();

        // if there are no identifiers yet, create one so identifier_id is never NULL
        if (! $identifier) {
            $identifier = new Identifier();
            $identifier->save();
        }

        $validated['identifier_id'] = $identifier->id;

        SNS::create($validated);

        return redirect()->route('sns.index')->with('success', 'Posted Successfully!');
    }

    public function destroy(SNS $sns){
        $sns->delete();
        return redirect()->route('sns.index')->with('success', 'Post deleted successfully!');
    }
}