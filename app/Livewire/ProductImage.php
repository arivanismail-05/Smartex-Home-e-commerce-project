<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductImage as ModalProductImage;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProductImage extends Component
{

   
    use WithFileUploads;
    public $productId;

    public $editingImageId;
    public $editingPath;
    public $oldPath;


    public $AddImage = false;

    public $imagePaths = [];


    public function addImage()
    {
        $this->AddImage = true;
    }

    public function cancel_add()
    {
        $this->reset('AddImage');
    }


    public function toggleImageStatus($imageId)
    {
        $image = ModalProductImage::findOrFail($imageId);
        $images = ModalProductImage::where('product_id', $this->productId)->get();
        foreach ($images as $img) {
            $img->image_status = false;
            $img->save();
        }
        

        foreach ($images as $img) {
            if ($img->image_status === false) {
                $img->image_status = false;
                $img->save();
            }
        }

        $image->image_status = !$image->image_status;
        $image->save();
        flash()->success('Image status updated successfully.');
        return redirect()->route('admin.products.show', ['product' => $this->productId]);
    }

    public function delete_image($imageId)
    {
        $image = ModalProductImage::findOrFail($imageId);
        $product = Product::find($this->productId);

        $product->image_count--;
        $product->save();
        Storage::disk('public')->delete($image->image_path);
        

        $image->delete();
        flash()->success('Image deleted successfully!');
    }


    public function edit_image($imageId)
    {
        $this->resetErrorBag();
        $this->reset('editingImageId', 'editingPath');
        $image = ModalProductImage::find($imageId);
        if ($image) {
            $this->editingImageId = $image->id;
            $this->oldPath = $image->image_path;
            $this->editingPath = null;
        }
    }

   public function cancel_edit()
   {
        $this->reset('editingImageId', 'editingPath');
        $this->resetErrorBag();
   }

    public function update_image_path()
    {
        $this->validate([
            'editingPath' => 'nullable|sometimes|image|max:1024',
        ]);

        $image = ModalProductImage::find($this->editingImageId);
        if (!$image) {
            return; 
        }

        $imagePath = $image->image_path; 

        
        if ($this->editingPath) {
            if ($image->image_path) {
                Storage::disk('public')->delete($image->image_path);
            }
            $imagePath = $this->editingPath->store('product-image', 'public');
        }

        $image->update([
            'image_path' => $this->editingPath ? $this->editingPath->store('product-image', 'public') : $imagePath,
        ]);
        $this->reset('editingImageId', 'editingPath');
        $this->resetErrorBag();

        flash()->success('image updated successfully!');
    }


    public function uploadImages()
    {

        $this->validate([
            'imagePaths.*' => 'nullable|sometimes|image|mimes:jpeg,png,jpg|max:1024', 
        ]);

        $product = Product::findOrFail($this->productId);

        foreach ($this->imagePaths as $imagePath){
            $path = $imagePath->store('product-image', 'public');
            ModalProductImage::create([
                
                'product_id' => $this->productId,
                'image_path' => $path,
                'image_status' => false,
            ]);
            $product->image_count++;
        }
        $product->save();

        $this->reset('imagePaths', 'AddImage');
        $this->resetErrorBag();

        flash()->success('Images uploaded successfully!');

    }



    

    public function render()
    {
        $product= Product::find($this->productId);
        $product->where('id', $this->productId);
        return view('livewire.product-image', compact('product'));
    }
}
