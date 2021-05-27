@extends('../temp.admin')

@section('PageTitle', 'Account - Admin Table')

@section('PageContent')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ url('dashboard/create/admin') }}" class="btn btn-primary mb-4"><i class="bi bi-plus"></i> Create Admin</a>
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>E-MAIL</th>
                                        <th>GENDER</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sky : Children Of The Light</td>
                                        <td class="text-bold-500">Michael Right</td>
                                        <td class="text-bold-500">Michael Right</td>
                                        <td class="text-bold-500">
                                            <a type="button" class="btn btn-primary"><i class="bi bi-eye-fill"></i> View</a>
                                            <a type="button" class="btn btn-warning"><i class="bi bi-pen-fill"></i> Edit</a>
                                            <a type="button" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection