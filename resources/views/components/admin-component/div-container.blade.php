@props(['label'])


<div class="space-y-2">
    <h4 class="font-medium text-white text-md">{{ $label }} : </h4>
    <div class="font-semibold text-[#F0F0F0] bg-[#424246] p-2 rounded-md">
        {{ $slot }}
    </div>
</div>