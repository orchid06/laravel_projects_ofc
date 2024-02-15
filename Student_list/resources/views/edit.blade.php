<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit info</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-10">
            <form action="{{route('student.update',['id'=>$student->id])}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <label for="name" class="form-label">Name :</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{$student->name}}">
                    </div>

                    <div class="form-col">
                        <label for="standard" class="form-label">Standard :</label>
                        <input type="text" class="form-control" name="standard" id="standard" placeholder="standard" value="{{$student->standard}}">
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="section" id="A" checked value="A">
                        <label class="form-check-label" for="section">
                            Section A
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="section" id="B" value="B">
                        <label class="form-check-label" for="section">
                            Section B
                        </label>
                    </div>

                    <div class="mb-3">
                        <label for="number" class="form-label">Phone Number :</label>
                        <input type="text" class="form-control" name="number" id="number" placeholder="01...." value="{{$student->number}}">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Student photo :</label>
                        <input class="form-control" type="file" name="image" id="image">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>



                </form>
            </div>
        </div>
    </div>

</body>
</html>