<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col=10">

                <form action="{{route('book.store')}}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="book_name" class="form-label">Book Name</label>
                        <input placeholder="Enter a book name" name="book_name" type="text" required class="form-control" id="book_name" value="{{old('book_name')}}">
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input placeholder="Enter author's name" name="author" type="text" required class="form-control" id="author" value="{{old('author')}}">
                    </div>

                    <div class="mb-3">
                        <label for="review" class="form-label">Write a review</label>
                        <textarea placeholder="Write a review" class="form-control" name="review" id="review" cols="30" rows="6">{{old("review")}}</textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-10">
            <table class="table">
            <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Review</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($books as $book)
                    <tr>
                            <th scope="row">{{$loop->index}}</th>
                            <td>{{$book->book_name}}</td>
                            <td>{{$book->author}}</td>
                            <td>{{$book->review}}</td>
                            <td>
                          
                            <a href="{{route('book.edit',['id'=>$book->id])}}" class="btn btn-info">Edit</a>
                            <a href="{{route('book.delete',['id'=>$book->id])}}" class="btn btn-danger">Delete</button>
                            </td>
                            
                            
                    </tr>
                    @endforeach
            
                </tbody>
            </table>
                
            </div>
        </div>
    </div>

    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>