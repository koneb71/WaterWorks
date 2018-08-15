<?php include 'base.php' ?>

<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $rateValue = $_POST['rate'];

    $rate->addRate($name, $rateValue);
}
?>

<?php startblock('header') ?>
<h1>Billing Rates <small>Control panel</small> <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modal-add-rate">Add Bill Rate</button></h1>
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
<div class="modal fade" id="modal-add-rate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Bill Rate</h4>
            </div>
            <form class="form-horizontal" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">
                            Name
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate" class="col-sm-3 control-label">
                            Rate
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="rate" placeholder="Rate Value">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php endblock() ?>

<?php startblock('content') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Billing Rate List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="row">
            <div class="col-sm-12">
                <table id="dynamic-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Rate</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($rate->viewAllRates() as $data) {
                        ?>
                        <tr>
                            <td><?php echo $data['name'] ?></td>
                            <td><?php echo $data['rate'] ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Update</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Rate</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<?php endblock() ?>
