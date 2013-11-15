<?php

/**
 * This file is part of BraincraftedDoctrineBundle.
 * (c) 2013 Florian Eckerstorfer
 */

namespace Braincrafted\Bundle\DoctrineBundle\DBAL\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\DateTimeType;

/**
 * UTCDateTimeType
 *
 * Based on the http://docs.doctrine-project.org/en/2.0.x/cookbook/working-with-datetime.html, but
 * with some fixed bugs.
 *
 * @category   DBALType
 * @package    BraincraftedDoctrineBundle
 * @subpackage DBAL
 * @copyright  2013 Florian Eckerstorfer
 * @license    http://opensource.org/licenses/MIT The MIT License
 * @see        http://docs.doctrine-project.org/en/2.0.x/cookbook/working-with-datetime.html
 */
class UTCDateTimeType extends DateTimeType
{
    /** @var \DateTimeZone */
    static private $utc = null;

    /**
     * {@inheritDoc}
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }

        if (!$value instanceof \DateTime) {
            return null;
        }

        $value->setTimezone((self::$utc) ? self::$utc : (self::$utc = new \DateTimeZone('UTC')));

        return $value->format($platform->getDateTimeFormatString());
    }

    /**
     * {@inheritDoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }

        $val = \DateTime::createFromFormat(
            $platform->getDateTimeFormatString(),
            $value,
            (self::$utc) ? self::$utc : (self::$utc = new \DateTimeZone('UTC'))
        );

        if (!$val) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }

        return $val;
    }
}
