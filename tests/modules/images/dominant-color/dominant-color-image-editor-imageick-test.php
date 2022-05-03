<?php
/**
 * Tests for dominant-color module.
 *
 * @since n.e.x.t
 *
 * @package performance-lab
 * @group   dominant-color
 */

class Dominant_Color_Image_Editor_Imageick_Test extends WP_UnitTestCase {

	public function set_up() {
		parent::set_up(); // TODO: Change the autogenerated stub.

		add_filter(
			'wp_image_editors',
			static function () {
				return array( 'Dominant_Color_Image_Editor_Imagick' );
			}
		);
	}

	/**
	 * Test if the function returns the correct color.
	 *
	 * @dataProvider provider_get_dominant_color
	 *
	 * @covers Dominant_Color_Image_Editor_Imagick::dominant_color_get_dominant_color
	 */
	public function test_get_dominant_color( $image_path, $expected_color ) {

		$attachment_id = $this->factory->attachment->create_upload_object( $image_path );

		$this->assertContains( dominant_color_get( $attachment_id ), $expected_color );
	}

	/**
	 * Data provider for test_get_dominant_color_GD.
	 *
	 * @return array
	 */
	public function provider_get_dominant_color() {
		return array(

			'red_jpg'     => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/red.jpg',
				'expected_color' => array( 'ff0505', 'ff0506' ),
			),
			'green_jpg'   => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/green.jpg',
				'expected_color' => array( '1ee204' ),
			),
			'white_jpg'   => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/white.jpg',
				'expected_color' => array( 'ffffff' ),
			),
			'trans_jpg'   => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans.jpg',
				'expected_color' => array( 'ffffff' ),
			),
			'trans4_jpg'  => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans4.jpg',
				'expected_color' => array( 'd3febf' ),
			),

			'red_gif'     => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/red.gif',
				'expected_color' => array( 'ff0505', 'ff0506' ),
			),
			'green_gif'   => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/green.gif',
				'expected_color' => array( '1ee204' ),
			),
			'white_gif'   => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/white.gif',
				'expected_color' => array( 'ffffff' ),
			),
			'trans_gif'   => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans.gif',
				'expected_color' => array( 'ffffff' ),
			),
			'trans4_gif'  => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans4.gif',
				'expected_color' => array( '133f00' ),
			),

			'red_png'     => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/red.png',
				'expected_color' => array( 'ff0505', 'ff0506' ),
			),
			'green_png'   => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/green.png',
				'expected_color' => array( '1ee204' ),
			),
			'white_png'   => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/white.png',
				'expected_color' => array( 'ffffff' ),
			),
			'trans_png'   => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans.png',
				'expected_color' => array( '' ),
			),
			'trans4_png'  => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans4.png',
				'expected_color' => array( '133f00' ),
			),

			'red_webp'    => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/red.webp',
				'expected_color' => array( 'ff0505', 'ff0506' ),
			),
			'green_webp'  => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/green.webp',
				'expected_color' => array( '1de303' ),
			),
			'white_webp'  => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/white.webp',
				'expected_color' => array( 'ffffff' ),
			),
			'trans_webp'  => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans.webp',
				'expected_color' => array( '' ),
			),
			'trans4_webp' => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans4.webp',
				'expected_color' => array( '133f00' ),
			),
			'gif'         => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/earth.gif',
				'expected_color' => array( '151517' ),
			),
			'webp'        => array(
				'image_path'     => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/balloons.webp',
				'expected_color' => array( 'c0bbb9' ),
			),
		);
	}

	/**
	 * Test if the function returns the correct color.
	 *
	 * @dataProvider provider_get_has_transparency
	 *
	 * @covers ::dominant_color_get_has_transparency
	 */
	public function test_dominant_color_get_has_transparency( $image_path, $expected_transparency ) {
		$attachment_id = $this->factory->attachment->create_upload_object( $image_path );

		$this->assertEquals( $expected_transparency, dominant_color_get_has_transparency( $attachment_id ) );
	}

	/**
	 * Data provider for test_get_dominant_color_GD.
	 *
	 * @return array
	 */
	public function provider_get_has_transparency() {
		return array(
			'white_jpg'   => array(
				'image_path'            => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/white.jpg',
				'expected_transparency' => false,
			),
			'trans_jpg'   => array(
				'image_path'            => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans.jpg',
				'expected_transparency' => false,
			),
			'trans4_jpg'  => array(
				'image_path'            => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans4.jpg',
				'expected_transparency' => false,
			),

			'white_gif'   => array(
				'image_path'            => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/white.gif',
				'expected_transparency' => false,
			),
			'trans_gif'   => array(
				'image_path'            => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans.gif',
				'expected_transparency' => false,
			),
			'trans4_gif'  => array(
				'image_path'            => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans4.gif',
				'expected_transparency' => true,
			),

			'white_png'   => array(
				'image_path'            => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/white.png',
				'expected_transparency' => false,
			),
			'trans_png'   => array(
				'image_path'            => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans.png',
				'expected_transparency' => true,
			),
			'trans4_png'  => array(
				'image_path'            => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans4.png',
				'expected_transparency' => true,
			),

			'white_webp'  => array(
				'image_path'            => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/white.webp',
				'expected_transparency' => false,
			),
			'trans_webp'  => array(
				'image_path'            => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans.webp',
				'expected_transparency' => true,
			),
			'trans4_webp' => array(
				'image_path'            => TESTS_PLUGIN_DIR . '/tests/testdata/modules/images/dominant-color/trans4.webp',
				'expected_transparency' => true,
			),
		);
	}
}
