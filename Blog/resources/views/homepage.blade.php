<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        h1 {text-align: center;}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1>Blog</h1>
    <div class="container">
        <div class="row">
            <div class="col=10">

                <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input placeholder="Enter a Blog Title" name="title" type="text" required class="form-control" id="title" value="{{old('title')}}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea placeholder="Write a description" class="form-control" name="description" id="description" cols="30" rows="6">{{old("description")}}</textarea>
                    </div>
                    <div class="mb-3">
                            <label for="">Upload Image</label>
                            <input type="file" name="image" required class="form-control" id="image" value="{{old('image')}}">
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
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Photo</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($blogs as $blog)
                    <tr>
                            <th scope="row">{{$loop->index}}</th>
                            <td>{{$blog->title}}</td>
                            <td>{{$blog->description}}</td>
                            <td><img src="uploads/{{$blog->image}}" style="width:100px;height:60px;"></td>
                            <td>
                          
                            <a href="{{route('blog.edit',  ['id'=>$blog->id])}}" class="btn btn-info">Edit</a>
                            <a href="{{route('blog.delete',['id'=>$blog->id])}}" class="btn btn-danger">Delete</button>

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