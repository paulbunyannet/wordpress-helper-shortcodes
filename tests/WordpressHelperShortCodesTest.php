<?php

/**
 * Mock version of add_shortcode
 * @param $tag
 * @param $callback
 * @return mixed
 */
function add_shortcode( $tag, $callback)
{
    return WordpressHelperShortCodesTest::$functions->add_shortcode($tag, $callback);
}

/**
 * Mock version of getenv
 * @param null $varname
 * @param bool $local_only
 * @return mixed
 */
function env($key, $default = null)
{
    return WordpressHelperShortCodesTest::$functions->env($key, $default);
}

/**
 * Mock version of shortcode_atts
 * @param $pairs
 * @param $atts
 * @param string $shortcode
 * @return mixed
 */
function shortcode_atts($pairs, $atts, $shortcode = '' )
{
    return WordpressHelperShortCodesTest::$functions->shortcode_atts($pairs, $atts, $shortcode);
}

/**
 * Mock version of get_bloginfo
 * @param string $show
 * @param string $filter
 * @return mixed
 */
function get_bloginfo($show = '', $filter = 'raw' )
{
    return WordpressHelperShortCodesTest::$functions->get_bloginfo($show, $filter);
}


/**
 * Class WordpressHelperShortCodeTest
 */

/**
 * Class WordpressHelperShortCodeTest
 * @backupGlobals disabled
 */
class WordpressHelperShortCodesTest extends \PHPUnit\Framework\TestCase
{

    /** @var \Mockery\MockInterface $functions */
    public static $functions;

    /**
     * Setup the test
     */
    public function setUp()
    {
        parent::setUp();
        self::$functions = Mockery::mock();
    }

    /**
     * Tear down the test
     */
    public function tearDown()
    {
        Mockery::close();
        parent::tearDown();
    }

    /**
     * Test getting an environment variable
     * @test
     */
    public function testWpHelperScGetEnv()
    {
        $key = 'foo';
        $value = 'bar';
        self::$functions->shouldReceive('env')->once()->withArgs([$key, $key])->andReturn($value);
        $this->assertSame($value, WordpressHelperShortCodes::getEnv([$key]));
    }

    /**
     * Test getting an environment variable return null if the attribute is missing
     * @test
     */
    public function testWpHelperScGetEnvWithMissingAttribute()
    {
        $this->assertNull(WordpressHelperShortCodes::getEnv([]));
    }

    /**
     * Test getting blog info
     * @test
     */
    public function testWpHelperScGetBlogInfo()
    {
        $key = 'foo';
        $value = 'bar';
        self::$functions->shouldReceive('shortcode_atts')->once()->withAnyArgs()->andReturn(['key' => $key, 'filter' => '']);
        self::$functions->shouldReceive('get_bloginfo')->once()->withArgs([$key, ''])->andReturn($value);
        $this->assertSame($value, WordpressHelperShortCodes::getBlogInfo(['key' => $key, 'filter' => '']));

    }

}
