<?php include 'base.php' ?>

<?php startblock('header') ?>

<h1>Meter Collection <small>Control panel</small> <a href="new-reading.php" class="btn btn-sm btn-primary pull-right">New Reading</a></h1>
<?php
if(isset($_GET['success'])) {
    ?>
    <br/>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        Added to the Database
    </div>
<?php } ?>

<?php endblock() ?>

<?php startblock('content') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Transaction List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                        <table id="dynamic-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Accountant</th>
                            <th>Client</th>
                            <th>Employee</th>
                            <th>Water Usage</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php
                        foreach ($meter->viewAllMeterReading() as $reading) {
                            ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1"><?php echo $reading[2].', '.$reading[4].' '.$reading[3].',' ?></td>
                                <td><?php echo $reading[5].', '.$reading[7].' '.$reading[6].',' ?></td>
                                <td><?php echo $reading[9].', '.$reading[8] ?></td>
                                <td><?php echo $reading[1] ?></td>
                                <td><?php echo $reading[0] ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning">Update</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>


                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Accountant</th>
                            <th>Client</th>
                            <th>Employee</th>
                            <th>Water Usage</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    </table>
                </div>
            </div>
            
    </div>
    <!-- /.box-body -->
</div>
<?php endblock() ?>
