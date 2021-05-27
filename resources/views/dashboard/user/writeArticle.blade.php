@extends('../temp.user')

@section('PageTitle', 'Write Article')

@section('PageContent')
<!-- post -->
<section id="post">
    <div class="row">
        <div class="col-md-8">
            <a onclick="window.history.back();" class="btn btn-secondary"><i class="bi bi-caret-left-fill"></i> Back</a>
            <!-- post list -->
            <section id="post-list" class="pt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <form action="">
                                        <div class="mb-3">
                                            <input class="form-control" type="file" id="formFile" name="inPict" id="inPict">
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title :</label>
                                            <input type="text" class="form-control" id="title" name="title" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label for="desc" class="form-label">Description :</label>
                                            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- User Profile -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="align-items-center">
                        <div class="avatar avatar-jumbo my-auto">
                            <img src="{{ url('assets/images/faces/1.jpg') }}" alt="Face 1">
                        </div>
                        <div class="mt-3 name">
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