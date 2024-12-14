<!-- content -->
<?php 
$alert= new userController();
echo $alert->getError('alert1') ;
//seeArray($user)

foreach($users as $user) {
?>



<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title"> Edit user <?= $user->getUsername() ?></div>
        </div>
        <form method="POST" action="<?php echo href('user', 'save') ?>" style="width: 66%; margin: 0 auto;" enctype="multipart/form-data">
       
        <div class="form-group mt-4 ">
                <label for="id">Id</label>
                <input type="text" name="user_name" id="id" class="form-control" value="<?= $user->getId()?>" readonly>
            </div>
            <div class="form-group mt-4 ">
                <label for="id">Password</label>
                <input type="text" name="password" id="password" class="form-control" value="<?= $user->getPassword() ?>" required>
            </div>
            <div class="form-group mt-4 ">
                <label for="id">Usename</label>
                <input type="text" name="user_name" id="id" class="form-control" value="<?= $user->getUsername() ?>" required>
            </div>

            <div class="form-group mt-4">
                <label for="name">Fullname</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= $user->getName() ?>">
            </div>
            <div>
                <label for="formFile" class="form-label mt-4">Figure</label>
                <img width="50" id="h_avt" src="<?= $user->getImage() ? $user->getImage() : 'public/images/noimg.jpg' ?>">
                <input class="form-control" name="avt_2" type="hidden" id="avt_2" value="<?= $user->getImage() ?>">
                <span onclick="document.getElementById('avt_2').value='';document.getElementById('h_avt').src='public/images/noimg.jpg'"><i class="bi bi-trash3-fill btn btn-danger">Delete</i></span>

                <input class="form-control" name="avt" type="file" id="formFile">
            </div>

            <div class="form-group mt-4 ">
                <label for="">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="gender" type="radio" <?= $user->getGender() == 1 ? 'checked' : '' ?> value="1" />man
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="gender" type="radio" <?= $user->getGender() == 0 ? 'checked' : '' ?> value="0" />woman
                </div>
            </div>


            <div class="form-group mt-4">
                <label for="number">phone</label>
                <input type="phone" name="phone" id="number" class="form-control" value="<?= $user->getPhone() ?>">
            </div>

            <div class="form-group mt-4">
                <label for="number">email</label>
                <input type="email" name="email" id="number" value="<?= $user->getEmail() ?>" class="form-control">
            </div>

            <div class="form-group mt-4">
                <label for="" class="form-label">Status</label>
                <select class="form-select form-select" name="status" id="">
                    <option value="">---choose s tatus----</option>
                    <option <?= $user->getStatus() == 1 ? 'selected' : '' ?> value="1">Active</option>
                    <option <?= $user->getStatus() == 2 ? 'selected' : '' ?> value="2">Block</option>

                </select>
            </div>


            <div class="form-group mt-4 mt-4 ">
                <input type="hidden" name="id" id="number" value="<?= $user->getId() ?>" class="form-control">
                <input name='button' type="submit" name="number" value="Save" id="number" class="btn btn-primary">
                <a name="" id="" class="btn btn-success" href="<?= href('user','getAllUsers') ?>" role="button">Back</a>

            </div>

        </form>
        <?php }?>
    </div>
</div>