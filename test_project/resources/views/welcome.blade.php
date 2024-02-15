<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
 
  <div class="container">
            <div class="row">
                <div class="col-12">          
                        <form action="{{route('post.store')}}" method="post">
                             @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input placeholder="Enter Title" name="title" type="text" required class="form-control" id="title"   value="{{old('title')}}">
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Body</label>

                                <textarea placeholder="Enter Description" class="form-control" name="body" id="body" cols="30" rows="6">{{old("body")}}</textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Body</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                        <th scope="row">{{$loop->index}}</th>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->body}}</td>
                                </tr>
                            @endforeach

                            
                        </tbody>
                </table>
                </div>
            </div>
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>