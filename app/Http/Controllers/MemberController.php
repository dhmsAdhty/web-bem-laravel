<?php
namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        // 1. Ambil semua data anggota (Sudah Benar)
        $members = Member::orderBy('name')->get();

        // 2. Ambil daftar unik departemen dari anggota yang ada (Baris Baru)
        // 'pluck' mengambil semua nilai dari kolom 'departemen',
        // 'unique' menghapus duplikat,
        // 'sort' mengurutkannya berdasarkan abjad.
        $departments = $members->pluck('departemen')->unique()->sort();

        // 3. Kirim kedua variabel ('members' dan 'departments') ke view (Diperbarui)
        return view('profile.index', compact('members', 'departments'));
    }
}