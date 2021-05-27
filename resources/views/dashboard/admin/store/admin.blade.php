@extends('../temp.admin')

@section('PageTitle', 'Account - Admin Table - Create Admin')

@section('PageContent')
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <a onclick="window.history.back();" class="btn btn-secondary"><i class="bi bi-caret-left-fill"></i> Back</a>
                <!-- post list -->
                <section id="post-list" class="pt-5">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body py-4 px-5">
                                    <div class="align-items-center">
                                        <div class="avatar avatar-jumbo my-auto rv">
                                            <img src="{{ url('assets/images/faces/1.jpg') }}" alt="Face 1">
                                            <div class="ab">

                                            </div>
                                            <div class="ab edit-profile ">
                                                <i class="bi bi-pen-fill"></i>
                                            </div>
                                        </div>
                                        <div class="mt-3 m-3 name">
                                            <h5 class="font-bold">John Duck</h5>
                                            <h6 class="text-muted mb-0">@johnducky</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <form class="p-2">
                                        <h2 class="py-3">
                                            Form Create Admin
                                        </h2>
                                        <div class="form-group p-2">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleInputPassword1">Name</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleInputPassword1">Job / Education</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleInputPassword1">Gender</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <button type="submit" class="btn btn-warning m-2">Change</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- User Profile -->
        </div>
    </div>
</section>
@endsection