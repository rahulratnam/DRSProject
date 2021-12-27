<?php
/* Template Name: Teampage */

get_header();
?>

<div class="property-head team-head">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-md-12 col-12 news-head">
				<h4>Team DRS </h4>
				<?php the_content(); ?>
			</div>
		</div>
		
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
						<a href="javescript:void(0);" class="filterPosition" position-name="beleggers">Beleggers</a>
					</li>
					<li class="list-inline-item">
						<a href="javescript:void(0);" class="filterPosition" position-name="taxaties">Taxaties</a>
					</li>
					<li class="list-inline-item">
						<a href="javescript:void(0);" class="filterPosition" position-name="binnendienst">Binnendienst</a>
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
			$postData = get_posts( array(
				'post_type'      => 'teamdrs',
				'posts_per_page' => -1,
				'order'          => 'DESC',
				'orderby'    	=> 'ID',
				'post_status'    => 'publish'
			) );
			
			if ( $postData ) {
				foreach ( $postData as $post ) : 
					setup_postdata( $post );
					$linkedinUrl = get_field('linkedin_url');
					$emailAddress = get_field('email_address');
					$telephoneNumber = get_field('telephone_number');
					$employeeName = get_field('employee_name');
					$employeeImage = get_field('employee_image');
					$employeePosition = get_field('employee_position');
			?>
			<div class="col-xl-4 col-lg-4 col-md-4 col-12 team-new allTeamMembers emp_<?php echo $employeePosition; ?>">
				<div class="team-box">
					<img src="<?php echo $employeeImage; ?>" class="img-fluid" alt="">
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
jQuery('document').ready(function(){
	jQuery('.filterPosition').click(function(){
		var positionName = jQuery(this).attr('position-name');
		jQuery('.filterPosition').removeClass('active');
		jQuery(this).addClass('active');
		if(positionName == 'alles'){
			jQuery('.allTeamMembers').show();
		}else{
			jQuery('.allTeamMembers').hide();
			jQuery('.emp_'+positionName).show();
		}
	});
});
</script>