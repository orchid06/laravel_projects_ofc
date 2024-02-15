<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        h3 {text-align: center;}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h3>Put new info</h3>

    <div class="container">
        <div class="row">
            <div class="col-10">
                <form action="{{route('member.update', ['id'=>$member->id])}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name"> Name : </label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{$member->name}}">
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male"  value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female"> Female </label>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="number">Phone Number: </label>
                            <input type="text" class="form-control" name="number" id="number" placeholder="Enter Phone Number" value="{{$member->number}}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Photo</label>
                        <img src='{{url('/uploads/'.$member->image)}}' style="width:100px;height:60px;">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Update Photo</label>
                        <input class="form-control" type="file" name="image" id="image">
                    </div>

                    <div class="mb-3">
                    <button type="submit" class="btn btn-success">Update</button>
                    </div>

                </form>



            </div>
        </div>
    </div>
</body>

</html>