<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/1/18
 * Time: 10:53 AM
 */

namespace EpoDownloaderManager\Parsers;

interface IRssParser
{
    public function setContent(string $content);

    public function getContent();

    public function getParsedItems();
}