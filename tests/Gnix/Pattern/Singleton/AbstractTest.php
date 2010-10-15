<?php
require_once '/path/to/gnix-pattern/tests/init.php';

class Gnix_Pattern_Singleton_AbstractTest extends PHPUnit_Framework_TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testGetInstanceA()
    {
        $sampleA = Gnix_Pattern_Singleton_AbstractTest_SampleA::getInstance();

        $this->assertType('Gnix_Pattern_Singleton_Abstract', $sampleA);
        $this->assertType('Gnix_Pattern_Singleton_AbstractTest_SampleA', $sampleA);
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetInstanceB()
    {
        $sampleB = Gnix_Pattern_Singleton_AbstractTest_SampleB::getInstance();

        $this->assertType('Gnix_Pattern_Singleton_Abstract', $sampleB);
        $this->assertType('Gnix_Pattern_Singleton_AbstractTest_SampleB', $sampleB);
    }

    /**
     * @runInSeparateProcess
     */
    public function testCheckSameA()
    {
        $sampleA1 = Gnix_Pattern_Singleton_AbstractTest_SampleA::getInstance();
        $sampleA2 = Gnix_Pattern_Singleton_AbstractTest_SampleA::getInstance();
        $sampleA3 = Gnix_Pattern_Singleton_AbstractTest_SampleA::getInstance();

        $this->assertSame($sampleA1, $sampleA2);
        $this->assertSame($sampleA2, $sampleA3);
    }

    /**
     * @runInSeparateProcess
     */
    public function testCheckSameB()
    {
        $sampleB1 = Gnix_Pattern_Singleton_AbstractTest_SampleB::getInstance();
        $sampleB2 = Gnix_Pattern_Singleton_AbstractTest_SampleB::getInstance();
        $sampleB3 = Gnix_Pattern_Singleton_AbstractTest_SampleB::getInstance();

        $this->assertSame($sampleB1, $sampleB2);
        $this->assertSame($sampleB2, $sampleB3);
    }

    /**
     * @runInSeparateProcess
     */
    public function testCheckNotSame()
    {
        $sampleA = Gnix_Pattern_Singleton_AbstractTest_SampleA::getInstance();
        $sampleB = Gnix_Pattern_Singleton_AbstractTest_SampleB::getInstance();

        $this->assertNotSame($sampleA, $sampleB);
    }

    /**
     * @runInSeparateProcess
     */
    public function testCheckConstructor()
    {
        $sampleC = Gnix_Pattern_Singleton_AbstractTest_SampleC::getInstance();

        $this->assertSame('foo', $sampleC->getString());
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetInstanceD()
    {
        $sampleD = Gnix_Pattern_Singleton_AbstractTest_SampleD::getInstance();

        $this->assertSame('bar', $sampleD->getString());
    }

    /**
     * @runInSeparateProcess
     */
    public function testCheckSameD()
    {
        $sampleD1 = Gnix_Pattern_Singleton_AbstractTest_SampleD::getInstance();
        $sampleD2 = Gnix_Pattern_Singleton_AbstractTest_SampleD::getInstance();
        $sampleD3 = Gnix_Pattern_Singleton_AbstractTest_SampleD::getInstance();

        $this->assertSame($sampleD1, $sampleD2);
        $this->assertSame($sampleD2, $sampleD3);
    }
}

/**
 * Classes for testing Gnix_Pattern_Singleton_AbstractTest
 */
class Gnix_Pattern_Singleton_AbstractTest_SampleA extends Gnix_Pattern_Singleton_Abstract
{
}

class Gnix_Pattern_Singleton_AbstractTest_SampleB extends Gnix_Pattern_Singleton_Abstract
{
}

class Gnix_Pattern_Singleton_AbstractTest_SampleC extends Gnix_Pattern_Singleton_Abstract
{
    protected $_string;

    protected function __construct()
    {
        $this->_string = 'foo';
    }

    public function getString()
    {
        return $this->_string;
    }
}

class Gnix_Pattern_Singleton_AbstractTest_SampleD extends Gnix_Pattern_Singleton_AbstractTest_SampleC
{
    protected function __construct()
    {
        $this->_string = 'bar';
    }
}
