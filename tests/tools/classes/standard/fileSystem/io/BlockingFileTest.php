<?php
namespace PPHP\tests\tools\classes\standard\fileSystem\io;

spl_autoload_register(function($className){
  require_once $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $className) . '.php';
});

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-06-02 at 19:31:15.
 */
class BlockingFileTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var \PPHP\tools\classes\standard\fileSystem\io\BlockingFileReader
   */
  protected $object;

  /**
   * @var \PPHP\tests\tools\classes\standard\fileSystem\TestObserver
   */
  protected $observer;

  /**
   * Имя тестируемого файла в текущем каталоге.
   */
  const testFileName = 'testFile.txt';
  /**
   * Дескриптор тестируемого файла.
   * @var resource
   */
  static $descriptor;

  public static function setUpBeforeClass(){
    fclose(fopen(self::testFileName, 'a+'));
  }

  public static function tearDownAfterClass(){
    unlink(self::testFileName);
  }

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp(){
    self::$descriptor = fopen(self::testFileName, 'r+');
    $this->object = new \PPHP\tools\classes\standard\fileSystem\io\BlockingFileReader(self::$descriptor);
    $this->observer = new \PPHP\tests\tools\classes\standard\fileSystem\TestObserver();
    $this->object->attach($this->observer);
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown(){
  }

  /**
   * @covers PPHP\tools\patterns\observer\TSubject::attach
   * @covers PPHP\tools\patterns\observer\TSubject::notify
   * @covers PPHP\tools\classes\standard\fileSystem\io\BlockingFileReader::close
   * @covers PPHP\tools\classes\standard\fileSystem\io\BlockingFileWriter::close
   */
  public function testClose(){
    $this->assertTrue($this->object->close());
    $this->assertTrue($this->observer->getUpdating());
  }
}