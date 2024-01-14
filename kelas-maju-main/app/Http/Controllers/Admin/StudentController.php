<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::query()->latest()->paginate(5);

        $title = "Hapus Siswa!";
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view("admin.student.index", [
            "students" => $students,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input terlebih dahulu
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "name" => "required|max:50",
            "nis" => "required|max:50",
            "jurusan" => "required|max:80",
            "status" => "required",
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with("errorCreateStudent", "Gagal Menambahkan Siswa Baru: " . implode(', ', $messages));
        }

        // menerima input yang sudah tervalidasi
        $validated = $validator->validated();

        // menambahkan key baru buat kolom user_id dengan value user saat ini
        $validated['user_id'] = Auth::user()->id;

        Student::query()->create($validated);

        return redirect()->route("student.index")->with("successCreateStudent", "Berhasil Menambahkan Siswa Baru");
    }

    public function update(Request $request)
    {
        try {
            $student = Student::query()->findOrFail($request->student_id);

            $student->name = $request->name;
            $student->nis = $request->nis;
            $student->jurusan = $request->jurusan;
            $student->status = $request->status;

            // untuk mengetahui yang update data itu siapa
            $student->user_id = Auth::user()->id;
            $student->save();

            return redirect()->route("student.index")->with("successUpdateStudent", "Data Siswa Berhasil Di Update.");
        } catch (QueryException $e) {
            return back()->with("errorUpdateStudent", "Gagal memperbarui data siswa:" . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $student = Student::query()->findOrFail($id);

            $student->delete();

            return redirect()->route("student.index")->with("successDeleteStudent", "Data Siswa Berhasil Di Delete.");
        } catch (QueryException $e) {
            return back()->with("errorDeleteStudent", "Gagal menghapus data siswa: " . $e->getMessage());
        }
    }
}
