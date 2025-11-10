<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Gestor de libros</h1>
    <div style="display: flex; width: 100vw">
        <div style="display: flex; width: 50%">
            <form method="POST" action="{{ route('books.update', $book) }}">
                @csrf
                @method('PUT')
                <label>Editar libro</label>
               
                <input name="title" value="{{ $book->title }}" id="titletype="text">
                <button type="submit">Agregar libro</button>
            </form>
        </div>
    </div>
</body>
</html>