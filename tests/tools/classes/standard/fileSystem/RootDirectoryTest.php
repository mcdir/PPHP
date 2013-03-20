<?php
namespace PPHP\tests\tools\classes\standard\fileSystem;

spl_autoload_register(function($className){
  require_once $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $className) . '.php';
});

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-06-05 at 22:05:33.
 */
class RootDirectoryTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var \PPHP\tools\classes\standard\fileSystem\RootDirectory
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp(){
    $this->object = new \PPHP\tools\classes\standard\fileSystem\RootDirectory();
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown(){
  }

  /**
   * @covers PPHP\tools\classes\standard\fileSystem\RootDirectory::getLocationAddress
   */
  public function testGetLocationAddress(){
    $this->assertEquals($_SERVER['DOCUMENT_ROOT'], $this->object->getLocationAddress());
  }

  /**
   * @covers PPHP\tools\classes\standard\fileSystem\RootDirectory::getAddress
   */
  public function testGetAddress(){
    $this->assertEquals($_SERVER['DOCUMENT_ROOT'], $this->object->getLocationAddress());
  }

  /**
   * @covers PPHP\tools\classes\standard\fileSystem\RootDirectory::rename
   */
  public function testRename(){
    $this->setExpectedException('\PPHP\tools\classes\standard\fileSystem\UpdatingRoodException');
    $this->object->rename('NewName');
  }

  /**
   * @covers PPHP\tools\classes\standard\fileSystem\RootDirectory::move
   */
  public function testMove(){
    $this->setExpectedException('\PPHP\tools\classes\standard\fileSystem\UpdatingRoodException');
    $this->object->move($this->object);
  }

  /**
   * @covers PPHP\tools\classes\standard\fileSystem\RootDirectory::isExists
   */
  public function testIsExists(){
    $this->assertTrue($this->object->isExists());
  }

  /**
   * @covers PPHP\tools\classes\standard\fileSystem\RootDirectory::copyPaste
   */
  public function testCopyPaste(){
    $this->setExpectedException('\PPHP\tools\classes\standard\fileSystem\UpdatingRoodException');
    $this->object->copyPaste($this->object);
  }

  /**
   * @covers PPHP\tools\classes\standard\fileSystem\RootDirectory::getSize
   */
  public function testGetSize(){
    $this->assertEquals(0, $this->object->getSize());
  }

  /**
   * @covers PPHP\tools\classes\standard\fileSystem\RootDirectory::create
   */
  public function testCreate(){
    $this->setExpectedException('\PPHP\tools\classes\standard\fileSystem\UpdatingRoodException');
    $this->object->create();
  }
}