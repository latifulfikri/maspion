@extends('../temp.user')

@section('PageTitle', 'My Articles')

@section('PageContent')
<!-- post -->
<section id="post">
    <div class="row pb-4">
        <div class="col-12">
            <a href="{{ url('dashboard/write-article') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Write new article</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <!-- post list -->
            <section id="post-list" class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-head p-4">
                                <h2><b>Ini Judul</b></h2>
                            </div>
                            <div class="card-body p-4 pt-0">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio deleniti ex delectus explicabo cumque praesentium ab sint? Consectetur eum corrupti quidem, excepturi, fugiat quam reiciendis eveniet deserunt incidunt aliquam possimus.</p>
                                <div class="row">
                                    <div class="col-12">
                                        <a href="" class="btn btn-primary"><i class="bi bi-eye-fill"></i> View</a>
                                        <a href="" class="btn btn-warning"><i class="bi bi-pencil-fill"></i> Edit</a>
                                        <a href="" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- User Profile -->
        <div class="col-md-2">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="align-items-center">
                        <div class="avatar avatar-jumbo my-auto">
                            <img src="{{ url('assets/images/faces/1.jpg') }}" alt="Face 1">
                        </div>
                        <div class="mt-3 m-3 name">
                            <h5 class="font-bold">John Duck</h5>
                            <h6 class="text-muted mb-0">@johnducky</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection