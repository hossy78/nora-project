<?php
use Nora\Nora;

class Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {

    }

    public function tearDown()
    {

    }

    public function testMain()
    {
        Nora::dump(Nora::getService('config'));
    }
}

# vim:set ft=php.phpunit :
