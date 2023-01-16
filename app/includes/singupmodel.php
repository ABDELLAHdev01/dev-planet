<div class="modal fade" id="modelsignup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bgnav">
          <h1 class="modal-title fs-5" id="exampleModalLabel">SIGN UP </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bgnav">
        <div class="w-75 d-flex m-auto">
                <form action="./app/controllers/admin-controller.php" method="POST" class="m-auto  d-flex flex-column justify-content-center w-100">
                    <label for="signUpEmail"><b>Full name :  </b></label>
                    <input type="text" name="signUpName" placeholder="Enter your full name : ">
                    <label for="signUpEmail"><b>Email :  </b></label>
                    <input type="email" name="signUpEmail" placeholder="Enter your email : ">
                    <label for="signUpPassword"><b>Password : </b></label>
                    <input type="password" name="signUpPassword" placeholder="Enter your password : ">
                    <label for="signUprePassword"><b>Repeat password : </b></label>
                    <input type="password" name="signUprePassword" placeholder="Enter your password : ">
               
        </div>

        </div>
        <div class="modal-footer bgnav">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
          <button name="signUp"  type="submit" class="btn btn-warning">SIGN UP</button>
          </form>
        </div>
      </div>
    </div>
  </div>