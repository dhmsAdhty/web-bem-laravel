<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    /**
     * Tampilkan daftar anggota + data statistik departemen.
     */
    public function index()
    {
        $members = Member::all();

        // Data untuk Pie Chart: jumlah anggota per departemen
        $departemenData = Member::select('departemen')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('departemen')
            ->pluck('total', 'departemen');

        return view('dashboard.anggota.index', compact('members', 'departemenData'));
    }

    /**
     * Tampilkan form tambah anggota.
     */
    public function create()
    {
        return view('dashboard.anggota.create');
    }

    /**
     * Simpan anggota baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'nim'        => 'required|string|max:20|unique:members,nim',
            'prodi'      => 'required|string',
            'jabatan'    => 'required|string',
            'departemen' => 'required|string',
            'foto'       => 'nullable|image|max:5048',
        ]);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto_anggota', 'public');
        }

        Member::create($validated);

        return redirect()
            ->route('dashboard.anggota.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit anggota.
     */
    public function edit($id)
    {
        $anggota = Member::findOrFail($id);
        return view('dashboard.anggota.edit', compact('anggota'));
    }

    /**
     * Perbarui data anggota.
     */
    public function update(Request $request, $id)
    {
        $anggota = Member::findOrFail($id);

        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'nim'        => 'required|string|max:20|unique:members,nim,' . $anggota->id,
            'prodi'      => 'required|string',
            'jabatan'    => 'required|string',
            'departemen' => 'required|string',
            'foto'       => 'nullable|image|max:5048',
        ]);

        // Jika ada foto baru, hapus foto lama lalu simpan baru
        if ($request->hasFile('foto')) {
            if ($anggota->foto && Storage::disk('public')->exists($anggota->foto)) {
                Storage::disk('public')->delete($anggota->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto_anggota', 'public');
        } else {
            // Jika tidak ada foto baru, gunakan foto lama
            $validated['foto'] = $anggota->foto;
        }

        $anggota->update($validated);

        return redirect()
            ->route('dashboard.anggota.index')
            ->with('success', 'Anggota berhasil diperbarui.');
    }

    /**
     * Hapus anggota.
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);

        if ($member->foto && Storage::disk('public')->exists($member->foto)) {
            Storage::disk('public')->delete($member->foto);
        }

        $member->delete();

        return redirect()
            ->route('dashboard.anggota.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }
}
