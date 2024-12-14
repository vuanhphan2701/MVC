<?php
$user = new userController();
echo $user->getError('alert2')
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title"> add user <?php ?></div>
        </div>

        <form method="POST" action="<?php echo href('user', 'addNewUser') ?>" style="width: 66%; margin: 0 auto;" enctype="multipart/form-data">

           
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User_Name</label>
                <input type="text" class="form-control" id="" aria-describedby="emailHelp" value="" name="user_name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" id="" aria-describedby="emailHelp" value="" name="password">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" id="" aria-describedby="emailHelp" value="" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">phone</label>
                <input type="text" class="form-control" id="phone" value="" name="phone">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" value="" name="email">
            </div>
            <div class="form-group mt-4 ">
                <label for="">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="gender" type="radio" <?php //echo $user->gender == 1 ? 'checked' : '' ?> value="1" />man
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="gender" type="radio" <?php // $user->gender == 0 ? 'checked' : '' ?> value="0" />woman
                </div>
            </div>
            <div>
                <label for="formFile" class="form-label mt-4">Figure</label>
                <input class="form-control" name="avt" type="file" id="formFile">
            </div>
 
            <div class="form-group mt-4">
                <label for="" class="form-label">Status</label>
                <select class="form-select form-select" name="status" id="">
                    <option value="">---choose s tatus----</option>
                    <option <?php //$user->status == 1 ? 'selected' : '' 
                            ?> value="1">Active</option>
                    <option <?php // $user->status == 2 ? 'selected' : '' 
                            ?> value="2">Block</option>

                </select>
            </div>
        <br>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Created_at</label>
                <input type="datetime-local" class="form-control" id="exampleInputPassword1" value="" name="created_at">
            </div>
            <br>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Updated_at</label>
                <input type="datetime-local" class="form-control" id="exampleInputPassword1" value="" name="updated_at">
            </div>



            <button type="submit" class="btn btn-success">Submit</button>
            <a
                name=""
                id=""
                class="btn btn-primary"
                href="<?php echo href('user','getAllUsers')?>"
                role="button">back</a>

        </form>
    </div>
</div>