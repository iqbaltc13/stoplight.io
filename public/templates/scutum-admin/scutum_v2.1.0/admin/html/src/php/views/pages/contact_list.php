<div id="sc-page-wrapper">
	<div id="sc-page-content">

		<ul id="sc-contact-list" class="uk-child-width-1-1 uk-child-width-1-2@m uk-child-width-1-3@l" data-uk-grid>
<?php for($i=1;$i < 60; $i++) { ?>
			<li>
				<div class="uk-card uk-card-hover">
					<div class="uk-card-body sc-padding-remove">
						<div class="uk-grid-divider uk-grid-collapse" data-uk-grid>
							<div class="uk-width-1-3@l uk-flex uk-flex-middle uk-flex-center<?php if($i == 2) {; ?> md-bg-light-green-50<?php }; ?><?php if($i == 4) {; ?> md-bg-brown-50<?php }; ?>">
								<div class="sc-padding-medium uk-text-center">
									<?php avatar(rand(1,8),'','_md','sc-border'); ?>
									<p class="sc-text-semibold uk-margin uk-margin-remove-bottom">
										<?php echo $faker->firstName(); ?>
										<?php echo $faker->lastName(); ?>
									</p>
									<p class="uk-margin-remove sc-color-secondary uk-text-medium"><?php echo $faker->company; ?></p>
								</div>
							</div>
							<div class="uk-width-2-3@l">
								<div class="sc-padding-medium">
									<ul class="uk-list uk-list-divider">
										<li class="sc-list-group">
											<div class="sc-list-addon"><i class="mdi mdi-phone"></i></div>
											<div class="sc-list-body">
												<p class="uk-margin-remove sc-text-semibold"><?php echo $faker->phoneNumber; ?></p>
												<span class="sc-list-secondary-text">Lorem ipsum dolor sit.</span>
											</div>
										</li>
										<li class="sc-list-group">
											<div class="sc-list-addon"><i class="mdi mdi-email"></i></div>
											<div class="sc-list-body">
												<p class="uk-margin-remove"><?php echo $faker->email; ?></p>
											</div>
										</li>
										<li class="sc-list-group">
											<div class="sc-list-addon"><i class="mdi mdi-office-building"></i></div>
											<div class="sc-list-body">
												<p class="uk-margin-remove uk-text-wrap"><?php echo $faker->address; ?></p>
											</div>
										</li>
										<li class="sc-list-group">
											<div class="sc-list-addon"><i class="mdi mdi-information-outline"></i></div>
											<div class="sc-list-body">
												<p class="uk-margin-remove uk-text-wrap"><?php echo $faker->sentence(10); ?></p>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
<?php }; PHP_EOL; ?>
		</ul>

	</div>
</div>
