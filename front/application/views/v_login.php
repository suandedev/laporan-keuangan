<div class="container-fluid">

	<div class="row justify-content-center mt-5">
		<div class="col-md-4">
			<?= $this->session->flashdata('pesan1');; ?>
		</div>
	</div>

	<!-- Outer Row -->
	<div class="row justify-content-center">
		<div class="col-xl-4 col-lg-4 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4"><?= $title ?></h1>
								</div>
								<form class="user" method="post" action="<?= base_url('auth') ?>">
									<div class="form-group">
										<input type="text" name="username" class="form-control form-control-user"
											   placeholder="masukan username..." value="<?= set_value('username') ?>">
										<?= form_error('username') ?>
									</div>
									<div class="form-group">
										<input type="password" name="password" class="form-control form-control-user"
											   id="exampleInputPassword" placeholder="Password">
										<?= form_error('password') ?>
									</div>
									<button type="submit" class="btn btn-primary btn-user btn-block">
										Login
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>
