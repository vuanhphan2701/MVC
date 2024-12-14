<?php
defined('BASE') or exit('access deny');
?>
<?php
$user = new userController();
echo $user->getError('alert')
?>

<div class="text-start">
    <a name="" class="btn btn-dark" role="button" href="<?php echo href('user', 'getAllUsers'); ?>"><i class="fas fa-arrow-left"></i></a>
</div>
<div class="col-md-12">
    <div class="card">

        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Figure</th>
                        <th>UserName</th>
                        <th>Genger</th>
                        <th>FullName</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Task</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($list as $item) {
                    ?>
                        <tr>
                            <td scope="row"> <img src='<?= $item->getImage() ? $item->getImage() : 'public/images/noimg.jpg' ?>' width="70px" class='img-fluid rounded-top' /></td>
                            <td><?= $item->getUsername() ?></td>
                            <td><img src="./public/images/<?= $item->getGender() ?>.jpg" width="40px" class='img-fluid rounded-top'> </td>
                            <td><?= $item->getName() ?></td>
                            <td><?= $item->getPhone() ?></td>
                            <td><?= $item->getEmail() ?></td>
                            <td>
                                <?php
                                echo  $item->getStatus() == 1 ? '<span class="badge bg-success">active</span>' : '<span class="badge bg-dark">inactive</span>'
                                ?>

                            </td>
                            <td>
                                <a name="" class="btn btn-primary" role="button" href="<?php echo href('user', 'retrieveDeletedUsers') ?>&id=<?php echo $item->getId() ?>"><i class="fas fa-undo restore-icon"></i>
                                </a>
                                <a class="btn btn-danger" role="button" href="<?php echo href('user', 'removeUserPermanently') ?>&id=<?php echo $item->getId() ?>"><i class="fa fa-trash search-icon"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

        </div>
    </div>
</div>