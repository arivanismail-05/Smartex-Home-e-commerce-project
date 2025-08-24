<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\SubCategory as ModelSubCategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SubCategory extends Component
{
    use \Livewire\WithFileUploads;

    #[Rule('required|string|max:255')]
    public $name;

    #[Rule('required|string|max:255')]
    public $slug;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image;

    #[Rule('required|exists:categories,id')]
    public $category_id;

    public $search;


    public $editingId;
    public $editingName;
    public $editingSlug;
    public $editingCategoryId;
    public $editingImage;
    public $oldImage;

    public function create()
    {
        $validated = $this->validate();

        if ($this->image) {
        $imagePath = $this->image->store('sub-categories', 'public');
        $validated['image'] = $imagePath;
        }   

        ModelSubCategory::create($validated);

        $this->reset('name', 'slug', 'image','category_id');
        flash()->success('Sub Category saved successfully!');
    }

    public function delete($id)
    {
        $sub_category = ModelSubCategory::find($id);
        if ($sub_category) {

        if ($sub_category->image) {
            Storage::disk('public')->delete($sub_category->image);
        }
        $sub_category->delete();
    }
    }

    public function toggleStatus($id)
    {
        $sub_category = ModelSubCategory::find($id);
        if ($sub_category) {
            $sub_category->status = !$sub_category->status;
            $sub_category->save();
        }
        flash()->success('Status updated successfully!');

    }

    public function edit($id)
    {
        $this->resetErrorBag();
        $this->reset('name', 'slug', 'image', 'category_id');
        $sub_category = ModelSubCategory::find($id);
        if ($sub_category) {
            $this->editingId = $sub_category->id;
            $this->editingName = $sub_category->name;
            $this->editingSlug = $sub_category->slug;
            $this->editingCategoryId = $sub_category->category_id;
            $this->oldImage = $sub_category->image;
            $this->editingImage = null;
        }

    }

    public function update()
    {
        $this->validate([
            'editingName' => 'required|string|max:255',
            'editingSlug' => 'required|string|max:255',
            'editingCategoryId' => 'required|exists:categories,id',
            'editingImage' => 'nullable|sometimes|image|max:1024',
        ]);

        $sub_category = ModelSubCategory::find($this->editingId);
        if (!$sub_category) {
            return; 
        }

        $imagePath = $sub_category->image; 

        
        if ($this->editingImage) {
            if ($sub_category->image) {
                Storage::disk('public')->delete($sub_category->image);
            }
            $imagePath = $this->editingImage->store('sub-categories', 'public');
        }

        $sub_category->update([
            'name' => $this->editingName,
            'slug' => $this->editingSlug,
            'category_id' => $this->editingCategoryId,
            'image' => $imagePath, 
        ]);

        $this->cancel(); 
        flash()->success('Sub Category updated successfully!');
    }

    public function cancel()
    {
        $this->reset('editingId', 'editingName', 'editingSlug', 'editingImage');
        $this->resetErrorBag();
    }

    public function render()
    { 
        $sub_categories = ModelSubCategory::latest()
        ->where('name', 'like', '%'.$this->search.'%')
        ->orWhere('slug', 'like', '%'.$this->search.'%')
        ->with('category')
        ->get();
        $categories = Category::all();
        return view('livewire.sub-category', compact('sub_categories', 'categories'));
    }
}
