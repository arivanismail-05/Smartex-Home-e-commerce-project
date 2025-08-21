<nav class="  fixed bg-[#111315] w-full z-20 top-0 start-0  ">
  <div class="flex flex-wrap items-center justify-between p-4 mx-4 ">
  <div class="flex flex-wrap items-center justify-between gap-20">
   <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
      <span class="self-center text-2xl font-semibold text-white whitespace-nowrap ">SmartexHome</span>
  </a>

    <div class="rounded-lg px-5 py-1 flex justify-center items-center border  bg-[#242428] border-[#3e3e3f]  w-full md:flex md:items-center md:w-auto" id="navbar-sticky">
        <ul class="flex flex-col items-center p-4 mt-4 font-medium md:p-0 md:space-x-4 rtl:space-x-reverse md:flex-row md:mt-0 ">
        <x-admin-component.nav-link :href="route('admin.dashboard')"  :active="request()->routeIs('admin.dashboard')"  :value="__('Dashboard')" />
        <x-admin-component.dropdown value="Catalog" >
            <x-admin-component.dropdown-nav href="{{ route('admin.categories.index') }}" :value="__('Categories')" />
            <x-admin-component.dropdown-nav href="{{ route('admin.sub-categories.index') }}" :value="__('Sub-Categories')" />
            <x-admin-component.dropdown-nav href="{{ route('admin.products.index') }}" :value="__('Products')" />
            <x-admin-component.dropdown-nav href="{{ route('admin.brands.index') }}" :value="__('Brands')" />
        </x-admin-component.dropdown>

        <x-admin-component.dropdown value="Sales" >
            <x-admin-component.dropdown-nav href="#" :value="__('Orders')" />
            <x-admin-component.dropdown-nav href="#" :value="__('Customers')" />
        </x-admin-component.dropdown>

        <x-admin-component.dropdown value="Marketing" >
            <x-admin-component.dropdown-nav href="#" :value="__('Banners')" />
            <x-admin-component.dropdown-nav href="#" :value="__('Discounts')" />
        </x-admin-component.dropdown>

        {{-- <x-admin-component.nav-link :href="route('admin.site-content')"  :active="request()->routeIs('admin.site-content')"  :value="__('Site Content')" /> --}}

        </ul>
    </div>
  </div>
  
  <div class="flex justify-end space-x-3 md:space-x-0 rtl:space-x-reverse">
    <div class="relative flex items-center">
        <x-admin-component.profile-dropdown :email="auth()->guard('admin')->user()->email" :value="auth()->guard('admin')->user()->name" class=" border border-[#3e3e3f] bg-[#242428] text-gray-400 hover:bg-[#424246] hover:text-[#F0F0F0] transition-colors duration-150" >
          <form method="POST" action="{{ route('admin.logout') }}">
        @csrf

        <x-admin-component.responsive-nav-link :href="route('admin.logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-admin-component.responsive-nav-link>
        </form>
        </x-admin-component.profile-dropdown>
    </div>
  </div>
  </div>
</nav>
