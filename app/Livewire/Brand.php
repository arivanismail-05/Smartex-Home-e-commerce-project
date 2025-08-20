<?php

namespace App\Livewire;

use App\Models\Brand as ModelsBrand;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Brand extends Component
{
    use \Livewire\WithFileUploads;

    #[Rule('required|string|max:255')]
    public $brand_name;


    #[Rule('nullable|sometimes|image|max:1024')]
    public $brand_logo;


    public $search;


    public $editingId;
    public $editingName;
    public $editingLogo;
    public $oldLogo;

    public function create()
    {
        $validated = $this->validate();

        if ($this->brand_logo) {
            $logoPath = $this->brand_logo->store('brands', 'public');
            $validated['brand_logo'] = $logoPath;
        }

        ModelsBrand::create($validated);

        $this->reset('brand_name', 'brand_logo');
        flash()->success('Brand saved successfully!');
    }

    public function delete($id)
    {
        $brand = ModelsBrand::find($id);
        if ($brand) {

        if ($brand->brand_logo) {
            Storage::disk('public')->delete($brand->brand_logo);
        }
        $brand->delete();
    }
    }


    public function edit($id)
    {
        $this->resetErrorBag();
        $this->reset('brand_name', 'brand_logo');
        $brand = ModelsBrand::find($id);
        if ($brand) {
            $this->editingId = $brand->id;
            $this->editingName = $brand->brand_name;
            $this->oldLogo = $brand->brand_logo;
            $this->editingLogo = null;
        }

    }

    public function update()
    {
        $this->validate([
            'editingName' => 'required|string|max:255',
            'editingLogo' => 'nullable|sometimes|image|max:1024',
        ]);

        $brand = ModelsBrand::find($this->editingId);
        if (!$brand) {
            return; 
        }

        $imagePath = $brand->brand_logo; 


        if ($this->editingLogo) {
            if ($brand->brand_logo) {
                Storage::disk('public')->delete($brand->brand_logo);
            }
            $imagePath = $this->editingLogo->store('categories', 'public');
        }

        $brand->update([
            'brand_name' => $this->editingName,
            'brand_logo' => $imagePath, 
        ]);

        $this->cancel(); 
        flash()->success('Brand updated successfully!');
    }

    public function cancel()
    {
        $this->reset('editingId', 'editingName', 'editingLogo');
        $this->resetErrorBag();
    }

    public function render()
    {
        $brands = ModelsBrand::latest()
        ->where('brand_name', 'like', '%'.$this->search.'%')
        ->get();
        return view('livewire.brand', compact('brands'));
    }
}
