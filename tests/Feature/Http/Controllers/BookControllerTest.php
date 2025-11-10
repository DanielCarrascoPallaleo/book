<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotEquals;

#[Group('Books')]
class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    #[Test]
    public function vista_index_retorna_listado_de_libros(): void
    {
        // Arrange
        $books = Book::factory(10)->create([
            'title' => 'MY LIBRO '.fake()->sentence()
        ]);
        // Act
        $response = $this->get(route('books.index'));
        // Assert
        $response->assertStatus(200);
        $response->assertViewHas('books', $books);
    }

    /**
     * A basic unit test example.
     */
    #[Test]
    public function vista_show_retorna_instancia_de_libro(): void
    {
        // Arrange
        $book = Book::factory()->create([
            'title' => fake()->sentence(),
        ]);
        
        // Act
        $response = $this->get(route('books.show', $book->id));

        // Assert
        $response->assertStatus(200);
        $response->assertViewHas('book', $book);
    }

    #[Test]
    public function retorna_vista_create() :void{
       $response = $this->get(route('books.create'));
       $response->assertStatus(200); 
    }


    #[Test]
    public function creo_una_instancia_libro_en_bd(): void {
        // arrange
        $title = 'titulo de un libro';
        $data['title'] = $title;

        // actions
        $response = $this->post(route('books.store', $data));
  
        $BookCreated = Book::where('title', $title)->first();

        $this->assertNotNull($BookCreated, "no hay libro");
    }

   #[Test]
    public function elimino_una_instancia_libro_en_bd(): void{
       // arrange
        $data['title'] = 'titulo de un libro';

        // actions
        $this->post(route('books.store', $data));
       
        $book = Book::where('title', $data['title'])->first();
        $this->assertNotNull($book);

        // action
        $this->delete(route('books.destroy', ['book' => $book]));

        //accert
        $this->assertDatabaseMissing('books', [
            'id' => $book->id,
        ]);
        $this->assertNull($book->fresh(), 'no es nulo!');
    }

    #[Test]
    public function actualizo_una_instancia_libro_en_bd(): void{
        // arrange
        $title = 'titulo de un libro';
        $tituloNuevo = 'el piter pan';
        $data['title'] = $title;
        $this->post(route('books.store', $data));
        $BookCreated = Book::where('title', $data['title'])->first();

        $dataNueva['title'] = $tituloNuevo;
        // acction
        $this->put(route('books.update', $BookCreated), $dataNueva);

        $BookUpdated = Book::where('title', $tituloNuevo)->first();
        $this->assertNotNull($BookUpdated);

       
        $this->assertNotEquals($BookCreated->title, $BookUpdated->title);
        //busco el libro con titulo nuevo
        $this->assertNotNull($BookUpdated->title, 'no se actualizó!');


    }
}
