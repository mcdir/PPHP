<?php
namespace PPHP\tests\tools\classes\standard\storage\session;

spl_autoload_register(function($className){
  require_once $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $className) . '.php';
});
session_start();

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-07-07 at 09:50:49.
 */
class SessionProviderTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var \PPHP\tools\classes\standard\storage\session\SessionProvider
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp(){
    $this->object = \PPHP\tools\classes\standard\storage\session\SessionProvider::getInstance();
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown(){
    $_SESSION = [];
  }

  public static function tearDownAfterClass(){
    $_SESSION = [];
    unset($_COOKIE[session_name()]);
    session_destroy();
  }

  /**
   * @covers PPHP\tools\classes\standard\storage\session\SessionProvider::set
   */
  public function testSet(){
    $this->object->set('Test', 'Test');
    $this->assertEquals('Test', $_SESSION['Test']);
  }

  /**
   * @covers PPHP\tools\classes\standard\storage\session\SessionProvider::get
   */
  public function testGet(){
    $_SESSION['Test'] = 'Test';
    $this->assertEquals('Test', $this->object->get('Test'));
  }

  /**
   * @covers PPHP\tools\classes\standard\storage\session\SessionProvider::reset
   */
  public function testReset(){
    $_SESSION['Test'] = 'Test';
    $this->object->reset('Test');
    $this->assertFalse(isset($_SESSION['Test']));
  }

  /**
   * @covers PPHP\tools\classes\standard\storage\session\SessionProvider::isExists
   */
  public function testIsExists(){
    $this->assertFalse($this->object->isExists('Test'));
    $_SESSION['Test'] = 'Test';
    $this->assertTrue($this->object->isExists('Test'));
  }
}
