<?php
/**
 * Created by PhpStorm.
 * User: Andrey Shamis
 * Date: 09/09/17
 * Time: 14:15
 */

namespace WerdGameBundle\Model;


interface MineInterface
{
    /**
     * @return mixed
     */
    public function collectResources();

    /**
     * @return mixed
     */
    public function levelUp();

    /**
     * @return mixed
     */
    public function freezeProduction();

    /**
     * @return mixed
     */
    public function updateLastFlushTime();

}