<x-guest-layout>
    <main>
            @foreach ($digimoni as $pokemon)
                <div class="card">
                    <img
                        src="{{ asset('images/' . strtolower($pokemon->nazev) . '.png') }}"
                        alt="{{ $pokemon->nazev }}"
                    >
                    <a href="{{ route('detail', ['id' => $pokemon->id]) }}">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            @endforeach
        </main>
</x-guest-layout>
