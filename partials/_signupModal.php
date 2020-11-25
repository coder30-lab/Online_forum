<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign Up for iDiscuss Forum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                .
                <form action="partials/_handleSignup.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
                        <!-- <input type="email" class="form-control" id="emailSignup" name="emailSignup"
                            aria-describedby="emailHelp"> -->

                        <input type="text" class="form-control" id="emailSignup" name="emailSignup"
                            aria-describedby="emailHelp">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" name="signuppass">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Confirm Password</label>
                        <input type="password" class="form-control" id="signupcpass" name="signupcpass">
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">SignUp</button>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>