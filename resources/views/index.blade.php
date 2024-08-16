<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Contact Management</title>
  </head>
  <body>

    <div class="container">
      <div class="row mt-5">
        <div class="col-lg-12 p-3">
          <div class="card">
            <div class="card-header">
                <a href="{{route('contacts.create')}}" class="btn btn-primary">Create</a>
                <a class="btn btn-primary" href="{{ route('contacts.index', ['sort' => 'name']) }}">Name</a>
                <a class="btn btn-primary" href="{{ route('contacts.index', ['sort' => 'created_at']) }}">Date</a>
             <div class="float-right">
                <form method="GET" action="{{ route('contacts.index') }}" class="form-inline mb-3">
                    <input type="text" name="search" class="form-control mr-sm-2" placeholder="Search" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
             </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                          </tr>

                    </thead>
                    <tbody>
                        @if (isset($contacts) && $contacts)
                        @foreach ($contacts as $contact)
                      <tr>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>{{$contact->address}}</td>
                        <td>
                            <div>
                                <a class="btn btn-primary btn-sm" href="{{route('contacts.edit',$contact->id)}}">Edit</a>
                                <a class="btn btn-info btn-sm" href="{{route('contacts.show',$contact->id)}}">Show</a>
                                <a class="btn btn-danger btn-sm" href="{{route('contacts.destroy',$contact->id)}}">Delete</a>

                            </div>
                        </td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
            </div>
          </div>
        </div>
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


  </body>
</html>
