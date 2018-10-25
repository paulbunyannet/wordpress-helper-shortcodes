<?php
use PHPUnit\Framework\TestCase;
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
 * Class WordpressHelperShortCodeTest
 */

/**
 * Class WordpressHelperShortCodeTest
 * @backupGlobals disabled
 */
class WordpressHelperShortCodesTest extends TestCase
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

}
