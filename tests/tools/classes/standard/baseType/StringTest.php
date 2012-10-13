<?php
namespace PPHP\tests\tools\classes\standard\baseType;
use stdClass;

spl_autoload_register(function($className){
  require_once $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $className) . '.php';
});

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-10-09 at 18:54:51.
 */
class StringTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var \PPHP\tools\classes\standard\baseType\String
   */
  protected $object;

  /**
   * Строка для теста.
   */
  const testString = 'Test string тестовая строка +/\\#`';

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp(){
    $this->object = new \PPHP\tools\classes\standard\baseType\String(self::testString);
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown(){
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::getVal
   */
  public function testGetVal(){
    $this->assertEquals('Test string тестовая строка +/\\#`', $this->object->getVal());
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::offsetExists
   */
  public function testOffsetExists(){
    $this->assertTrue($this->object->offsetExists(0));
    $this->assertTrue($this->object->offsetExists(5));
    $this->assertFalse($this->object->offsetExists(-1));
    $this->assertFalse($this->object->offsetExists(34));
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::offsetGet
   */
  public function testOffsetGet(){
    $this->assertEquals('T', $this->object[0]);
    $this->assertEquals('т', $this->object[12]);
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::is
   */
  public function testIs(){
    $this->assertTrue(\PPHP\tools\classes\standard\baseType\String::is('test'));
    $this->assertTrue(\PPHP\tools\classes\standard\baseType\String::is(5));
    $this->assertTrue(\PPHP\tools\classes\standard\baseType\String::is(5.5));
    $this->assertTrue(\PPHP\tools\classes\standard\baseType\String::is(true));
    $this->assertFalse(\PPHP\tools\classes\standard\baseType\String::is([]));
    $this->assertFalse(\PPHP\tools\classes\standard\baseType\String::is(new stdClass));
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::length
   */
  public function testLength(){
    $this->assertEquals(47, $this->object->length());
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::count
   */
  public function testCount(){
    $this->assertEquals(33, $this->object->count());
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::sub
   */
  public function testSub(){
    $this->assertEquals('est', $this->object->sub(1,3)->getVal());
    $this->assertEquals('string тестовая строка +/\\#`', $this->object->sub(5)->getVal());
    $this->assertEquals('string те', $this->object->sub(5,9)->getVal());
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::subLeft
   */
  public function testSubLeft(){
    $this->assertEquals('Test ', $this->object->subLeft(5)->getVal());
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::subRight
   */
  public function testSubRight(){
    $this->assertEquals('трока +/\\#`', $this->object->subRight(10)->getVal());
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::pad
   */
  public function testPad(){
    $this->assertEquals('  Test string тестовая строка +/\\#`', $this->object->pad(35)->getVal());
    $this->assertEquals('Test string тестовая строка +/\\#`  ', $this->object->pad(35, ' ', \PPHP\tools\classes\standard\baseType\String::PAD_RIGHT)->getVal());
    $this->assertEquals(' Test string тестовая строка +/\\#` ', $this->object->pad(35, ' ', \PPHP\tools\classes\standard\baseType\String::PAD_BOTH)->getVal());
    $this->assertEquals('_Test string тестовая строка +/\\#`_', $this->object->pad(35, '_', \PPHP\tools\classes\standard\baseType\String::PAD_BOTH)->getVal());
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::replace
   */
  public function testReplace(){
    $this->assertEquals('Replace string тестовая строка +/\\#`', $this->object->replace('Test', 'Replace')->getVal());
    $this->assertEquals('Test string замененная строка +/\\#`', $this->object->replace('тестовая', 'замененная')->getVal());
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::change
   */
  public function testChange(){
    $this->assertEquals('Test st+ing +ес+овая с+рока +/\\+`', $this->object->change('/[rт#]+/u', '+')->getVal());
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::search
   */
  public function testSearch(){
    $this->assertEquals(5, $this->object->search('string тестовая'));
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::match
   */
  public function testMatch(){
    $this->assertEquals(1, $this->object->match('/.*string.*/u'));
    $this->assertEquals(0, $this->object->match('/.*modify.*/u'));
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::explode
   */
  public function testExplode(){
    $this->assertEquals(['Test','string','тестовая','строка','+/\\#`'], $this->object->explode(' '));
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::md5
   */
  public function testMd5(){
    $this->assertEquals('6b5948186119279f14452b5a7d7ba715', $this->object->md5());
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::sha1
   */
  public function testSha1(){
    $this->assertEquals('b10132ca6af9cff5579d609eb1e676bcf7d6ec3f', $this->object->sha1());
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::verify
   */
  public function testVerify(){
    $this->assertEquals(true, $this->object->verify(5, 34, 'a-zA-Zа-яА-ЯёЁ+/\#` '));
    $this->assertEquals(false, $this->object->verify(5, 30, 'a-zA-Zа-яА-ЯёЁ+/\#` '));
    $this->assertEquals(false, $this->object->verify(5, 34, 'a-zA-Z+/\#` '));
    $this->assertEquals(false, $this->object->verify(5, 34, 'a-zA-Zа-яА-ЯёЁ+/\` '));
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::prevent
   */
  public function testPrevent(){
    $this->assertEquals('Test string тестовая строка +/\\#`', $this->object->prevent(0,33, '')->getVal());
    $this->assertEquals('  Test string тестовая строка +/\\#`', $this->object->prevent(35,50, '')->getVal());
    $this->assertEquals('Test string тестовая строка +/', $this->object->prevent(0,30, '')->getVal());
    $this->assertEquals('Tes sring тестовая строка +/`', $this->object->prevent(0,33, '\t#')->getVal());
    $this->assertEquals('Test string тестовая строка +', $this->object->prevent(0,30, '\/')->getVal());
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::getPoint
   */
  public function testGetPoint(){
    $this->assertEquals(0, $this->object->getPoint());
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::setPoint
   */
  public function testSetPoint(){
    $this->object->setPoint(5);
    $this->assertEquals(5, $this->object->getPoint());
    $this->setExpectedException('\PPHP\tools\classes\standard\baseType\exceptions\LogicException');
    $this->object->setPoint(48);
    $this->object->setPoint(-1);
  }

  /**
   * @covers PPHP\tools\classes\standard\baseType\String::nextComponent
   */
  public function testNextComponent(){
    $this->assertEquals('Test', $this->object->nextComponent(' ')->getVal());
    $this->assertEquals('string', $this->object->nextComponent(' ')->getVal());
    $this->assertEquals('тест', $this->object->nextComponent('о')->getVal());
    $this->assertEquals('вая строка ', $this->object->nextComponent('+')->getVal());
  }
}
