<div>
    {{-- targeting the method handleClick in Component Class Clicker.php --}}
    {{-- <h2>{{ $title }}</h2>
    {{ $username }}
    {{ count($users) }}
    <button wire:click="createNewUser">Create New Entry</button>
    <br>--}}

    <h2>Data Binding EP3 - Livewire</h2>
    {{-- Session Message Creation --}}
    @if(session('success'))
        <span class="w-100 py-3 bg-green-300 rounded">{{session('success')}}</span>
    @endif
    <br>

    <form class="p-5" wire:submit="createNewRecord" action="">
        <input class="block rounded border border-gray-100 px-3 py-1 mb-1" wire:model="name" type="text" placeholder="name">
            @error('name')
                <span class="text-red-500 text-xs">{{$message}}</span>
            @enderror
        <input class="block rounded border border-gray-100 px-3 py-1 mb-1" wire:model="email" type="text" placeholder="Email Address">
            @error('email')
                <span class="text-red-500 text-xs">{{$message}}</span>
            @enderror
        <input class="block rounded border border-gray-100 px-3 py-1 mb-1" wire:model="password" type="password" placeholder="password">
            <button class="block rounded px-3 py-1 bg-blue-400 text-white">Create Data</button>
    </form>

@foreach ($users as $item)
    <h4>{{ $item->name }}</h4>
@endforeach 

{{ $users->links() }}
  
</div>
