<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index() 
    {
        return view ('student.all', [
            "title" => "Students",
            "students" => Student::all(),
        ]);
    }

    public function show($student)
    {
        return view ('student.detail', [
            "title" => "detail-student",
            "student" => Student::find($student),
        ]);
    }

    public function create() 
    {
        return view ('student.create', [
            "title" => "Students",
            "kelass" => Kelas::all()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nis'           => 'required|max:255',
            'nama'          => 'required|max:255',
            'tanggal_lahir' => 'required',
            'kelas_id'      => 'required',
            'alamat'        => 'required',
        ]);

        $result = Student::create($validateData);
        if ($result) {
            return redirect('/student/all')->with('success', 'Data berhasil ditambahkan !');
        }
    }

    public function destory(Student $student) 
    {
        $result = Student::destroy($student->id);
        if ($result) {
            return redirect('/student/all')->with('success', 'Data berhasil dihapus !');
        }
    }

    public function edit(Student $student)
    {
        return view ('student.edit', [
            "title" => "edit-data",
            "student" => $student,
            "kelass" => kelas::all()
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $validateData = $request->validate([
            'nis'           => 'required|max:255',
            'nama'          => 'required|max:255',
            'tanggal_lahir' => 'required',
            'kelas_id'      => 'required',
            'alamat'        => 'required',
        ]);

        $result = Student::where('id', $student->id)->update($validateData);
        if ($result) {
            return redirect('/student/all')->with('success', 'Data berhasil diubah !');
        }
    }
}
