@extends('../temp.admin')

@section('PageTitle', 'Data - Articles Table')

@section('PageContent')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>TITLE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sky : Children Of The Light</td>
                                        <td class="text-bold-500">
                                            <a type="button" class="btn btn-primary"><i class="bi bi-eye-fill"></i> View</a>
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