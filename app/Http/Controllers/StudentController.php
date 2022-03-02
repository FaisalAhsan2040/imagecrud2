<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Redirect;

class StudentController extends Controller
{
    public function Create()
    {
        return view('product.create');
    }

    public  function Store(Request $request)
    {

        $input = $request->all();
       
        if ($request->file('image')) {
            $image = $request->file('image');
            $destinationPath = public_path('images/');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }

        $student =  Student::create($input);
       
       return to_route('index')->with(['success' => 'Student register successfully']);

    }
    public function index()
    {
        $students =  Student::get();
        return view("product.index" , compact('students'));
    }
    public function edit($id)
    {
        $student = Student::whereId($id)->first();
        return view('product.edit',compact('student','id'));
    }
    public function update(Request $request)
    {
                           
        $student = Student::find($request->id);
        $studentImage = '';
        if($request->file('image'))
            $image = $request->file('image');
            $imagename = time().'.'.$image->extension();              
            $image->move(public_path('images/'),$imagename);
            $studentImage =$imagename;
        }
        else 
        {
            $studentImage = $student->image;
        }

        $student->name = $request->name;
        $student->roll_no = $request->roll_no;
        $student->phone = $request->phone;
        $student->image = $studentImage;
        $student->save();
        return to_route('index')->with(['success' => 'Student updated successfully']);
         
    }

    public function delete(Request $request)
    {
        $student = Student::whereid($request->id)->first();
        unlink(public_path('images/'.$student->image));
        $student->delete();
        return back()->with('success','Student records deleted Successfully');
    }
}

