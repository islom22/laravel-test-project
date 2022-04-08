<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Test::with('cat')->get();
        return view('index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Cat::all();
        return view('create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'sub_title' => 'required',
            'cats' => 'required',
            'keywords' => 'required',
            'image' => 'required'
        ]);

        $admin = new Test;
        $admin->title = $request->input('title');
        $admin->description = $request->input('description');
        $admin->date = $request->input('date');
        $admin->sub_title = $request->input('sub_title');
        $admin->cats = $request->input('cats');
        $admin->keywords = $request->input('keywords');
        if($request->hasfile('image'))
        {
        //    $file = $request->file('image');
        //    $extention = $file->getClientOriginalExtension();
        //    $filename = time().'.'.$extention;
        //    $file->move('uploads/admins/', $filename);
        //    $admin->image = $filename;
           $admin = $request->file('file');
           $filename = time(). '.' . $admin->extension();
           $admin->move(public_path('uploads/admins/'),$filename);
           return response()->json(['success'=>$filename]);
        }
        $admin->save();
        return  redirect()->back()->with('status','Image Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Test::find($id);
        $cats = Cat::all();
        return view('edit', compact('admin','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = Test::find($id);
        $admin->title = $request->input('title');
        $admin->description = $request->input('description');
        $admin->date = $request->input('date');
        $admin->sub_title = $request->input('sub_title');
        $admin->cats = $request->input('cats');
        $admin->keywords = $request->input('keywords');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/admins/', $filename);
            $admin->image = $filename;
        }
        $admin->update();
        return redirect()->back()->with('status','Image Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Test::find($id);
        $destination = 'uploads/admins/'.$admin->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $admin->delete();
        return back();
    }
}
