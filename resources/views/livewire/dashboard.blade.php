<div class="grid grid-rows-2 gap-4">
<div class="grid grid-cols-3 row-span-1 gap-4">
    <div class="flex flex-col col-span-2 gap-4 ">
    <div class="">
    <x-admin-component.container class="rounded-lg ">
        <div class="grid grid-cols-4 gap-4">
            <x-admin-component.dashboard-header label="Today's Sales" count="${{ number_format($today_sale,1 )}}">
                    <i class="text-2xl text-[#D97850] fa-solid fa-chart-column "></i>
            </x-admin-component.dashboard-header>
            <x-admin-component.dashboard-header label="New Orders" count="{{ $order_count }}">
                    <i class="text-2xl text-[#D97850] fa-solid fa-cart-plus "></i>
            </x-admin-component.dashboard-header>
            <x-admin-component.dashboard-header label="New Customers" count="{{ $new_customers }}">
                    <i class="text-2xl text-[#D97850] fa-solid fa-user "></i>
            </x-admin-component.dashboard-header>
            <x-admin-component.dashboard-header label="Low Products Stock" count="{{ $low_stock_products }}">
                    <i class="text-2xl text-[#D97850] fa-solid fa-arrow-trend-down "></i>
            </x-admin-component.dashboard-header>
        </div>
    </x-admin-component.container>
    </div>
    <div class="">

<x-admin-component.container class="col-span-2 gap-2 rounded-lg ">

        <div class="flex items-center justify-between">
        <h1 class="text-[#D97850] font-semibold text-xl">New Customers</h1>
        <a href="{{ route('admin.users.index' ) }}" class="flex items-center content-center justify-center w-8 h-8 transition duration-500 -rotate-90 cursor-pointer rounded-xl hover:translate-x-2 ">
            <i class="text-2xl text-gray-100 fa-solid fa-caret-down"></i>
        </a>
        </div>
        <div>
           

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left ">
                <thead class="text-xs text-left text-gray-700 uppercase dark:text-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Location
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer )


                    <tr wire:key="{{ $customer->id }}" class="hover:bg-[#111315] rounded-lg text-left">

                        <td class="px-6 py-4">
                            {{ $customer->id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $customer->name }}
                        </td>
                        <td class="px-6 py-4">
                        {{ $customer->email }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $customer->phone }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $customer->location }}
                        </td>
                    </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>

        </div>
    </x-admin-component.container>
    </div>
    </div>
    
     <x-admin-component.container class="col-span-1 gap-2 rounded-lg ">
        <div class="flex items-center justify-between">
        <h1 class="text-[#D97850] font-semibold text-xl">Today Orders</h1>
        <a href="{{ route('admin.orders.index') }}" class="flex items-center content-center justify-center w-8 h-8 transition duration-500 -rotate-90 cursor-pointer rounded-xl hover:translate-x-2 ">
            <i class="text-2xl text-gray-100 fa-solid fa-caret-down"></i>
        </a>
        </div>
        <div class="grid gap-2">
            @foreach ($orderItems as $orderItem )
            
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        
                        <div class="flex flex-col gap-1">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{$orderItem->product->title}} <span class="text-xs text-gray-500 dark:text-gray-400" >{{$orderItem->product->subCategory->name}}</span></h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400" >By {{ $orderItem->order->user->name }}</p>
                        </div>
                        
                    </div>
                    <div class="flex flex-col items-end gap-1 bg-[#111315] py-2 px-4 rounded-md">
                        <p class="text-xs font-bold dark:text-white">${{ number_format($orderItem->price, 2) }}</p>
                        <p class="text-[10px] text-gray-500 dark:text-gray-400">{{ $orderItem->quantity }} QTY</p>
                    </div>
                </div>
        @endforeach
        </div>
        
        
    </x-admin-component.container>
   
</div>

</div>