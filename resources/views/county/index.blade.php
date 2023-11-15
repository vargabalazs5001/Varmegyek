<div>
<h1>Megyék</h1>

<a href="{{ route('county/create') }}" class="btn btn-success">Új megye</a>

<form action="{{ route('county/filter') }}" method="post">
    @csrf
    <input type="text" name="filter" placeholder="Szűrés...">
    <button type="submit">Szűrés</button>
</form>

<ul>
    @foreach ($counties as $county)
        <li>
            {{ $county->name }}
            <a href="{{ route('county/edit', $county) }}" class="btn btn-info">Módosítás</a>
            <form action="{{ route('county/destroy', $county) }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Biztosan törölni szeretné?')">Törlés</button>
            </form>
        </li>
    @endforeach
</ul>

</div>
