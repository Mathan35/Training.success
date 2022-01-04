@extends('layouts.admin.side-menu')
 @section('content')
 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Course Learnings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">View Learnings</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-10">
          <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales">
                <div class="card-body">  

                  <!-- Messages -->
                  <x-Message-component/>

                  <h5 class="card-title">View Learnings</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Course</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($Learning as $item)
                        <tr>
                            <th>{{$item->id}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->course->name}}</td>
                            <td class="d-flex">
                                <div class="p-1">
                                    <a class=" btn btn-outline-success btn-sm" href="{{route('learning.edit',$item->id)}}"> <i class="bi bi-pencil-fill"></i></a>
                                </div>

                                <div class="p-1">
                                <form id="delete-form" class="" method="POST" action="{{route('learning.destroy', $item->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <div class="form-group">
                                        <button class="btn btn-outline-danger btn-sm " type="submit"><i class="bi bi-trash-fill"></i></button>
                                    </div>
                                </form>
                            </div>

                            </td>
                        </tr>
                      @endforeach


                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->


@endsection