
<nav class="  fixed w-full z-20 top-0 start-0  ">
  <div class=" mx-4 flex flex-wrap items-center justify-between p-4">
  <div class="flex flex-wrap items-center justify-between gap-20">
   <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
      <span class="self-center text-2xl font-semibold whitespace-nowrap text-white ">SmartexHome</span>
  </a>

    <div class="rounded-lg px-5 py-1 flex justify-center items-center border  bg-[#242428] border-[#3e3e3f]  w-full md:flex md:items-center md:w-auto" id="navbar-sticky">
        <ul class="flex items-center flex-col p-4 md:p-0 mt-4 font-medium md:space-x-4 rtl:space-x-reverse md:flex-row md:mt-0 ">
        <x-admin-component.nav-link :href="route('admin.dashboard')"  :active="request()->routeIs('admin.dashboard')"  :value="__('Dashboard')" />
        <x-admin-component.dropdown value="Products" >
            <x-admin-component.dropdown-nav href="#" :value="__('Product 1')" />
            <x-admin-component.dropdown-nav href="#" :value="__('Product 2')" />
            <x-admin-component.dropdown-nav href="#" :value="__('Product 3')" />
        </x-admin-component.dropdown>

        <x-admin-component.dropdown value="Orders" />

        <x-admin-component.dropdown value="Customers" />

        <x-admin-component.dropdown value="Reports" />
        </ul>
    </div>
  </div>
  
  <div class="flex space-x-3 md:space-x-0 rtl:space-x-reverse  justify-end">
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
