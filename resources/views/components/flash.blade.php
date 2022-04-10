<div>

    @if (session()->has('save'))
    <div x-data="{show:true}" x-init="setTimeout(()=>show=false,3000)" x-show="show"
        class="fixed px-4 py-2 text-sm text-white bg-blue-500 rounded-xl bottom-3 right-3">
        <p>{{ session('save')}}</p>
    </div>
    @endif

    @if (session()->has('info'))
    <div x-data="{show:true}" x-init="setTimeout(()=>show=false,3000)" x-show="show"
        class="fixed px-4 py-2 text-sm text-white bg-green-500 rounded-xl bottom-3 right-3">
        <p>{{ session('info')}}</p>
    </div>
    @endif

    @if (session()->has('alert'))
    <div x-data="{show:true}" x-init="setTimeout(()=>show=false,3000)" x-show="show"
        class="fixed px-4 py-2 text-sm text-white bg-red-600 rounded-xl bottom-6 left-3">
        <p>{{ session('alert')}}</p>
    </div>
    @endif

</div>