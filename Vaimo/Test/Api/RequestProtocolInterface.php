<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 12/10/2018
 * Time: 4:53 AM
 */
namespace Vaimo\Test\Api;
interface RequestProtocolInterface{

    public function getResponse($url);
}