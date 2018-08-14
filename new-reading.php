<?php include 'base.php' ?>

<?php startblock('header') ?>

<h1>Meter Collection</h1>

<?php
    if(isset($_POST['submit'])){
        $client_id = $_POST['client'];
        $accountant_id = $_SESSION['user_id'];
        $employee_id = $_POST['employee'];
        $water_usage = $_POST['waterUsage'];

        $meter->newReading($accountant_id, $client_id, $employee_id, $water_usage);
    }
?>


<?php endblock() ?>

<?php startblock('content') ?>
<div class="col-md-7">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">New Reading</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form class="form-horizontal" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="client" class="col-sm-3 control-label">
                            Client
                        </label>
                        <div class="col-sm-9">
                            <select class="selectClient form-control" name="client">
                                <?php
                                    foreach ($client->viewAllClient() as $user){
                                ?>
                                        <option value="<?php $user['id'] ?>"> <?php echo $user['lastName'].', '.$user['firstName'].' '.$user['middleInitial'].',' ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="client" class="col-sm-3 control-label">
                            Employee
                        </label>
                        <div class="col-sm-9">
                            <select class="selectClient form-control" name="employee">
                                <?php
                                    foreach ($employee->viewAllEmployees() as $user){
                                ?>
                                        <option value="<?php $user['id'] ?>"> <?php echo $user['lastName'].', '.$user['firstName']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="waterUsage" class="col-sm-3 control-label">
                            Water Usage
                        </label>
                        <div class="col-sm-9">
                            <input type="Number" class="form-control" name="waterUsage" placeholder="Water Usage">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<div class="col-md-5"></div>
<?php endblock() ?>
