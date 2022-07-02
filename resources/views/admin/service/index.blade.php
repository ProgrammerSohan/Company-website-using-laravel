
@extends('admin.admin_master')

@section('admin')


    <div class="py-12">

        <div class="container">
            <div class="row">

          <h2>Services Part</h2>
   <a href="{{ route('add.service') }}"> <button class="btn btn-info">Add Service</button></a>
   <br><br>

          <div class="col-md-12">
        <div class="card">

            @if (session('success'))
            <strong class="alert-success">{{ session('success') }} </strong>

            @endif


        <div class="card-header">All Service Data </div>




                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" width="5%">SL No</th>
                        <th scope="col" width="15%">Image</th>
                        <th scope="col" width="15%">Title</th>
                        <th scope="col" width="65%">Description</th>
                        <th scope="col" width="25%">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php($i= 1)
                        @foreach ($services as $service )

                      <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td><img class="img-fluid" src="{{ asset($service->image) }}" style="height: 40px; width:70px;" alt=""></td>
                        <td>{{ $service->title }}</td>
                        <td>{{ $service->description }}</td>

                    <td>
          <a href="{{ url('service/edit/'.$service->id) }}" class="btn btn-info">Edit</a>
  <a href="{{ url('service/delete/'.$service->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>

                    </td>

                      </tr>

                      @endforeach

                    </tbody>
                  </table>


                  {{ $services->links() }}
                </div>

            </div>


        </div>



            </div>

        </div>


    </div>

@endsection
