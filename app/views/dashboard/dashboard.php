<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2" style="border-left: 4px solid #0d6efd;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="fs-6 fw-bold text-primary text-uppercase mb-1">
                            User Registration</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($data['user']) ?> User</div>
                    </div>
                    <div class="col-auto">
                        <i class='bx bxs-user text-gray-300 fs-1 mt-2' style='color:#777777'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2" style="border-left: 4px solid #198754;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="fs-6 fw-bold text-primary text-uppercase mb-1">
                            Admin</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($data['admin']) ?> Admin</div>
                    </div>
                    <div class="col-auto">
                        <i class='bx bxs-user-pin text-gray-300 fs-1 mt-2' style='color:#777777'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2" style="border-left: 4px solid #fd7e14;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="fs-6 fw-bold text-primary text-uppercase mb-1">
                        Artist Data</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($data['user']) ?> Data</div>
                    </div>
                    <div class="col-auto">
                        <i class='bx bxs-user-badge text-gray-300 fs-1 mt-2'  style='color:#777777'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2" style="border-left: 4px solid #dc3545;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="fs-6 fw-bold text-primary text-uppercase mb-1">
                            Lyrics Data</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($data['user']) ?> User</div>
                    </div>
                    <div class="col-auto">
                        <i class='bx bxs-add-to-queue text-gray-300 fs-1 mt-2' style='color:#777777'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="mt-5">

    <div class="shadow data-header bg-light border-bottom mb-2 py-3 px-4 d-flex justify-content-between align-items-center">
        <div class="head-title">History</div>
    </div>

    <table class="shadow-lg table table-striped table-light" id="dataTable">
    <thead>
        <tr class="text-center">
        <th class="py-3 text-center" scope="col">No</th>
        <th class="py-3 text-center" scope="col">Nama</th>
        <th class="py-3 text-center" scope="col">Description</th>
        <th class="py-3 text-center" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr class="text-center">
            <th scope="col">1</th>
            <td>Action</td>
            <td>Lorem, ipsum dolor sit am</td>
            <td>
                <a href="" class="btn btn-warning text-white"><i class='bx bx-edit'></i></a>
                <a href="" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#deleteAdminModal"><i class='bx bxs-trash-alt'></i></a>
            </td>
        </tr>
    </tbody>
    </table>

</div>