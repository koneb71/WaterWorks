<?php include 'base.php' ?>

<?php
  if(isset($_POST['submit'])){
    $meterSerial = $_POST['meterSerialNumber'];
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $mInitial = $_POST['middleInitial'];
    $mobileNum = $_POST['mobileNumber'];
    $rateClass = $_POST['rateClass'];
    $businessArea = $_POST['businessArea'];
    $streetAdd = $_POST['streetAddress'];
    $city = $_POST['city'];
    $postal = $_POST['postalCode'];


    $client->addClient($meterSerial, $firstname, $lastname, $mInitial, $mobileNum, $rateClass, $businessArea, $streetAdd, $city, $postal);
  }
?>

<?php startblock('header') ?>
  <h1>Client <small>Control panel</small> <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modal-add-client">Add Client</button></h1>
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
  	<div class="modal fade" id="modal-add-client">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Client</h4>
              </div>
              <form class="form-horizontal" method="POST">
	              <div class="modal-body">
	                	<div class="form-group">
	                		<label for="meterSerialNumber" class="col-sm-3 control-label">
	                			Meter Serial Number
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="text" class="form-control" name="meterSerialNumber" placeholder="Meter Serial Number">
	                  		</div>
	                	</div>
	                	<div class="form-group">
	                		<label for="firstName" class="col-sm-3 control-label">
	                			First Name
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="text" class="form-control" name="firstName" placeholder="First Name">
	                  		</div>
	                	</div>
	                	<div class="form-group">
	                		<label for="lastName" class="col-sm-3 control-label">
	                			Last Name
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="text" class="form-control" name="lastName" placeholder="Last Name">
	                  		</div>
	                	</div>
	                	<div class="form-group">
	                		<label for="middleInitial" class="col-sm-3 control-label">
	                			Middle Initial
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="text" class="form-control" name="middleInitial" placeholder="Middle Initial">
	                  		</div>
	                	</div>
	                	<div class="form-group">
	                		<label for="mobileNumber" class="col-sm-3 control-label">
	                			Mobile Number
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="number" class="form-control" name="mobileNumber" placeholder="Mobile Number">
	                  		</div>
	                	</div>
	                	<div class="form-group">
	                		<label for="rateClass" class="col-sm-3 control-label">
	                			Residential
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="text" class="form-control" name="rateClass" placeholder="Residential">
	                  		</div>
	                	</div>
	                	<div class="form-group">
	                		<label for="businessArea" class="col-sm-3 control-label">
	                			Barangay Area
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="text" class="form-control" name="businessArea" placeholder="Barangay Area">
	                  		</div>
	                	</div>
	                	<div class="form-group">
	                		<label for="streetAddress" class="col-sm-3 control-label">
	                			Street Address
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="text" class="form-control" name="streetAddress" placeholder="Street Address">
	                  		</div>
	                	</div>
	                	<div class="form-group">
	                		<label for="city" class="col-sm-3 control-label">
	                			City
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="text" class="form-control" name="city" placeholder="City">
	                  		</div>
	                	</div>
	                	<div class="form-group">
	                		<label for="postalCode" class="col-sm-3 control-label">
	                			Postal Code
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="number" class="form-control" name="postalCode" placeholder="Postal Code">
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
              <h3 class="box-title">Client List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-sm-12">

                    <table id="dynamic-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Account Number</th>
                            <th>Meter Serial</th>
                            <th>Name</th>
                            <th>Mobile Number</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        foreach ($client->viewAllClient() as $clients) {
                      ?>
                          <tr role="row" class="odd">
                            <td class="sorting_1"><?php echo $clients['accountNumber']?></td>
              				      <td><?php echo $clients['meterSerialNumber'] ?></td>
                			      <td><?php echo $clients['lastName'].', '.$clients['firstName'].', '.$clients['middleInitial'] ?></td>
                            <td><?php echo $clients['mobileNumber'] ?></td>
             				        <td><?php echo $clients['postalCode'].', '.$clients['streetAddress'].', '.$clients['businessArea'].', '.$clients['city'] ?></td>
                            <td>
                              <a href="#" class="btn btn-sm btn-warning">Update</a>
                              <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                          </tr>
                      <?php } ?>



                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Account Number</th>
                            <th>Meter Serial</th>
                            <th>Name</th>
                            <th>Mobile Number</th>
                            <th>Address</th>
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
