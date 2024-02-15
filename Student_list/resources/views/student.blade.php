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
    <title>Students</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
</head>

<body>
    <h1>Student Info</h1>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <!-- Button Trigger Input Modal -->
                <a button class="btn btn-default btn-md" data-toggle="modal" data-target="#inputStudent">
                    <span class="glyphicon glyphicon-edit"> Create New </span>
                    </button>

                </a>
                <!-- Input Modal -->
                <div class="modal fade" id="inputStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel"> Add new student </h3>
                            </div>
                            <form action="{{route('student.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-5">

                                                <div class="form-row">
                                                    <label for="name" class="form-label">Name :</label>
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{old('name')}}">
                                                </div>

                                                <div class="form-col">
                                                    <label for="standard" class="form-label">Standard :</label>
                                                    <input type="text" class="form-control" name="standard" id="standard" placeholder="standard" value="{{old('standard')}}">
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
                                                    <input type="text" class="form-control" name="number" id="number" placeholder="01...." value="{{old('number')}}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Student photo :</label>
                                                    <input class="form-control" type="file" name="image" id="image">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <!--Search-->
                <div class="container">
                    <div class="row">
                        <div class="col-10">

                            <form action="{{route('student.search')}}" method="get">
                                @csrf

                                <div class="mb-3">

                                    <div class="input-group">
                                        <input type="text" class="form-control rounded" placeholder="Search" name="search" id="search" aria-label="Search" aria-describedby="search-addon" />
                                        <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @if(count($students)>0)
                <!--Data Table-->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student Photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Standard</th>
                            <th scope="col">Section</th>
                            <th scope="col">Number</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $students as $student )
                        <tr>
                            <th scope="row">{{$loop->index}}</th>
                            <td>
                                <img src="/uploads/{{$student->image}}" style="width:100px; height:60px;">
                            </td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->standard}}</td>
                            <td>{{$student->section}}</td>
                            <td>{{$student->number}}</td>

                            <!--Edit Modal-->
                            <td>

                                <!-- Button trigger modal -->
                                <button type="button" button class="btn btn-default btn-sm" data-toggle="modal" data-target="#editModal{{$student->id}}">
                                    <span class="glyphicon glyphicon-edit"> Edit </span>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Edit info</h3>

                                            </div>
                                            <form action="{{route('student.update',['id'=>$student->id])}}" method="post" enctype="multipart/form-data">
                                                @csrf

                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-5">

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

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </td>

                            <!--Delete Modal-->
                            <td>

                                <!-- Button trigger modal -->
                                <button type="button" button class="btn btn-delete" data-toggle="modal" data-target="#delete{{$student->id}}">
                                    <span class="mdi mdi-delete mdi-18px"></span>
                                    <span>Delete</span>
                                </button>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="delete{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Confirm Deletation</h3>
                                            </div>
                                            <div class="modal-body">
                                                ...Are you sure you want to delete <strong>{{$student->name}}'s</strong> info?
                                            </div>
                                            <div class="modal-footer">

                                                <a href="{{route('student.delete', ['id'=>$student->id])}}" button class="btn btn-delete">
                                                    <span class="mdi mdi-delete mdi-18px"></span>
                                                    <span>Delete</span>
                                                    </button>

                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
                @else
                <h3>No Student Data Found</h3>
                @endif
                
                {{-- Pagination --}}

                <div class="d-flex justify-content-center">
                    {!! $students->links() !!}
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>