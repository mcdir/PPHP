<?php
namespace PPHP\tools\patterns\io;

/**
 * Интерфейс определяет поток, который может быть закрыт.
 *
 * Поток, реализующий данный интерфейс может быть закрыт без возможности последующего восстановления.
 * Как правило закрытие потока сопровождается освобождением ресурсов системы, потому важно закрывать потоки, которые уже не будут использоваться.
 * При завершении сценария некоторые потоки могут быть закрыты автоматически.
 * @author Artur Sh. Mamedbekov
 * @package PPHP\tools\patterns\io
 */
interface Closed{
  /**
   * Метод закрывает поток.
   * @abstract
   * @return boolean true - если поток удачно закрыт, иначе - false.
   * @throws \PPHP\tools\patterns\io\IOException Выбрасывается в случае невозможности закрытия сокета вызванного ошибкой.
   */
  public function close();

  /**
   * Метод проверяет, закрыт ли поток.
   * @abstract
   * @return boolean true - если поток закрыт, иначе - false.
   */
  public function isClose();
}
