<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        h3 {
            text-align: center;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <h3>Search Results</h3>

    <div class="container">
        <div class="row">
            <div class="col=10">
                <form action="{{route('member.search')}}" method="post">
                    @csrf

                    <div class="input-group">
                        <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
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
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach($results as $result)

                            <tr>
                                <td scope="row"> {{$loop->index}}</td>
                                <td>{{$result->name}}</td>
                                <td>{{$result->number}}</td>
                                <td>{{$result->gender}}</td>
                                <td> <img src="uploads/{{$result->image}}" style="width:100px;height:60px;"> </td>


                            </tr>

                        @endforeach

                    </tbody>
                </table>

            </div>

        </div>

    </div>

</body>

</html>