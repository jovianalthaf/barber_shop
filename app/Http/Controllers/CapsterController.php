<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCapsterRequest;
use App\Models\Capster;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class CapsterController extends Controller
{
    public function index()
    {
        $capsters = Capster::paginate(10); // 10 data per halaman, bisa diubah
        // $capsters = Capster::query(); // atau Capster::select('*')

        // dd($capsters->toSql());
        return view('admin.capsters.index', compact('capsters'));
    }

    public function create()
    {
        return view('admin.capsters.create');
    }

    public function store(StoreCapsterRequest $request)
    {
        try {

            $insertData = [
                'name' => $request->input('name'),
                'tempat_tinggal' => $request->input('tempat_tinggal'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'experience' => $request->input('experience'),
                'specialization' => $request->input('specialization'),
                'available' => $request->input('available'),
                'foto' => $request->file('foto'),
            ];

            if ($request->hasFile('foto')) {
                $photoPath = $request->file('foto')->store('capsters', 'public');
                $insertData['foto'] = $photoPath;
            }

            Capster::create($insertData);
            return redirect()->route('capsters.index')->with('Success', 'Capsters Berhasil Dibuat');
        } catch (ValidationException $e) {
            throw $e;
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function edit(Capster $capster)
    {
        return view('admin.capsters.edit', compact('capster'));
    }

    public function update(StoreCapsterRequest $request, Capster $capster)
    {
        try {
            $insertData = [
                'name' => $request->input('name'),
                'tempat_tinggal' => $request->input('tempat_tinggal'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'experience' => $request->input('experience'),
                'specialization' => $request->input('specialization'),
                'available' => $request->input('available'),
                'foto' => $request->file('foto'),
            ];

            if ($request->hasFile('foto')) {
                $photoPath = $request->file('foto')->store('capsters', 'public');
                $insertData['foto'] = $photoPath;
            }

            $capster->update($insertData);
            return redirect()->route('capsters.index')->with('Success', 'Capsters Berhasil di update');
        } catch (ValidationException $e) {
            throw $e;
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal update data: ' . $e->getMessage());
        }
    }

    public function destroy(Capster $capster)
    {
        try {

            if (!empty($capster->foto)) {
                // Pastikan ini sesuai dengan path yang tersimpan
                $filePath = $capster->foto; // karena kamu sudah pakai 'public' disk, cukup path relatif
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }

            $capster->delete();
            return redirect()->route('capsters.index')->with('Success', 'Capsters Berhasil di delete');
        } catch (ValidationException $e) {
            throw $e;
        }
    }
}
