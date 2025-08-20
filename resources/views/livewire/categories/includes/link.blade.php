<x-admin-component.container class="gap-4 rounded-t-lg ">
<div>
    <div class="flex items-center space-x-4">
        <x-admin-component.link-category href="{{ route('admin.categories.index') }}" active=" {{ request()->is('admin/categories') ? 'true' : 'false' }} " value="Categories" />
    </div>           
</div>
</x-admin-component.container>