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
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-6">
                    <div class="dataTables_length" id="example1_length">
                        <label>Show
                            <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries
                        </label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="example1_filter" class="dataTables_filter pull-right" style="padding-right: 60px">
                        <label>Search:   <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th>
                                Accountant
                            </th>
                            <th>
                                Client
                            </th>
                            <th>
                                Employee
                            </th>
                            <th>
                                Water Usage
                            </th>
                            <th>
                                Created Date
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($meter->viewAllMeterReading() as $reading) {
                            ?>
                            <?php echo $reading[0] ?>
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
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">	<ul class="pagination">
                            <li class="paginate_button previous disabled" id="example1_previous">
                                <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">		Previous
                                </a>
                            </li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
    </div>
    <!-- /.box-body -->
</div>
<?php endblock() ?>
