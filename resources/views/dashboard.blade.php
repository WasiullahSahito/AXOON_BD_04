<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="p-6 text-gray-900">
        @if ($role === 'admin')
            <p>Welcome, Admin. You have full access.</p>
        @elseif ($role === 'user')
            <p>Welcome, User. You have limited access.</p>
        @else
            <p>Welcome, Guest.</p>
        @endif
    </div>
</x-app-layout>