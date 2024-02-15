<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<div class="container">
        <div class="row">
            <div class="col=10">

                <form action="{{route('member.store')}}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="member_name" class="form-label">Member Name</label>
                        <input placeholder="Enter name" name="member_name" type="text" required class="form-control" id="member_name" value="{{old('member_name')}}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input placeholder="Enter Email" name="email" type="text" required class="form-control" id="email" value="{{old('email')}}">
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input placeholder="Enter Phone Number" name="phone_number" type="text" required class="form-control" id="phone_number" value="{{old('phone_number')}}">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Enter Address</label>
                        <textarea placeholder="Write Address" class="form-control" name="address" id="address" cols="30" rows="6">{{old("address")}}</textarea>
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
                    <th scope="col">Member Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($house_members as $member)
                    <tr>
                            <th scope="row">{{$loop->index}}</th>
                            <td>{{$member->member_name}}</td>
                            <td>{{$member->email}}</td>
                            <td>{{$member->phone_number}}</td>
                            <td>{{$member->address}}</td>
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
</body>

</html>