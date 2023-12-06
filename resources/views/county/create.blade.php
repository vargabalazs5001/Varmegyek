<div style="max-width: 400px; margin: 0 auto;">
    <h1>Új megye hozzáadása</h1>

    <form action="{{ route('counties/store') }}" method="post" style="margin-bottom: 20px;">
        @csrf
        <label for="name" style="display: block; margin-bottom: 5px;">Név:</label>
        <input type="text" name="name" required style="width: 100%; padding: 8px; box-sizing: border-box; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">
        <button type="submit" style="background-color: #007bff; color: #fff; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer;">Kész</i></button>
    </form>

    <a href="{{ route('county/index') }}" style="text-decoration: none; color: #fff; background-color: #6c757d; padding: 8px 12px; border-radius: 4px; display: inline-block;">Mégse</a>
</div>