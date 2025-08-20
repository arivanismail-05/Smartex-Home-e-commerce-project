<?php

namespace App\Livewire;

use App\Models\Category as ModelCategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Category extends Component
{
    use \Livewire\WithFileUploads;

    #[Rule('required|string|max:255')]
    public $name;

    #[Rule('required|string|max:255')]
    public $slug;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image;


    public $search;


    public $editingId;
    public $editingName;
    public $editingSlug;
    public $editingImage;
    public $oldImage;

    public function create()
    {
        $validated = $this->validate();

        if ($this->image) {
        $imagePath = $this->image->store('categories', 'public');
        $validated['image'] = $imagePath;
        }   

        ModelCategory::create($validated);

        $this->reset('name', 'slug', 'image');
        flash()->success('Category saved successfully!');
    }

    public function delete($id)
    {
        $category = ModelCategory::find($id);
        if ($category) {

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
    }
    }

    public function toggleStatus($id)
    {
        $category = ModelCategory::find($id);
        if ($category) {
            $category->status = !$category->status;
            $category->save();
        }
        flash()->success('Status updated successfully!');

    }

    public function edit($id)
    {
        $this->resetErrorBag();
        $this->reset('name', 'slug', 'image');
        $category = ModelCategory::find($id);
        if ($category) {
            $this->editingId = $category->id;
            $this->editingName = $category->name;
            $this->editingSlug = $category->slug;
            $this->oldImage = $category->image; 
            $this->editingImage = null; 
        }

    }

    public function update()
    {
        $this->validate([
            'editingName' => 'required|string|max:255',
            'editingSlug' => 'required|string|max:255',
            'editingImage' => 'nullable|sometimes|image|max:1024',
        ]);

        $category = ModelCategory::find($this->editingId);
        if (!$category) {
            return; 
        }

        $imagePath = $category->image; 

        
        if ($this->editingImage) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $imagePath = $this->editingImage->store('categories', 'public');
        }

        $category->update([
            'name' => $this->editingName,
            'slug' => $this->editingSlug,
            'image' => $imagePath, 
        ]);

        $this->cancel(); 
        flash()->success('Category updated successfully!');
    }

    public function cancel()
    {
        $this->reset('editingId', 'editingName', 'editingSlug', 'editingImage');
        $this->resetErrorBag();
    }

    public function render()
    {
        $categories = ModelCategory::latest()
        ->where('name', 'like', '%'.$this->search.'%')
        ->orWhere('slug', 'like', '%'.$this->search.'%')
        ->get();
        return view('livewire.category', compact('categories'));
    }
}
