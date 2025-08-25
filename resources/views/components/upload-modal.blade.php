<div

x-data ="{show : false}"
x-show="show"
x-on:open-modal.window="show = true"
x-on:close-modal.window="show = false"
x-on:keydown.escape.window="show = false"
style="display:none"
class="fixed inset-0 z-50"
x-transition.duration.300ms
>

    <div x-on:click="show = false" class="fixed inset-0 bg-[#111315] opacity-60"></div>
    <div class="fixed inset-0 m-auto rounded w-2xl" style="max-height:400px">
        {{ $slot }}
    </div>
</div>