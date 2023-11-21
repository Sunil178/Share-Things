<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ThingController extends Controller
{
    public function index()
    {
        $things = Auth::user()->things()->get();
        return view('things.index', [ 'things' => $things ]);
    }

    public function create()
    {
        $thing = new Thing();
        return view('things.create', [ 'thing' => $thing ]);
    }

    public function store(Request $request)
    {
        if ($errors = $this->inputValidate($request)) return $errors;

        $thing = new Thing();
        $thing = $this->upsert($request, $thing);

        if ($thing->is_saved)
            return redirect()->route('thing.index')->withSuccessMessage('Thing stuff created sucessfully');

        return back()->withInput()->withErrorMessage('Something went wrong');
    }

    public function show($id)
    {
        $thing = Thing::find($id);
        if ($thing) {
            return view('things.view', [ 'thing' => $thing ]);
        }
        return response(status: 404);
    }

    public function edit($id)
    {
        $thing = Thing::find($id);
        if ($thing) {
            return view('things.edit', [ 'thing' => $thing ]);
        }
        return response(status: 404);
    }

    public function update(Request $request, $id)
    {
        $thing = Thing::find($id);
        if ($thing) {
            if ($errors = $this->inputValidate($request)) return $errors;

            $thing = $this->upsert($request, $thing);

            if ($thing->is_saved) {
                return redirect()->route('thing.index')->withSuccessMessage('Thing stuff updated sucessfully');
            }

            return back()->withInput()->withErrorMessage('Something went wrong');
        }
        return response(status: 404);
    }

    public function destroy($id)
    {
        $thing = Thing::find($id);
        if ($thing) {
            if ($thing->delete()) {
                return back()->withSuccessMessage('Thing deleted successfully');
            }

            return back()->withErrorMessage('Something went wrong');
        }
        return response(status: 404);
    }

    public function inputValidate(Request $request)
    {
        $validator = Validator::make($request->all(), [ 'name' => 'required' ], [ 'name.required' => 'Any name or purpose is required' ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->withErrorMessage($errors);
        }
        return false;
    }

    public function upsert(Request $request, $thing)
    {
        $thing->user_id = $request->user()->id;
        $thing->name = $request->name;
        $thing->short = $request->short;
        $thing->long = $request->long;

        if ($request->hasFile('file')) {
            deleteDocument($thing->file);
            $thing->file = storeDocument($request->file('file'));
        }
        $thing->is_saved = $thing->save();

        return $thing;
    }
}
