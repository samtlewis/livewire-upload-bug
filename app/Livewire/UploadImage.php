<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadImage extends Component
{
    use WithFileUploads;

    public $uploadedImage;

    public function render()
    {
        return view('livewire.upload-image');
    }

    public function updatingUpload($value): void
    {
        Validator::make(
            ['upload' => $value],
            ['upload' => 'required|image|mimes:jpg,png,gif'],
        )->validate();
    }

}
