<?php

namespace App\Http\Controllers;

use App\Models\Capster;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CapsterController extends Controller
{
    public function index()
    {
        $capsters = Capster::paginate(1); // 10 data per halaman, bisa diubah
        // $capsters = Capster::query(); // atau Capster::select('*')

        // dd($capsters->toSql());
        return view('admin.capsters.index', compact('capsters'));
    }

    public function create()
    {
        return view('admin.capsters.create');
    }

    public function store(Request $request)
    {

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'tempat_tinggal' => 'required|string|max:255',
                'phone' => 'required|string|min:12|max:13',
                'email' => 'required|email|max:255',
                'experience' => 'nullable|string|max:1000',
                'specialization' => 'nullable|string|max:255',
                'available' => 'nullable|boolean',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // max 2MB
            ]);

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

    public function update(Request $request, Capster $capster)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'tempat_tinggal' => 'required|string|max:255',
                'phone' => 'nullable|string|min:12|max:13',
                'email' => 'required|email|max:255',
                'experience' => 'nullable|string|max:1000',
                'specialization' => 'nullable|string|max:255',
                'available' => 'nullable|boolean',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // max 2MB
            ]);

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
            $capster->delete();
            return redirect()->route('capsters.index')->with('Success', 'Capsters Berhasil di delete');
        } catch (ValidationException $e) {
            throw $e;
        }
    }
}
