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
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($data['artist']) ?> Artist</div>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($data['lyrics']) ?> Lyrics</div>
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
        <th class="py-3 text-center" scope="col">Lyrics Title</th>
        <th class="py-3 text-center" scope="col">Artist</th>
        <th class="py-3 text-center" scope="col">Upload Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['history'] as $key => $history) : ?>
            <tr class="text-center">
                <th scope="col"><?= $key+1 ?></th>
                <td><?= $history['lyrics_title'] ?></td>
                <td><?= $history['genre_name'] ?></td>
                <td><?= date('d F Y', strtotime($history['date_upload'])) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>

</div>