<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="{{route('book.update',['id'=>$book->id])}}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" name="book_name" value="{{ $book->book_name }}">
                <input type="text" name="author" value="{{ $book->author }}">
                <input type="text" name="review" value="{{ $book->review }}">
            </div>

            <div class="mb-3">
                <button type="submit">Update</button>
            </div>




        </form>

    </div>
</body>

</html>