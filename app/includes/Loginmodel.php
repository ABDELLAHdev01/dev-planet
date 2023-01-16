<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bgnav">
          <h1 class="modal-title fs-5" id="exampleModalLabel">LOGIN</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bgnav">

        <div class="w-75 d-flex m-auto">
                <form action="./app/controllers/admin-controller.php" method="POST" class="m-auto  d-flex flex-column justify-content-center w-100">
                    <label for="loginEmail"><b>Email :  </b></label>
                    <input type="email" name="loginEmail" placeholder="Enter your email : ">
                    <label for="loginPassword"><b>Password : </b></label>
                    <input type="password" name="loginPassword" placeholder="Enter your password : ">
               
        </div>


          
        </div>
        <div class="modal-footer bgnav">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
          <button name="login" type="submit" class="btn btn-warning">LOGIN</button>
          </form>
        </div>
      </div>
    </div>
  </div>