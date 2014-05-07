<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pasha
 * Date: 07.05.14
 * Time: 9:55
 * To change this template use File | Settings | File Templates.
 */

return array(
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => null,
        'data' => null
    ),
    '1' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Booker',
        'children' => array(
            'guest', // унаследуемся от гостя
        ),
        'bizRule' => null,
        'data' => null
    ),
    '2' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Entrepreneur',
        'children' => array(
            'user',          // позволим модератору всё, что позволено пользователю
        ),
        'bizRule' => null,
        'data' => null
    ),
    '0' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Admin',
        'children' => array(
            'moderator',         // позволим админу всё, что позволено модератору
        ),
        'bizRule' => null,
        'data' => null
    ),
);