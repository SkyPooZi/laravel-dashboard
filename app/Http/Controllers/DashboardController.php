<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelas;
use App\Models\Student;

class DashboardController extends Controller
{
    public function all() 
    {
        return view ('dashboard.all.all', [
            "title" => "Dashboard",
        ]);
    }

    public function student() 
    {
        return view ('dashboard.student.all', [
            "title" => "Dashboard",
            "students" => Student::all(),
        ]);
    }

    public function studentShow($student)
    {
        return view ('.dashboard.student.detail', [
            "title" => "detail-student",
            "student" => Student::find($student),
        ]);
    }

    public function studentCreate() 
    {
        return view ('dashboard.student.create', [
            "title" => "Students",
            "kelass" => Kelas::all()
        ]);
    }

    public function studentStore(Request $request)
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
            return redirect('/dashboard/student/all')->with('success', 'Data berhasil ditambahkan !');
        }
    }

    public function studentDestory(Student $student) 
    {
        $result = Student::destroy($student->id);
        if ($result) {
            return redirect('/dashboard/student/all')->with('success', 'Data berhasil dihapus !');
        }
    }

    public function studentEdit(Student $student)
    {
        return view ('dashboard.student.edit', [
            "title" => "edit-data",
            "student" => $student,
            "kelass" => kelas::all()
        ]);
    }

    public function studentUpdate(Request $request, Student $student)
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
            return redirect('/dashboard/student/all')->with('success', 'Data berhasil diubah !');
        }
    }

    public function kelas() 
    {
        return view ('dashboard.kelas.all', [
            "title" => "Dashboard",
            "kelass" => kelas::all(),
        ]);
    }

    public function kelasShow($kelas)
    {
        return view ('dashboard.kelas.detail', [
            "title" => "detail-kelas",
            "kelas" => kelas::find($kelas),
        ]);
    }

    public function kelasCreate() 
    {
        return view ('dashboard.kelas.create', [
            "title" => "Kelas",
            "kelass" => kelas::all()
        ]);
    }

    public function kelasStore(Request $request)
    {
        $validateData = $request->validate([
            'kelas' => 'required|max:255',
        ]);

        $result = kelas::create($validateData);
        if ($result) {
            return redirect('/dashboard/kelas/all')->with('success', 'Data berhasil ditambahkan !');
        }
    }

    public function kelasDestory(kelas $kelas) 
    {
        $result = kelas::destroy($kelas->id);
        if ($result) {
            return redirect('/dashboard/kelas/all')->with('success', 'Data berhasil dihapus !');
        }
    }

    public function kelasEdit(kelas $kelas)
    {
        return view ('dashboard.kelas.edit', [
            "title" => "edit-data",
            "kelas" => $kelas,
        ]);
    }

    public function kelasUpdate(Request $request, kelas $kelas)
    {
        $validateData = $request->validate([
            'kelas' => 'required|max:255',
        ]);

        $result = kelas::where('id', $kelas->id)->update($validateData);
        if ($result) {
            return redirect('/dashboard/kelas/all')->with('success', 'Data berhasil diubah !');
        }
    }
}
