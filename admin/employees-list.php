<?php
$con = mysqli_connect("localhost", "admin", "molehiya", "office ms");
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con, "SELECT * FROM employee");




mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Employees </title>

	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<link rel="stylesheet" href="assets/css/line-awesome.min.css">

	<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

	<link rel="stylesheet" href="assets/css/select2.min.css">

	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

	<link rel="stylesheet" href="assets/css/style.css">

	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

	<div class="main-wrapper">

		<div class="header">

			<div class="header-left">
				<a href="admin-dashboard-1.html" class="logo">
					<img src="assets/Img/molehiya.jpg" width="40" height="40" alt="">
				</a>
			</div>

			<a id="toggle_btn" href="javascript:void(0);">
				<span class="bar-icon">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</a>

			<div class="page-title-box">
				<h3>Molehiya</h3>
			</div>

			<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

			<ul class="nav user-menu">











				<li class="nav-item dropdown has-arrow main-drop">
					<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">

						<span class="status online"></span></span>
						<span>Admin</span>
					</a>
					<div class="dropdown-menu">

						<a class="dropdown-item" href="/molehiya/Login Page/index.html">Logout</a>
					</div>
				</li>
			</ul>


			<div class="dropdown mobile-user-menu">
				<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				<div class="dropdown-menu dropdown-menu-right">

					<a class="dropdown-item" href="/molehiya/Login Page/index.html">Logout</a>
				</div>
			</div>

		</div>

		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>


						<li class="">
							<a href="departments.php"><i class="la la-cube"></i> <span> Departments</span> </a>

						</li>
						<li class="menu-title">

						</li>
						<li class="">
							<a href="employees-list.php"><i class="la la-user"></i> <span> Employees</span> </a>

						</li>

						<li>
							<a href="table.php"><i class="la la-files-o"></i> <span> Payroll </span></a>
							<ul style="display: none;">
							

							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>


		<div class="page-wrapper">

			<div class="content container-fluid">

				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Employee</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="admin-dashboard-1.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Employee</li>
							</ul>
						</div>
						<div class="col-auto float-end ms-auto">
							<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
						</div>
					</div>
				</div>

				<form name="frm" action="search.php" method="POST">
					<div class="row filter-row">
						<div class="col-sm-6 col-md-3">
							<div class="form-group form-focus">
								<input type="text" name="empid" class="form-control floating">
								<label class="focus-label" name="empid" required>Employee ID</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Employee Name</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group form-focus select-focus">
								<select class="select floating">
									<option selected>Select Designation</option>
									<option value="webdev">Web Developer</option>
									<option value="softeng">Software Engineer</option>
									<option value="softtest">Software Tester</option>
									<option value="frontdev">Frontend Developer</option>
									<option value="uiuxdev">UI/UX Developer</option>
								</select>
								<label class="focus-label">Designation</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<input type="submit" value="Search" name="sbmt" class="btn btn-success w-100">
							</a>
						</div>
					</div>
				</form>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table datatable">
								<thead>
									<tr>
										<th>Employee ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Join Date</th>
										<th class="text-nowrap">Role</th>

									</tr>
								</thead>
								<tbody>
									<?php while ($row = mysqli_fetch_array($result)) {
										echo "<tr>";
										echo "<td>" . $row['empid'] . "</td>";
										echo "<td>" . $row['empname'] . "</td>";
										echo "<td>" . $row['email'] . "</td>";
										echo "<td>" . $row['jdate'] . "</td>";
										echo "<td>" . $row['role'] . "</td>";
										echo "</tr>";
									} ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>


			<div id="add_employee" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Employee</h5>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="add.php" method="POST">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Name <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="empname">
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Email <span class="text-danger">*</span></label>
											<input class="form-control" type="email" name="email">
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="empid">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
											<div class="cal-icon"><input name="jdate" type="date"></div>
										</div>
									</div>
									<div class="col-sm-6">

									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Department <span class="text-danger">*</span></label>
											<select class="select" name="role">
												<option value="webdev" selected>Web Developer</option>
												<option value="softeng">Software Engineer</option>
												<option value="softtest">Software Tester</option>
												<option value="frontdev">Frontend Developer</option>
												<option value="uiuxdev">UI/UX Developer</option>
										</div>
									</div>

								</div>

								<div class="submit-section">
									<input class="btn btn-primary submit-btn" type="submit" value="Save" name="sbmit">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div id="edit_employee" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Employee</h5>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>


					</div>
				</div>
			</div>


			<div class="modal custom-modal fade" id="delete_employee" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Employee</h3>
								<p>Are you sure want to delete?</p>
							</div>
							<div class="modal-btn delete-action">
								<div class="row">
									<div class="col-6">
										<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
									</div>
									<div class="col-6">
										<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>


	<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.6.0.min.js"></script>

	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<script src="assets/js/jquery.slimscroll.min.js"></script>

	<script src="assets/js/select2.min.js"></script>

	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>

	<script src="assets/js/app.js"></script>
</body>

</html>