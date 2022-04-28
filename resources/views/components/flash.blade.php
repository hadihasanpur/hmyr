<div>

    @if (session()->has('save'))
    <div x-data="{show:true}" x-init="setTimeout(()=>show=false,3000)" x-show="show"
        class="bg-blue-500 fixed text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
        <p>{{ session('save')}}</p>
    </div>
    @endif

    @if (session()->has('info'))
    <div x-data="{show:true}" x-init="setTimeout(()=>show=false,3000)" x-show="show"
        class="bg-green-500 fixed text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
        <p>{{ session('info')}}</p>
    </div>
    @endif

    @if (session()->has('alert'))
    <div x-data="{show:true}" x-init="setTimeout(()=>show=false,3000)" x-show="show"
        class="fixed bg-red-600 text-white py-2 px-4 rounded-xl bottom-6 left-3 text-sm">
        <p>{{ session('alert')}}</p>
    </div>
    @endif

</div>
