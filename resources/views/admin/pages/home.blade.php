@extends('admin.layouts.app')

@section('content')

 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $leads }}</h3>

                <p>Leads</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href={{ route('admin.leads')}} class="small-box-footer">Daha çox <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $testscore }}</h3>

                <p>Test Nəticələri</p>
            </div>
            <div class="icon">
                <i class="fas fa-book-open"></i>
            </div>
            <a href={{ route('admin.testscore')}} class="small-box-footer">Daha çox <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $admin }}</h3>

                <p>İdarəçilər</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-tie"></i>
            </div>
            <a href={{ route('admin.index')}} class="small-box-footer">Daha çox <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $courses }}</h3>

                <p>Kurslar</p>
            </div>
            <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <a href={{ route('admin.courses')}} class="small-box-footer">Daha çox <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

      </div>
    </div>
</section>
@endsection
