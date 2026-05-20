<x-app-layout>
    <x-slot name="header">
        <h1>{{ $airdrop->name }}</h1>
    </x-slot>

    <div style="max-width: 900px; margin: 0 auto; padding: 2rem;">
        <h2>Test Simple View</h2>
        <p>ID: {{ $airdrop->id }}</p>
        <p>Name: {{ $airdrop->name }}</p>
        <p>Chain: {{ $airdrop->chain }}</p>
        <p>Status: {{ $airdrop->status }}</p>
        <p>Created: {{ $airdrop->created_at->format('M d, Y') }}</p>
        
        @if ($airdrop->is_completed)
            <p>Completed: Yes</p>
            <p>Earnings: ${{ number_format($airdrop->earnings, 2) }}</p>
        @else
            <p>Completed: No</p>
        @endif

        <a href="{{ route('airdrop.index') }}" class="btn btn-secondary">Back</a>
    </div>
</x-app-layout>
