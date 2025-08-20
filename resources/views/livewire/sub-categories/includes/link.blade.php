<x-admin-component.container class="gap-4 rounded-t-lg ">
<div>
    <div class="flex items-center space-x-4">
        <x-admin-component.link-category href="{{ route('admin.categories.index') }}" :active="request()->routeIs('admin.categories.index')" value="Categories" />
        <x-admin-component.link-category href="{{ route('admin.sub-categories.index') }}" :active="request()->routeIs('admin.sub-categories.index')" value="Sub Categories" />
    </div>
</div>
</x-admin-component.container>