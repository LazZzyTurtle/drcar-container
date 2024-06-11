<?php
namespace CarRepairSerivces\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Group_Control_Background;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;

class TeamCarousel extends Widget_Base {

	public function get_name() {
		return 'team_carousel';
	}

	public function get_title() {
		return __( 'Team Carousel', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-posts-carousel';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'heading_settings',
			array(
				'label' => __( 'General Settings', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Our <span class="color">Team</span>', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title_2',
			array(
				'label'       => __( 'Sub Title 2', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Meet Our Specialists from Car Repair Service', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'content',
			array(
				'label'       => __( 'Content for the horizontal style', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Our team specializes in many different types of vehicles, and since they work on a wider variety of vehicles than their dealer counterparts, their overall expertise is greater, too. By working on many makes and models, our technicians can be trusted to properly diagnose challenging repairs and other issues. As automotive technology advances, our team is continually updating their education & skills.', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'bg_text',
			array(
				'label'       => __( 'BG Text', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Meet the Team', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'column_no',
			array(
				'label'   => __( 'Column no', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '4',
				'options' => array(
					'2' => __( '2 Column', 'car-repair-services-core' ),
					'3' => __( '3 Column', 'car-repair-services-core' ),
					'4' => __( '4 Column', 'car-repair-services-core' ),
				),
			)
		);

		$this->add_control(
			'team_style',
			array(
				'label'   => __( 'Style', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '2',
				'options' => array(
					'2' => __( 'Vertical', 'car-repair-services-core' ),
					'1' => __( 'Horizontal', 'car-repair-services-core' ),
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'crs_content_settings',
			array(
				'label' => __( 'Content Settings', 'car-repair-services-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'name', [
				'label' => esc_html__( 'Name Of Team Member', 'car-repair-services-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Robert J. Piedra' , 'car-repair-services-core' ),
			]
		);
		$repeater->add_control(
			'designation', [
				'label' => esc_html__( 'Designation of Team Member', 'car-repair-services-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Service Advisor' , 'car-repair-services-core' ),
			]
		);
		$repeater->add_control(
			'description', [
				'label' => esc_html__( 'Short Description', 'car-repair-services-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'ASE Certified Master Technician, Lincoln Technical Institute 1992, Jason with his 25 years of automotive experience joined our team in June 2015' , 'car-repair-services-core' ),
			]
		);
		$repeater->add_control(
			'social_facebook', [
				'label' => esc_html__( 'Facebook', 'car-repair-services-core' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'social_twitter', [
				'label' => esc_html__( 'Twitter', 'car-repair-services-core' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'social_instagram', [
				'label' => esc_html__( 'Instagram', 'car-repair-services-core' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'image', [
				'label' => esc_html__( 'Picture Of Team Member', 'car-repair-services-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			]
		);

		$this->add_control(
			'crs_team_carousel_tabs_tab',
			[
				'label' => esc_html__( 'Repeater List', 'car-repair-services-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'car-repair-services-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'car-repair-services-core' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'car-repair-services-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'car-repair-services-core' ),
					],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_carousel_options',
			array(
				'label' => __( 'Carousel Settings', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'slides_to_show',
			array(
				'label'              => __( 'How many Slides to show?', 'car-repair-services-core' ),
				'type'               => Controls_Manager::NUMBER,
				'default'            => 3,
				'frontend_available' => true,
			)
		);

		$this->add_control(
			'slides_to_scroll',
			array(
				'label'              => __( 'How many Slides to Scroll?', 'car-repair-services-core' ),
				'type'               => Controls_Manager::NUMBER,
				'default'            => 1,
				'frontend_available' => true,
			)
		);
		$this->add_control(
			'autoplay',
			array(
				'label'       => __( 'Autoplay Slides', 'car-repair-services-core' ),
				'description' => __( 'Slide will start automatically', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
			)
		);

		$this->add_control(
			'autoplay_speed',
			array(
				'label'              => __( 'Autoplay Speed', 'car-repair-services-core' ),
				'type'               => Controls_Manager::NUMBER,
				'default'            => 4000,
				'frontend_available' => true,
			)
		);

		$this->add_control(
			'arrows',
			array(
				'label'       => __( 'Enable Arrows', 'car-repair-services-core' ),
				'description' => __( 'Enable Arrows', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'off',
			)
		);

		$this->add_control(
			'dots',
			array(
				'label'       => __( 'Enable Dots', 'car-repair-services-core' ),
				'description' => __( 'Enable Dots', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'text_style_section',
			array(
				'label' => __( 'Text Style', 'car-repair-services-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'heading_typography',
				'label'    => __( 'Heading Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .block-title .block-title__title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'subheading_typography',
				'label'    => __( 'Sub Heading Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .block-title .block-title__description',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'item_title_typography',
				'label'    => __( 'Item Title Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .card01 .card01__title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'item_content_typography',
				'label'    => __( 'Item Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .card01 .card01__description',
			)
		);
		$this->end_controls_section();

	}

	protected function render() {

		$settings         = $this->get_settings();
		$slides_to_show   = $settings['slides_to_show'];
		$slides_to_scroll = $settings['slides_to_scroll'];
		$autoplay_speed   = $settings['autoplay_speed'];

		if ( $settings['autoplay'] == 'yes' ) {
			$autoplay = 'true';
		} else {
			$autoplay = 'false';
		}
		if ( $settings['arrows'] == 'yes' ) {
			$arrows = 'true';
		} else {
			$arrows = 'false';
		}
		if ( $settings['dots'] == 'yes' ) {
			$dots = 'true';
		} else {
			$dots = 'false';
		}
		?>
		<div class="block position-relative overflow-hidden">
			<div class="container">
				<div class="block-title">
					<h2 class="block-title__title"><?php echo wp_kses_post( $settings['title'] ); ?></h2>
					<div class="block-title__description">
					<?php echo wp_kses_post( $settings['title_2'] ); ?>
					</div>
					<div class="title-separator"></div>
				</div>
				<div class="section__text-background text-color02 text-center text-background__center"><?php echo wp_kses_post( $settings['bg_text'] ); ?></div>
			<?php
			if ( $settings['team_style'] == 2 ) {
				?>
				<div class="card01-wrapper">
				<div class="js-slick-init team-carousel slick-style01" data-slick='{
					"slidesToShow": <?php echo $slides_to_show; ?>, 
					"slidesToScroll": <?php echo $slides_to_scroll; ?>, 
					"dots": <?php echo $dots; ?>,
					"arrows": <?php echo $arrows; ?>,
					"autoplay": <?php echo $autoplay; ?>,
					"autoplaySpeed": <?php echo $autoplay_speed; ?>,
					"responsive":[
							{"breakpoint": 992,
								"settings":{"slidesToShow": 2}
							}, 
							{"breakpoint": 576,
								"settings":{"slidesToShow": 1}
							} 
						]
					}'>
					<?php
					foreach ( $settings['crs_team_carousel_tabs_tab'] as $tab ) {
						$image_url = ( $tab['image']['id'] != '' ) ? wp_get_attachment_image( $tab['image']['id'], 'full' ) : $tab['image']['url'];
						?>
							<div class="item">
								<div class="card01">
									<div class="card01__img">
									<?php
									if ( wp_http_validate_url( $image_url ) ) {
										?>
											<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr__( 'Alt', 'car-repair-service-core' ); ?>">
											<?php
									} else {
										echo $image_url;
									}
									?>
										<ul class="card01__social-icon">
										<?php if ( $tab['social_facebook'] ) { ?>
											<li>
												<a class="icon icon-59439" target="_blank" href="<?php echo esc_url( $tab['social_facebook'] ); ?>"></a>
											</li>
										<?php }if ( $tab['social_twitter'] ) { ?>
											<li>
												<a class="icon icon-8800" target="_blank" href="<?php echo esc_url( $tab['social_twitter'] ); ?>"></a>
											</li>
										<?php }if ( $tab['social_instagram'] ) { ?>
											<li>
												<a class="icon icon-733614" target="_blank" href="<?php echo esc_url( $tab['social_instagram'] ); ?>"></a>
											</li>
										<?php } ?>
										</ul>
									</div>
									<div class="card01__wrapper">
										<h6 class="card01__title"><a href="#"><?php echo esc_html( $tab['name'] ); ?></a></h6>
										<div class="card01__description"><?php echo esc_html( $tab['designation'] ); ?></div>
									</div>
								</div>
							</div>
						<?php
					}
					echo '</div></div>';
			} else {
				echo '<div class="row">';
				foreach ( $settings['crs_team_carousel_tabs_tab'] as $tab ) {
					$image = ( $tab['image']['id'] != '' ) ? wp_get_attachment_image( $tab['image']['id'], 'full', '', array( 'class' => 'img-responsive' ) ) : $tab['image']['url'];
					?>
						<div class="<?php echo $colclass; ?>">
							<div class="person person-hor">
								<div class="image image-scale-color">					
									<?php
									if ( wp_http_validate_url( $image ) ) {
										?>
										<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr__( 'Alt', 'car-repair-service-core' ); ?>">
										<?php
									} else {
										echo $image;
									}
									?>
									<div class="hover"></div>
								</div>
								<div class="person-info">
									<h5 class="name"><?php echo esc_html( $tab['name'] ); ?></h5>
									<h6 class="position"><?php echo esc_html( $tab['designation'] ); ?></h6>
									<div class="text"><?php echo wp_kses_post( $tab['description'] ); ?></div>
									<div class="link">
									<?php if ( ! empty( $tab['social_facebook'] ) ) { ?>
											<a class="icon icon-facebook-logo" target="_blank" href="<?php echo esc_url( $tab['social_facebook'] ); ?>"></a>
										<?php
									}
									?>
									<?php if ( ! empty( $tab['social_twitter'] ) ) { ?>
											<a class="icon icon-twitter-logo" target="_blank" target="_blank" href="<?php echo esc_url( $tab['social_twitter'] ); ?>"></a>
										<?php
									}
									?>
									<?php if ( ! empty( $tab['social_instagram'] ) ) { ?>
										<a class="icon icon-instagram-logo" target="_blank" href="<?php echo esc_url( $tab['social_instagram'] ); ?>"></a>
										<?php
									}
									?>
									</div>
								</div>
							</div>
						</div>
						<?php
						}
						?>
					</div>
					<div class="divider-lg"></div>
					<p>
					<?php
						echo wp_kses_post( $settings['content'] );
					?>
					</p>
				<?php
				}
				?>
			</div>
		</div>
		<?php
	}
}
