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
        <form action="{{route('blog.update',['id'=>$new_blog->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input placeholder="Enter a Blog Title" name="title" type="text" required class="form-control" id="title" value="{{$blog->title}}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea placeholder="Write a description" class="form-control" name="description" id="description" cols="30" rows="6">{{$blog->description}}</textarea> 
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Photo</label>
                    <img src="http://localhost:8000/uploads/{{$blog->image}}" style="width:100px;height:60px;">
                </div>

                <div class="mb=3">
                    <label for="image">Upload New photo</label>
                    <input type="file" name="image" required class="form-control" id="image" value="{{$new_blog->image}}">
                </div>

                <div class="mb-3">
                    <button type="submit">Update</button>
                </div>
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>