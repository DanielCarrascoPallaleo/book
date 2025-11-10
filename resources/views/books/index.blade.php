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
    <table style="display: flex; width: 100vw">
        <thead>
          <tr>
            <th>#</th>
            <th>Tittlo</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>
                        <form method="POST" action="{{ route('books.destroy', $book->id) }}">
                            @csrf 

                            @method('DELETE') 

                            <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este libro?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}">
                            <button type="button" >
                                Editar
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}">
                            <button type="button" >
                                ver
                            </button>
                        </form>
                    </td>
                </tr>       
            @endforeach
        </tbody>
     
    </table>
    
    
</body>
</html>