<?php
namespace PPHP\tools\patterns\database\identification;

/**
 * Данный интерфейс реализуется классами, экземпляры которых имеют ключевой идентификатор.
 *
 * Реализация данного интерфейса классом свидетельствует о том, что экземпляры этого класса могут быть однозначно идентифицированны по целочисленному значению идентификатора.
 * Идентификатор может быть присвоен объекту только один раз, попытка изменения идентификатора приведет к ошибке. Это вызвано тем, что любой объект может быть идентифицирован только единожды, а смена идентификатора может привести к коллизии (наложению двух состояний на один объект).
 * @author Artur Sh. Mamedbekov
 * @package PPHP\tools\patterns\database\identification
 */
interface OID{
  /**
   * Метод возвращает идентификатор объекта.
   * @abstract
   * @return integer|null Идентификатор объекта или null - если объект не идентифицирован.
   */
  public function getOID();

  /**
   * Метод устанавливает идентификатор нового объекта.
   * @abstract
   * @param integer $OID Идентификатор объекта.
   * @throws UpdatingOIDException Выбрасывается при попытке изменения идентификатора.
   * @throws \PPHP\tools\classes\standard\baseType\exceptions\InvalidArgumentException Выбрасывается при передаче параметра неверного типа.
   * @return void
   */
  public function setOID($OID);

  /**
   * Метод проверяет, идентифицирован ли объект.
   * @abstract
   * @return boolean true - если объект идентифицирован, иначе - false
   */
  public function isOID();

  /**
   * Метод возвращает ссылку на объект в виде строки.
   * @abstract
   * @throws \PPHP\tools\classes\standard\baseType\exceptions\NotFoundDataException Выбрасывается в случае, если на момент вызова метода объект не был идентифицирован.
   * @return string Ссылка формата $ИмяКласса:ЗначениеИдентификатора.
   */
  public function getLinkOID();

  /**
   * Метод возвращает фиктивный (proxy), идентифицированный объект.
   *
   * Фиктивный объект, возвращаемый данным методом, не имеет состояния, но идентифицирован по средствам установки указанного целочисленного идентификатора.
   * Такого рода объект может быть использован как объектная ссылка на свое состояние для последующего восстановления.
   * @static
   * @abstract
   * @param integer $OID Идентификатор объекта.
   * @throws \PPHP\tools\classes\standard\baseType\exceptions\InvalidArgumentException Выбрасывается при передаче параметра неверного типа.
   * @return static Фиктивный (proxy) объект.
   */
  public static function getProxy($OID);
}
