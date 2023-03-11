<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= url('auth/logout') ?>" method="post" >
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure want to <span class="text-danger fw-bold">Log Out</span> ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Log Out</button>
        </div>
      </form>
    </div>
  </div>
</div>

<footer class="container">
    <div class="d-flex justify-content-between">
        <div class="left-footer">
            <a href="" class="d-flex align-items-center">
                <i class='bx bxl-xing bx-flip-vertical me-2' ></i> Scxlyrics
            </a>
        </div>
        <div class="right-footer d-flex">
            <a href="#" class="mx-1"><i class='bx bxl-facebook' ></i></a>
            <a href="#" class="mx-1"><i class='bx bxl-instagram' ></i></a>
            <a href="#" class="mx-1"><i class='bx bxl-github' ></i></a>
            <a href="#" class="mx-1"><i class='bx bxl-twitter' ></i></a>
        </div>
    </div>
    <div class="bottom-footer">
        <p>&#169; Scxlyrics All Right Reserved.</p>
    </div>
</footer>