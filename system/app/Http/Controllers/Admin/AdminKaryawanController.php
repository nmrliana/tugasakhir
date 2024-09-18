<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;

class AdminKaryawanController extends Controller
{
    function index()
    {
        $data['list_karyawan'] = Karyawan::where('flag_erase', 1)
            ->where('karyawan_posisi', '!=', 0)
            ->get();
        return view('admin.master-data.data-karyawan.index', $data);
    }

    function create()
    {
        return view('admin.master-data.data-karyawan.create');
    }

    function store()
    {
        $karyawan = new Karyawan;
        $karyawan->karyawan_nama = request('karyawan_nama');
        $karyawan->karyawan_jobdesk = request('karyawan_jobdesk');
        $karyawan->karyawan_posisi = request('karyawan_posisi');
        $karyawan->karyawan_alamat = request('karyawan_alamat');
        $karyawan->karyawan_sift = request('karyawan_sift');
        $karyawan->email = request('email');
        $karyawan->karyawan_notlp = request('karyawan_notlp');
        $karyawan->karyawan_tgl_masuk = request('karyawan_tgl_masuk');
        $karyawan->password = bcrypt(123);
        $karyawan->save();
        return redirect('admin/master-data/data-karyawan')->with('success', 'Data karyawan berhasil dibuat');
    }

    function show(Karyawan $karyawan)
    {
        $data['detail'] = $karyawan;
        return view('admin.master-data.data-karyawan.show', $data);
    }

    function edit(Karyawan $karyawan)
    {
        $data['detail'] = $karyawan;
        return view('admin.master-data.data-karyawan.edit', $data);
    }

    function update(Karyawan $karyawan)
    {
        $karyawan->karyawan_nama = request('karyawan_nama');
        $karyawan->karyawan_jobdesk = request('karyawan_jobdesk');
        $karyawan->karyawan_posisi = request('karyawan_posisi');
        $karyawan->karyawan_alamat = request('karyawan_alamat');
        $karyawan->email = request('email');
        $karyawan->karyawan_notlp = request('karyawan_notlp');
        $karyawan->karyawan_tgl_masuk = request('karyawan_tgl_masuk');
        $karyawan->save();

        return redirect('admin/master-data/data-karyawan')->with('success', 'Data karyawan berhasil diubah');
    }

    function destroy(Karyawan $karyawan)
    {
        Karyawan::where('karyawan_id', $karyawan->karyawan_id)->update([

            'flag_erase' => 0,

        ]);

        return back()->with('warning', 'Data berhasil dihapus');
    }
}
