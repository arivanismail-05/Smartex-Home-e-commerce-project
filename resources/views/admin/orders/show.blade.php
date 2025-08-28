<x-admin-dashboard-layout>

    <div class="mt-24 text-white">
      <div class="flex flex-col w-full">
        <div class="flex flex-col p-4 mx-4 gap-1.5">
          <x-admin-component.container class="gap-4 rounded-lg h-max">
    
           <div class="flex items-center justify-between">

                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.orders.index') }}" class="flex items-center p-2 space-x-2 border border-white rounded">
                      <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h2 class="text-xl font-semibold text-[#D97850]">Order Details {{ $order->id }}</h2>
                </div>
            </div>

          </x-admin-component.container>

          
          <div class="grid grid-cols-3 grid-rows-1 gap-3">
            <x-admin-component.container class="col-span-2 gap-5 rounded-l-lg">



                <div class="grid gap-2 border border-[#5e5e61] p-4 rounded-lg">
                  <div class="border-b border-[#5e5e61] grid items-center grid-cols-4 p-2 mt-2 text-lg ">
                    <h2 class="text-lg font-semibold text-[#D97850]">Order Items</h2>
                    <div class="font-semibold text-left">Quantity</div>
                    <div class="font-semibold text-left">Price</div>
                    <div class="font-semibold text-left">Total</div>
                  </div>
                  
                @foreach ($order->orderItems as $orderItem )

                    <div class="{{ ($loop->last) ? 'border-none ' : 'border-b border-[#5e5e61]'}} mt-2 grid grid-cols-4 items-center text-sm p-2">

                     <div>{{$orderItem->product->title}}</div>
                     <div>{{$orderItem->quantity}}</div>
                     <div>{{number_format($orderItem->price, 2)}}</div>
                     <div>{{number_format($orderItem->price * $orderItem->quantity, 2)}}</div>

                    </div>
                  @endforeach
                  </div>

              <div class="flex flex-col  w-full space-y-3 border border-[#5e5e61] p-4 rounded-lg">
                 <x-admin-component.contain-detail label="Customer Details" class="grid-cols-3">
                  <x-admin-component.div-container label="Name">
                    {{ $order->user->name }}
                  </x-admin-component.div-container>
                  <x-admin-component.div-container label="Email">
                    {{ $order->user->email }}
                  </x-admin-component.div-container>
                  <x-admin-component.div-container label="Phone Number">
                    {{ $order->user->phone }}
                  </x-admin-component.div-container>
                
               </x-admin-component.contain-detail>
                <x-admin-component.contain-detail label="Other Info" class="grid-cols-3">
                  <x-admin-component.div-container label="Location">
                    {{ $order->user->location }}
                  </x-admin-component.div-container>
                  <x-admin-component.div-container label="Created At">
                    {{ $order->user->created_at->format('d M, Y') }}
                  </x-admin-component.div-container>
                  <x-admin-component.div-container label="Updated At">
                    {{ $order->user->updated_at->format('d M, Y') }}
                  </x-admin-component.div-container>
               </x-admin-component.contain-detail>
              </div>

            </x-admin-component.container>
                <x-admin-component.container class="gap-5 rounded-r-lg">

                <div class="flex flex-col  w-full space-y-3 border border-[#5e5e61] p-4 rounded-lg ">
                  <div class="flex items-center justify-between mb-5">
                    <h2 class="text-lg font-semibold text-[#D97850]">Order Summary</h2>
                    @if($order->status)
                    <button
                    class="px-2 py-1 font-medium text-green-600 border border-green-600 rounded bg-green-600/30">Delivered</button>
                    @else
                    <button 
                    class="px-2 py-1 font-medium text-yellow-600 border border-yellow-600 rounded bg-yellow-600/30">Pending</button>
                    @endif
                  </div>
                  <div class="flex items-center justify-between ">
                    <p class="text-lggray-100 text-">Order Created</p>
                    <p class="text-gray-300 text-md">{{ $order->created_at->format('d M, Y') }}</p>
                  </div>
                  <div class="flex items-center justify-between ">
                    <p class="text-lggray-100 text-">Sub Total</p>
                    <p class="text-gray-300 text-md">{{ number_format($order->total, 2) }}</p>
                  </div>
                  <div class="flex items-center justify-between ">
                    <p class="text-lggray-100 text-">Delivery fee</p>
                    <p class="text-gray-300 text-md">{{ number_format($order->delivery_fee, 2) }}</p>
                  </div>
                </div>

                <div class="flex flex-col  w-full space-y-3 border border-[#5e5e61] p-4 rounded-lg ">
                  
                  <div class="flex items-center justify-between ">
                    <p class="text-lggray-100 text-">Total</p>
                    <p class="text-gray-300 text-md">{{ number_format($order->total + $order->delivery_fee, 2) }}</p>
                  </div>
                </div>

                <div class="flex flex-col  w-full space-y-3 border border-[#5e5e61] p-4 rounded-lg ">
                  <div class="flex items-center justify-between mb-5">
                    <h2 class="text-lg font-semibold text-[#D97850]">Delivery Address</h2>
                  </div>
                  <div class="flex items-center justify-between ">
                    <p class="text-lggray-100 text-">Order Location</p>
                    <p class="text-gray-300 text-md">{{ $order->location }}</p>
                  </div>
                  
                </div>

                <div class="">
                  <form action="{{ route('admin.orders.toggleStatus', ['order' => $order->id]) }}" method="POST">
                    @csrf
                    <button class=" items-center py-3 w-full bg-[#D97850] border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-[#fe976e] focus:bg-[#fe976e] active:bg-[#C36E44] focus:outline-none  focus:ring-2 focus:ring-[#C36E44] focus:ring-offset-2 focus:outline-[#2B2B2B] transition ease-in-out duration-150">
                        @if($order->status)
                        Mark as Pending
                        @else
                          Mark as Delivered
                        @endif
                    </button>
                  
                </div>

                </x-admin-component.container>
          </div>
        </div>
      </div>
    </div>
    
</x-admin-dashboard-layout>
