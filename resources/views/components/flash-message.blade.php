@if (session()->has('message'))
<div x-data="{show: true}" x-init='setTimeout(() => show = false, 3000)' x-show="show" class="fixed text-green-800 bg-green-400 py-3 top-0 left-1/2 transform -translate-1/2 px-48">
    <p>
        {{session('message')}}
    </p>
</div>
@endif