<?php

namespace App\Livewire;

use App\Models\Employee as ModelsEmployee;
use Livewire\Component;

class Employee extends Component
{

    public $nama;
    public $email;
    public $alamat;

    public function render()
    {
        return view('livewire.employee');
    }

    public function store()
    {
        $aturan = [
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
        ];

        $pesan = [
            'nama.required' => "Nama wajib diisi",
            'email.required' => "Email wajib diisi",
            'email.email' => "Format email tidak sesuai",
            'alamat.required' => "Alamat wajib diisi",
        ];

        $validasi = $this->validate($aturan, $pesan);
        ModelsEmployee::create($validasi);
        session()->flash('message', 'Data berhasil disimpan');
    }
}