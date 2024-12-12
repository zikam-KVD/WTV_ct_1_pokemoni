<x-app-layout>
    <section>
        @if(Session::has("message") == true)
            <p>{{ Session::get("message") }}</p>
        @endif
        <form action="{{ route('admin.pridejTyp') }}" method="post">
            @csrf
            <div>
                <label for="nazev">Název</label>
                <input type="text" name="typ-nazev" id="nazev">
            </div>
            <div>
                <label for="bar">Barva </label>
                <input type="color" name="typ-barva" id="bar">
            </div>
            <div>
                <x-button>Odeslat</x-button>
            </div>
        </form>
    </section>

    <section>
        <table>
            <tr>
                <th>Název</th>
                <th>Barva</th>
                <th>Smaž</th>
            </tr>
            @foreach ($typy as $ufff)
                <tr>
                    <td>{{ $ufff->nazev }}</td>
                    <td style="background:{{ $ufff->barva }}">{{ $ufff->barva }}</td>
                    <td>-</td>
                </tr>
            @endforeach
        </table>
    </section>
</x-app-layout>
