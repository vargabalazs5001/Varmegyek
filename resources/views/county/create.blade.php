<div>
<h1>Új megye hozzáadása</h1>

<form action="{{ route('counties/store') }}" method="post">
    @csrf
    <label for="name">Név:</label>
    <input type="text" name="name" required>
    <button type="submit">Mentés</button>
</form>

<a href="{{ route('county/index') }}" class="btn btn-secondary">Mégse</a>

</div>
