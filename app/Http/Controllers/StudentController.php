<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Mark;
use DB;

class StudentController extends Controller
{
    
    public function index()
    {
        return view('welcome');
    }

   
    public function create()
    {
      $student_bio=student::all();
    
      
      return view('index',compact('student_bio'));

    }

    
    public function store(Request $request)

    {
        $student_bio=student::all();
        
        $student = new Student;
        $student->name = $request->input('name');
        $student->mobile = $request->input('mobile');
        $student->email = $request->input('email');
        $student->gender = $request->input('gender');
        $student->dob = $request->input('dob');
        $student->address = $request->input('address');
        
        if ($student->save()) {
            $student_id = $student->id; // Get the ID of the inserted student
            $subjects = $request->input('marks')['subject'];
            $marks = $request->input('marks')['mark'];
            foreach ($subjects as $index => $subject) {
                if (isset($marks[$index])) {
                    $newMark = new Mark;
                    $newMark->student_id = $student_id;
                    $newMark->subject = $subject;
                    $newMark->mark = $marks[$index];
                    $newMark->save();

                }        
            
            }
          
            return view('index',compact('student_bio'));
        }else{
            return redirect()->back()->with('error', 'Failed to save registration details.');

        }

    }

public function getStudentMarks(Request $request)

    {
        $id= $request->student_id;
        
        $marksFromDatabase = Mark::where('student_id', $id)->select('subject', 'mark')->get();
        $marks = [];
        foreach ($marksFromDatabase as $mark) {
            $subject = $mark->subject;
            $markValue = $mark->mark;
            $marks[$subject] = $markValue;


        }

        
        
        return response()->json($marks);
        
    }


   
    public function delete($id)

    {
        $record = Student::find($id);

        if ($record) {
        
           $record->delete();

          
          return redirect()->route('create');
        } else {
        
            return redirect()->route('create')->with('error', 'Record not found');
        }
    }
    public function getchart($id)
    {
         $users = Mark::where('student_id', $id)->get();

        // $marksFromDatabase = Mark::where('student_id', $id)->select('subject', 'mark')->get();
        // return view('updatechart',compact('marksFromDatabase'));
         return view('updatechart',compact('users'));
    }

    
    public function update($id)
    {
        $record = Student::find($id);
        return view('edit',compact('record'));
    }
    public function update_sec(Request $request ,$id)

    {
        $item = student::find($id);
        
       $item->name = $request->input('name');
       $item->mobile = $request->input('mobile');
       $item->email = $request->input('email');
       $item->gender = $request->input('gender');
       $item->dob = $request->input('dob');
       $item->address = $request->input('address');

       $item->save();
       return redirect()->route('create');


        
        

    }
    

}
