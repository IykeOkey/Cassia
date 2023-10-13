<?php

namespace App\Http\Controllers;

use App\DataTables\AcademicDataTable;
use App\Models\Academic;
use Illuminate\Http\Request;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AcademicDataTable $dataTable)
    {
        return $dataTable->render('academic');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    /*    $image = null;
        if ($request->hasFile('image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $image = $request->image->store('images', $filename);
        }
        $image = Input::file('img');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('images/' . $filename);
        Image::make($image->getRealPath())->resize(200, 200)->save($path);
        $user->image = $filename;
        $user->save(); */
        //
   /*     $image = null;
        $path = $request->input('staff_id');
        if ($request->hasFile('image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $path . '.' . $extension;
            $image = $request->image->store('admin/img', $fileName);
        }
        Category::create([
            'name' => $request->name,
            'latin' => $request->latin,
            'parent_id' => $request->parent_id,
            'image' => $image,
        ]); */

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = $request->input('staff_id').'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        $user = new Academic;
        $user->staff_id = $request->input('staff_id');
        $user->image_id = $imageName;
        $user->edu_code = $request->input('edu_code');
        $user->edu_name = $request->input('edu_name');
        $user->edu_grade = $request->input('edu_grade');
        $user->edu_date = $request->input('edu_date');
        $user->save();

    /*    return redirect()->back()->with([
            'message' => 'Academic added successfully!', 
            'status' => 'success'
        ]); */

        return redirect()->route('academics.academic')->with([
            'message' => 'Academic added successfully!', 
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Academic $academic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Academic $academic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Academic $academic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Academic $academic)
    {
        //
    }
}
