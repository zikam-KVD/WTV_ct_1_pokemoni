<x-guest-layout>
        <main>
            @if(0 == count($pokemoni))
                <p>
                    Hele,
                    pokemoni
                    typu <em>{{ $nazevTypu }}</em>
                    tu nejsou.
                </p>
            @else
                @foreach ($pokemoni as $pokemon)
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
            @endif

        </main>
</x-guest-layout>
