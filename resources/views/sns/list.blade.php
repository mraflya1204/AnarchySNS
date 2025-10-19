<x-layout>
@section('title', 'Identifier List')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold mb-4">Identifier List</h2>

    <ul>
        @foreach($identifiers as $identifier)
            <li>
                <x-card>
                    <h3>{{ $identifier->id }}</h3>
                </x-card>
            </li>
        @endforeach
    </ul>

    <div class="mt-6">
        {{ $identifiers->links() }}
    </div>
</div>
</x-layout>