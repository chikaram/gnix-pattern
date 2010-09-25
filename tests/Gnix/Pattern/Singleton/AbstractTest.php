<?php
require_once '/data/App/tests/init.php';

class Gnix_Pattern_Singleton_AbstractTest extends PHPUnit_Framework_TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testGetInstanceA()
    {
        $sampleA = Sample_A::getInstance();

        $this->assertType('Gnix_Pattern_Singleton_Abstract', $sampleA);
        $this->assertType('Sample_A', $sampleA);
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetInstanceB()
    {
        $sampleB = Sample_B::getInstance();

        $this->assertType('Gnix_Pattern_Singleton_Abstract', $sampleB);
        $this->assertType('Sample_B', $sampleB);
    }

    /**
     * @runInSeparateProcess
     */
    public function testCheckSameA()
    {
        $sampleA1 = Sample_A::getInstance();
        $sampleA2 = Sample_A::getInstance();
        $sampleA3 = Sample_A::getInstance();

        $this->assertSame($sampleA1, $sampleA2);
        $this->assertSame($sampleA2, $sampleA3);
    }

    /**
     * @runInSeparateProcess
     */
    public function testCheckSameB()
    {
        $sampleB1 = Sample_B::getInstance();
        $sampleB2 = Sample_B::getInstance();
        $sampleB3 = Sample_B::getInstance();

        $this->assertSame($sampleB1, $sampleB2);
        $this->assertSame($sampleB2, $sampleB3);
    }

    /**
     * @runInSeparateProcess
     */
    public function testCheckNotSame()
    {
        $sampleA = Sample_A::getInstance();
        $sampleB = Sample_B::getInstance();

        $this->assertNotSame($sampleA, $sampleB);
    }

    /**
     * @runInSeparateProcess
     */
    public function testCheckConstructor()
    {
        $sampleB = Sample_B::getInstance();

        $this->assertSame('abc', $sampleB->getString());
    }
}

/**
 * Classes for testing Gnix_Pattern_Singleton_AbstractTest
 */
class Sample_A extends Gnix_Pattern_Singleton_Abstract
{
}

class Sample_B extends Gnix_Pattern_Singleton_Abstract
{
    private $_string;

    protected function __construct()
    {
        $this->_string = 'abc';
    }

    public function getString()
    {
        return $this->_string;
    }
}
