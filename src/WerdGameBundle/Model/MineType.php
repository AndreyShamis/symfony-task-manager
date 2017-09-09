<?php
/**
 * Created by PhpStorm.
 * User: werd
 * Date: 09/09/17
 * Time: 15:10
 */

namespace WerdGameBundle\Model;


abstract class MineType
{
    const GOLD_MINE = 1;
    const WOOD_MINE = 2;
    const STONE_MINE = 3;
    const COPPER_MINE = 4;

    /** @var array user friendly named type */
    protected static $typeName = [
        self::GOLD_MINE    => 'Gold',
        self::WOOD_MINE => 'Wood',
        self::STONE_MINE => 'Stone',
        self::COPPER_MINE  => 'Copper',
    ];

    /**
     * @param  string $typeShortName
     * @return string
     */
    public static function getTypeName($typeShortName)
    {
        if (!isset(static::$typeName[$typeShortName])) {
            return "Unknown type ($typeShortName)";
        }

        return static::$typeName[$typeShortName];
    }


    /**
     * @return array<integer>
     */
    public static function getAvailableTypes()
    {
        return [
            self::GOLD_MINE,
            self::WOOD_MINE,
            self::STONE_MINE,
            self::COPPER_MINE
        ];
    }
}