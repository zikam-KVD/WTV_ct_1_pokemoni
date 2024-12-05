<x-guest-layout>
        <main id="detail">
            <div class="card">
                <img
                    src="{{ asset('images/' . strtolower($pokemon->nazev) .'.png') }}"
                    alt="{{ $pokemon->nazev }}"
                >
                <div>
                    <a href="{{ route('typy', ['id' => $pokemon->typ->id]) }}">
                        <span
                            class="card-typ"
                            style="background: {{ $pokemon->typ->barva }}"
                        >
                            {{ $pokemon->typ->nazev }}
                        </span>
                    </a>
                </div>
                <p>
                    {{ $pokemon->popis }}
                </p>
            </div>
        </main>
</x-guest-layout>
