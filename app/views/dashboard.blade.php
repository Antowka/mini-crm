@include('header')
<div class="angular-wrap" ng-app="userApp" ng-init="layout='home'">
	<nav class="navbar-default" role="navigation">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand main_page" href="#" ng-click="layout='home'">Home Accounting</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      
	      <ul class="nav navbar-nav">
	        <li ng-click="layout='Tasks'"><a href="#" ng-controller="tasksController" ng-click="updateTasksList()">Tasks</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#" ng-click="layout='new-client'">Clients</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	            <li class="divider"></li>
	            <li><a href="#">One more separated link</a></li>
	          </ul>
	        </li>
	      </ul>
	      
	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form>

	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$user->name}} <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#" class="edit_profile" ng-click="layout='edit_profile'">Edit Profile</a></li>
	            <li><a href="#" class="payments" ng-click="layout='payments'">Payments</a></li>
	            <li class="divider"></li>
	            <li><a href="{{URL::to('logout')}}">Logout</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		<!-- Home Page -->
		<div ng-show="layout=='home'" class="col-md-8 col-md-offset-2">
			<h2>Accounting System</h2>
			
			<table ng-table class="table">
				<tr ng-repeat="task in tasks">
					<td data-title="'#'"><%task.id%></td>
			        <td data-title="'Date'"><%task.date%></td>
			        <td data-title="'Type'"><%task.type%></td>
			        <td data-title="'Description'"><%task.description%></td>
			        <td data-title="'Amount'"><%task.amount%></td>
			    </tr>
			</table>

		</div>

		<!-- Add Task -->
		<div  ng-controller="tasksController" ng-show="layout=='Tasks'" class="col-md-8 col-md-offset-2">
			<h2>New Task</h2>
			<form ng-submit="addTask()">
				
				<div class="company-fields" ng-controller="companyController">
					<div class="form-group">
						<select name="company">
							<option ng-repeat="company in companies" value="<%company.id%>"><%company.name%></option>
						</select>
					</div>

					<div class="form-group">
						<select name="ourdeps">
							<option ng-repeat="ourdep in ourdeps" value="<%ourdep.id%>"><%ourdep.name%></option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<input type="text" class="form-control input-sm" name="worker_name" placeholder="New Worker">
				</div>

				<div class="form-group">
					<textarea class="form-control input-sm" name="task_description" placeholder="Description"></textarea>
				</div>
				
				<div class="form-group text-right">	
					<button type="submit" class="btn btn-primary btn-lg">Submit</button>
				</div>

			</form>


			<hr>
			
			<h3>Tasks List</h3>
			<p><strong>Page:</strong> <%tableParams.page()%></p>
        	<p><strong>Count per page:</strong> <%tableParams.count()%></p>
			<table ng-table="tableParams" class="table">
				<tr ng-repeat="task in $data">
					<td data-title="'#'"><%task.id%></td>
			        <td data-title="'Name'"><%task.name%></td>
			        <td data-title="'Description'"><%task.description%></td>
			        <td data-title="'Close'"><span class="glyphicon glyphicon-remove-circle" ng-click="removeCompany(task.id);"></span></td>
			    </tr>
			</table>


			<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>
		</div>

		<!-- Edit Profile -->
		<div ng-show="layout=='edit_profile'" class="col-md-8 col-md-offset-2">
			<h2>Edit profile</h2>
			<form ng-submit="saveUser()">
				<div class="form-group">
					<input type="text" class="form-control input-sm" name="name" ng-model="user.name" placeholder="Name">
				</div>

				<div class="form-group">
					<input type="password" class="form-control input-sm" name="new_password" ng-model="user.new_password" placeholder="New password">
				</div>

				<div class="form-group">
					<input type="password" class="form-control input-sm" name="confirm_password" ng-model="user.confirm_password" placeholder="Confirm password">
				</div>

					<div class="form-group text-right">	
					<button type="submit" class="btn btn-primary btn-lg">Submit</button>
				</div>
			</form>
			<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>
		</div>
		
		<!-- Add Client -->
		<div ng-show="layout=='new-client'" class="col-md-8 col-md-offset-2"  ng-controller="userController">
				
			<h2>New Client</h2>
			<form ng-submit="addClient()">
				<div class="company-fields">
					
					<div class="alert-wrp" ng-repeat="alert in alerts">
						<div class="alert alert-<%alert.type%>">
							<button type="button" class="close" ng-click="closeAlert($index)">
							   <span aria-hidden="true">×</span>
							   <span class="sr-only">Close</span>
							</button>
							<%alert.msg%>
						</div>
					</div>
					
					<span>Company Client</span>
					<div class="form-group">
						<input ng-model="client.new_company" type="text" class="form-control input-sm"  name="new_company" placeholder="Company" required>
					</div>
					
					<div class="form-group">
						<textarea ng-model="client.new_company_description" class="form-control input-sm"  name="new_company_description" placeholder="Company"></textarea>
					</div>
					
					<hr>
					
					<span>Contact Person</span>
					<div class="form-group">
						<input ng-model="client.new_user_name" type="text" class="form-control input-sm" name="new_user_name" placeholder="First Name" required>
					</div>
					
					<div class="form-group">
						<input ng-blur="checkEmail()" ng-model="client.new_user_email" ang-unique-email type="email" class="form-control input-sm" name="new_user_email" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input ng-model="client.new_user_pass" type="password" class="form-control input-sm" name="new_user_pass" placeholder="Password" required>
					</div>
					
				</div>
				
				<div class="form-group text-right">	
					<button type="submit" class="btn btn-primary btn-lg">Submit</button>
				</div>

			</form>
			
			<hr>
			
			<h3>Clients List</h3>
			<p><strong>Page:</strong> <%tableParams.page()%></p>
        	<p><strong>Count per page:</strong> <%tableParams.count()%></p>
			<table ng-table="tableParams" class="table" ng-controller="companyController">
				<tr ng-repeat="company in $data">
					<td data-title="'#'"><%company.id%></td>
			        <td data-title="'Name'"><%company.name%></td>
			        <td data-title="'Email'"><%company.email%></td>
			        <td data-title="'Description'"><%company.description%></td>
			        <td data-title="'Close'"><span class="glyphicon glyphicon-remove-circle" ng-click="removeCompany(company.id);"></span></td>
			    </tr>
			</table>
			
		</div>

		<!-- Edit Payment -->
		<div ng-show="layout=='payments'" class="grid col-md-8 col-md-offset-2">
			<h2>Transaction</h2>
		</div>

	</div>

</div>

@include('footer')