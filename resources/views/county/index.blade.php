<div style="max-width: 600px; margin: 0 auto;">
    <h1>Megyék</h1>

    <a href="{{ route('county/create') }}" style="text-decoration: none; color: #fff; background-color: #28a745; padding: 8px 12px; border-radius: 4px; display: inline-block; margin-bottom: 15px;">Új megye</a>

    <form action="{{ route('county/filter') }}" method="post" style="margin-bottom: 15px;">
        @csrf
        <input type="text" name="filter" placeholder="Szűrés..." style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        <button type="submit" style="padding: 8px 12px; background-color: #007bff; border: none; border-radius: 4px; color: #fff; cursor: pointer;">Szűrés</button>
    </form>

    <ul style="list-style-type: none; padding: 0;">
        @foreach ($counties as $county)
            <li style="border: 1px solid #ccc; border-radius: 4px; margin-bottom: 10px; padding: 10px; display: flex; justify-content: space-between; align-items: center;">
                <span>{{ $county->name }}</span>
                <div>
                    <a href="{{ route('county/edit', $county) }}" style="text-decoration: none; color: #fff; background-color: #17a2b8; padding: 6px 10px; border-radius: 4px; margin-right: 5px;">Módosítás</a>
                    <form action="{{ route('county/destroy', $county) }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: #dc3545; color: #fff; padding: 6px 10px; border: none; border-radius: 4px; cursor: pointer;" onclick="return confirm('Biztosan törölni szeretné?')">Törlés</i></button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>