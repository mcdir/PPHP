<?php
namespace PPHP\tests\tools\patterns\singleton;

spl_autoload_register(function($className){
  require_once $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $className) . '.php';
});

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-07-06 at 17:57:51.
 */
class SingletonTest extends \PHPUnit_Framework_TestCase{
  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp(){
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown(){
  }

  /**
   * @covers PPHP\tools\patterns\singleton\Singleton::getInstance
   */
  public function testGetInstance(){
    $instance = TestSingleton::getInstance();
    $this->assertInstanceOf('\PPHP\tests\tools\patterns\singleton\TestSingleton', $instance);
    $this->assertEquals($instance, TestSingleton::getInstance());
  }

  /**
   * @covers PPHP\tools\patterns\singleton\TSingleton::__clone
   */
  public function test__clone(){
    $this->setExpectedException('\PPHP\tools\classes\standard\baseType\exceptions\RuntimeException');
    $instance = TestSingleton::getInstance();
    $instance = clone $instance;
  }
}
