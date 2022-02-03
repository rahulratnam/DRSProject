<?php
/* Template Name: Teampage */

get_header();
?>

<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-xl-7 col-md-7 col-12 content-intro">
				<div class="page-subtitle"><?php echo get_field('page_subtitle'); ?></div>
				<h1><?php echo get_field('page_title'); ?></h1>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<div class="team-head">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-md-12 col-12 team-list">
				<h4>Sorteer op:</h4>
				<ul class="list-inline">
					<li class="list-inline-item">
						<a href="javescript:void(0);" class="active filterPosition" position-name="alles">Alles</a>
					</li>
					<li class="list-inline-item">
						<a href="javescript:void(0);" class="filterPosition" position-name="management">Management</a>
					</li>
					<li class="list-inline-item">
						<a href="javescript:void(0);" class="filterPosition" position-name="makelaars">Makelaars</a>
					</li>
					<li class="list-inline-item">
						<a href="javescript:void(0);" class="filterPosition" position-name="beleggers">Beleggingen</a>
					</li>
					<li class="list-inline-item">
						<a href="javescript:void(0);" class="filterPosition" position-name="taxaties">Taxatie</a>
					</li>
					<li class="list-inline-item">
						<a href="javescript:void(0);" class="filterPosition" position-name="clientsupport">Client support</a>
					</li>
					<li class="list-inline-item">
						<a href="javescript:void(0);" class="filterPosition" position-name="deskfinder">Deskfinder</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="team-sec">
	<div class="container">
		<div class="row">
			<?php
			$postData = get_posts(array(
				'post_type'      => 'teamdrs',
				'posts_per_page' => -1,
				'order'          => 'ASC',
				'orderby'    	=> 'publish_date',
				'post_status'    => 'publish'
			));

			if ($postData) {
				foreach ($postData as $post) :
					setup_postdata($post);
					$linkedinUrl = get_field('linkedin_url');
					$emailAddress = get_field('email_address');
					$telephoneNumber = get_field('telephone_number');
					$employeeName = get_field('employee_name');
					$employeeImage = get_field('employee_image');
					$employeePosition = get_field('employee_position');
					$employeeTitle = get_field('employee_title');
					$employeeInfo = get_field('employee_info');

					$posCls = '';
					foreach ($employeePosition as $epData) {
						$posCls .= ' emp_' . $epData;
					}
			?>
					<div class="col-xl-4 col-lg-4 col-md-4 col-12 team-new allTeamMembers <?php echo $posCls; ?>">
						<div class="team-box">
							<div class="team-image">
								<img src="<?php echo $employeeImage; ?>" class="img-fluid" alt="">
								<div class="team-hover">
									<div class="member-name"><?php echo $employeeName; ?></div>
									<div class="member-title"><?php echo $employeeTitle; ?></div>
									<div class="member-info"><?php echo $employeeInfo; ?></div>
								</div>
							</div>
							<div class="team-info">
								<h3><?php echo $employeeName; ?></h3>
								<a href="<?php echo $linkedinUrl; ?>" class="social-icon" target="_blank">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkedin.svg" class="img-fluid" alt="">
								</a>
								<p>
									<a href="mailto:<?php echo $emailAddress; ?>"><?php echo $emailAddress; ?></a><br>
									<a href="tel:<?php echo str_replace(' ', '', $telephoneNumber); ?>"><?php echo $telephoneNumber; ?></a>
								</p>
							</div>
						</div>
					</div>
			<?php
				endforeach;
				wp_reset_postdata();
			}
			?>
		</div>
	</div>
</div>

<?php
get_footer();
?>

<script>
	jQuery('document').ready(function() {
		jQuery('.filterPosition').click(function() {
			var positionName = jQuery(this).attr('position-name');
			jQuery('.filterPosition').removeClass('active');
			jQuery(this).addClass('active');
			if (positionName == 'alles') {
				jQuery('.allTeamMembers').show();
			} else {
				jQuery('.allTeamMembers').hide();
				jQuery('.emp_' + positionName).show();
			}
		});
	});
</script>