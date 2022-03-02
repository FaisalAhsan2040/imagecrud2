<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function Create()
    {
        return view('product.create');
    }

    public function Store(Request $request)
    {
        $input = $request->all();
  
        if ($request->file('image')) {
            $image = $request->file('image');
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
          Student::create($input);
          return redirect()->route('_create')
          ->with('success','student created successfully.');
    }
    public function Index()
    {
        $students = Student::get();
        return view('product.index',compact('students'));
    }
    public function Edit($id)
    {

        $student = Student::where('id',$id)->first();

        return view('product.edit',compact('student','id'));
    }

    public function Update(Request $request)
    {
        $name =  $request->name;
        $roll_no =  $request->roll_no;
        $image = $request->file('image');
        $phone =  $request->phone;
        $imagename = time().'.'.$image->extension();
        $image->move(public_path('imges'),$imagename);
        
        $student = Student::find($request->id);
        $student->name = $name;
        $student->roll_no = $roll_no;
        $student->phone = $phone;
        $student->image = $imagename;
        $student->save();
        return back()->with('student_updated','student updATED SUCCESS FULLLY');
    }
}
