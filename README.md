# Books_Authors_RESTful_API
This is a simple RESTful API for working with a database of authors and books.  
API was designed via PHP7 and MySQL. Documentation was created via Swagger.  
### `Book` objects support methods:  
- `GET api/books/` - gets a list of all books in database.  
- `GET api/books/{id}` - gets a book by ID.  
- `GET api/books/author/{author_id}` - gets a list of books by their author's ID.  
- `GET api/books/ISBN/{ISBN}` - gets a book by ISBN.  
- `PUT api/books/{id}` - changes a book by ID.  
- `POST api/books/` - creates a new book.  
- `DELETE api/books/{id}` - deletes a book by ID.  

### `Author` objects support methods:
- `GET api/authors/` - gets a list of all authors in database.  
- `GET api/authors/{id}` - gets an author by ID.   
- `PUT api/authors/{id}` - changes an author by ID.  
- `POST api/authors/` - creates a new author.  
- `DELETE api/authors/{id}` - deletes an author by ID.    
