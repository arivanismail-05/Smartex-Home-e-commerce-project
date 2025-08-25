<?php

namespace App\Livewire;

use App\Models\Banner as ModelsBanner;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Banner extends Component
{

    use WithFileUploads;

    #[Rule('required|max:1024')]
    public $imagePaths = [];


    public $editingBannerId;
    public $editingImagePath;


    public function create()
    {
        $this->validate();


        foreach($this->imagePaths as $imagePath){
            $path = $imagePath->store('banners', 'public');
            ModelsBanner::create([
                'image_path' => $path,

            ]);
        }

        $this->reset('imagePaths');
        $this->resetErrorBag();
        $this->dispatch('close-modal');

        flash()->success('Banners created successfully.');
    }


    public function delete_image($image_id)
    {
        $banner = ModelsBanner::find($image_id);
        if ($banner) {

        if ($banner->image_path) {
            Storage::disk('public')->delete($banner->image_path);
        }
        $banner->delete();
    }
    }

    public function edit_image($image_id)
    {
        $banner = ModelsBanner::find($image_id);
        if ($banner) {
            $this->editingBannerId = $banner->id;
            $this->editingImagePath = $banner->image_path;
        }
    }

    public function cancel_edit()
    {
        $this->reset(['editingBannerId', 'editingImagePath']);
    }


    public function toggleImageStatus($image_id)
    {
        $banner = ModelsBanner::find($image_id);
        if ($banner) {
            $banner->status = !$banner->status;
            $banner->save();
        }
        flash()->success('Banner status updated successfully!');
    }


    public function update_image()
    {
        $this->validate([
            'editingImagePath' => 'nullable|sometimes|image|max:1024',
        ]);

        $banner = ModelsBanner::find($this->editingBannerId);
        if (!$banner) {
            return;
        }

        $imagePath = $banner->image_path;


        if ($this->editingImagePath) {
            if ($banner->image_path) {
                Storage::disk('public')->delete($banner->image_path);
            }
            $imagePath = $this->editingImagePath->store('banners', 'public');
        }

        $banner->update([
            'image_path' => $imagePath,
        ]);

        $this->cancel_edit();
        flash()->success('Banner updated successfully!');
    }


    public function render()
    {
        $banners = ModelsBanner::all();
        return view('livewire.banner', compact('banners'));
    }
}
