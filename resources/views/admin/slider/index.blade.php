@extends('admin.admin_master')

@section('admin')


    <div class="py-12">

        <div class="container">
            <div class="row">

          <h2>Home Slider</h2>
   <a href="{{ route('add.slider') }}"> <button class="btn btn-info">Add Slider</button></a>
   <br><br>

          <div class="col-md-12">
        <div class="card">

            @if (session('success'))
            <strong class="alert-success">{{ session('success') }}</strong>

            @endif

        <div class="card-header">All Slider </div>




                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" width="5%">SL No</th>
                        <th scope="col" width="15%">Slider Title</th>
                        <th scope="col" width="65%">Description</th>
                        <th scope="col" width="15%">Image</th>
                        <th scope="col" width="25%">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                         @php($i = 1)
                        @foreach ($sliders as $slider )
                      <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->description }}</td>
                        <td> <img class="img-fluid" src="{{ asset($slider->image) }}" style="height: 40px; width:70px;" alt=""></td>
                        <td>

                    </td>
                    <td>
          <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-info">Edit</a>
  <a href="{{ url('slider/delete/'.$slider->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>

                    </td>

                      </tr>

                      @endforeach

                    </tbody>
                  </table>


                </div>

            </div>


        </div>



            </div>

        </div>


    </div>

@endsection


