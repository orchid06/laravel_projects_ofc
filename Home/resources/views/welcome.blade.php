<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        h1 {
            text-align: center;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <h1>Home</h1>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <form action="{{route('member.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name"> Name : </label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{old('name')}}">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female"> Female </label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="number">Phone Number: </label>
                            <input type="text" class="form-control" name="number" id="number" placeholder="Enter Phone Number" value="{{old('number')}}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Insert Photo</label>
                        <input class="form-control" type="file" name="image" id="image" >
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Primary</button>
                    </div>

                </form>

                <form action="{{route('student.search')}}" method="post">
                        @csrf

                        <div class="input-group">
                                <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
                        </div>

                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $members as $member )

                        <tr>
                            <td scope="row"> {{$loop->index}}</td>
                            <td>{{$member->name}}</td>
                            <td>{{$member->gender}}</td>
                            <td>{{$member->number}}</td>
                            <td> <img src="uploads/{{$member->image}}" style="width:100px;height:60px;"> </td>
                            <td>
                                <a href="{{route('member.edit' ,  ['id'=>$member->id])}}" class="btn btn-light">Edit</a>
                            </td>
                            <td>
                                <a href="{{route('member.delete', ['id'=>$member->id])}}" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>



            </div>
        </div>
    </div>

</body>

</html>