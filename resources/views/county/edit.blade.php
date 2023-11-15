<div>
<h1>Megyék szerkesztése</h1>

<form action="{{ route('county/update', $county) }}" method="post">
    @csrf
    @method('PUT')
    <label for="name">Név:</label>
    <input type="text" name="name" value="{{ $county->name }}" required>
    <button type="submit">Mentés</button>
</form>

<a href="{{ route('county/index') }}" class="btn btn-secondary">Mégse</a>

</div>
