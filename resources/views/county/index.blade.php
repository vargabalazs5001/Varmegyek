@extends('layouts.app')
{{-- resources/views/index.blade.php --}}
@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <h1>Megyék</h1>

    <a href="javascript:void(0);" onclick="showAddCountyForm()" style="text-decoration: none; color: #fff; background-color: #28a745; padding: 8px 12px; border-radius: 4px; display: inline-block; margin-bottom: 15px;">Új megye</a>

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

<div id="addCountyForm" style="max-width: 400px; margin: 0 auto; display: none;">
    <h1>Új megye hozzáadása</h1>

    <form action="{{ route('counties/store') }}" method="post" style="margin-bottom: 20px;">
        @csrf
        <label for="name" style="display: block; margin-bottom: 5px;">Név:</label>
        <input type="text" name="name" required style="width: 100%; padding: 8px; box-sizing: border-box; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">
        <button type="submit" style="background-color: #007bff; color: #fff; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer;">Kész</i></button>
    </form>

    <a href="javascript:void(0);" onclick="hideAddCountyForm()" style="text-decoration: none; color: #fff; background-color: #6c757d; padding: 8px 12px; border-radius: 4px; display: inline-block;">Mégse</a>
</div>

<div id="editCountyForm" style="max-width: 400px; margin: 0 auto; display: none;">
    <h1>Megyék szerkesztése</h1>

    <form action="{{ route('county/update', $county) }}" method="post" style="margin-bottom: 20px;">
        @csrf
        @method('PUT')
        <label for="name" style="display: block; margin-bottom: 5px;">Név:</label>
        <input type="text" name="name" value="{{ $county->name }}" required style="width: 100%; padding: 8px; box-sizing: border-box; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">
        <button type="submit" style="background-color: #007bff; color: #fff; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer;">Mentés</button>
    </form>

    <a href="javascript:void(0);" onclick="hideEditCountyForm()" style="text-decoration: none; color: #fff; background-color: #6c757d; padding: 8px 12px; border-radius: 4px; display: inline-block;">Mégse</a>
</div>

<script>
    function showAddCountyForm() {
        document.getElementById('addCountyForm').style.display = 'block';
        document.getElementById('editCountyForm').style.display = 'none';
    }

    function hideAddCountyForm() {
        document.getElementById('addCountyForm').style.display = 'none';
    }

    function hideEditCountyForm() {
        document.getElementById('editCountyForm').style.display = 'none';
    }
</script>
@endsection