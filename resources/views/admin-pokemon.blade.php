<x-app-layout>
    <section>
        @if(Session::has("message") == true)
            <p>{{ Session::get("message") }}</p>
        @endif
        <form
            action="{{ route('admin.pridejPokemona') }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            <div>
                <x-label for="nazev" value="Název" />
                <x-input name="nazev" id="nazev" />
                <x-input-error for="nazev" />
            </div>
            <div>
                <x-label for="popis" value="Popis" />
                <x-input name="popis" id="popis" />
                <x-input-error for="popis" />
            </div>
            <div>
                <x-label for="typ" value="Typ" />
                <select name="typ" id="typ">
                    @foreach ($typy as $typ)
                        <option value="{{ $typ->id }}">{{ $typ->nazev }}</option>
                    @endforeach
                </select>
                <x-input-error for="typ" />
            </div>
            <div>
                <x-label for="obrazek" value="Obrázek" />
                <x-input type="file" name="obrazek" />
                <x-input-error for="obrazek" />
            </div>
            <div>
                <x-button style="background: red">
                    Vlož pokémona
                </x-button>
            </div>
        </form>
    </section>
</x-app-layout>
