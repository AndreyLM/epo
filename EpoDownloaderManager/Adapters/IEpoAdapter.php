<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/30/18
 * Time: 9:25 AM
 */

namespace EpoDownloaderManager\Adapters;


interface IEpoAdapter
{
    public function connect(string $authUrl);

    public function getResource(string $resourceUrl, string $target);

    public function getResourceInfo(string $resourceUrl);

    public function close();
}