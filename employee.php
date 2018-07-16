<?php include 'base.php' ?>

<?php startblock('header') ?>
  <h1>Employee <small>Control panel</small> <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modal-add-employee">Add Employee</button></h1>

  	<div class="modal fade" id="modal-add-employee">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Employee</h4>
              </div>
              <form class="form-horizontal">
	              <div class="modal-body">
	                	<div class="form-group">
	                		<label for="firstname" class="col-sm-3 control-label">
	                			First Name
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="text" class="form-control" id="firstname" placeholder="First Name">
	                  		</div>
	                	</div>
	                	<div class="form-group">
	                		<label for="lastname" class="col-sm-3 control-label">
	                			Last Name
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="text" class="form-control" id="lastname" placeholder="Last Name">
	                  		</div>
	                	</div>
	                	<div class="form-group">
	                		<label for="area" class="col-sm-3 control-label">
	                			Area
	                		</label>
	                		<div class="col-sm-9">
	                    		<input type="text" class="form-control" id="area" placeholder="Area">
	                  		</div>
	                	</div>
	                </form>
	              </div>
	              <div class="modal-footer">
	                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
	                <button type="button" class="btn btn-primary">Save</button>
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
		                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
		                		Name
		                	</th>
		                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
		                		Area
		                	</th>
	               		</tr>
	                	</thead>
		                <tbody>
			                <tr role="row" class="odd">
			                  <td class="sorting_1">Gecko</td>
			                  <td>Firefox 1.0</td>
			                  <td>
			                  	<a href="#" class="btn btn-sm btn-warning">Update</a>
			                  	<a href="#" class="btn btn-sm btn-danger">Delete</a>
			                  </td>
			                </tr>
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
