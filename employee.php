<?php include 'base.php' ?>

<?php
  if(isset($_POST['submit'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $area = $_POST['area'];

    $employee->addEmployee($fname, $lname, $area);
  }
?>

<?php startblock('header') ?>
  <h1>Employees <small>Control panel</small> <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modal-add-employee">Add Employee</button></h1>
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
  	<div class="modal fade" id="modal-add-employee">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Employee</h4>
              </div>
              <form class="form-horizontal" method="POST">
	              <div class="modal-body">
	                	<div class="form-group">
	                		<label for="firstname" class="col-sm-3 control-label">
	                			First Name
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="text" class="form-control" name="firstname" placeholder="First Name">
	                  		</div>
	                	</div>
	                	<div class="form-group">
	                		<label for="lastname" class="col-sm-3 control-label">
	                			Last Name
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="text" class="form-control" name="lastname" placeholder="Last Name">
	                  		</div>
	                	</div>
	                	<div class="form-group">
	                		<label for="area" class="col-sm-3 control-label">
	                			Area
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="text" class="form-control" name="area" placeholder="Area">
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
              <h3 class="box-title">Employees List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <div class="row">
              	<div class="col-sm-12">
                    <table id="dynamic-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Area</th>
                            <th>Action</th>
                        </tr>
                    </thead>
		                <tbody>
                      <?php
              					foreach ($employee->viewAllEmployees() as $user) {
                      ?>
                          <tr>
                            <td class="sorting_1"><?php echo $user['lastName'].', '.$user['firstName'] ?></td>
                            <td><?php echo $user['area'] ?></td>
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
                            <th>Area</th>
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
