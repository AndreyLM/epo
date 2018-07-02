<?php
namespace EpoDownloaderManager;

use EpoDownloaderManager\Adapters\IEpoAdapter;

class EpoDownloaderManager
{
    const RSS_URL = 'https://publication.epo.org/raw-data/atom';
    const EPO_AUTH_URL = '';

    /**
     * @var IEpoAdapter
     */
    private $adapter;

    public function __construct(IEpoAdapter $adapter)
    {
        $this->adapter = $adapter;
    }


    public function getRss()
    {

    }

    public function getResource(string $resourceUrl, string $target)
    {
        echo '--------------------------'.PHP_EOL;
        echo time().PHP_EOL;
        $this->adapter->getResource($resourceUrl, $target);
        echo time().PHP_EOL;
    }

    public function getResourceInfo(string  $resourceUrl)
    {
        echo var_dump($this->adapter->getResourceInfo($resourceUrl));
    }

    public function connect()
    {
        $this->adapter->connect(self::EPO_AUTH_URL);
        return $this;
    }

    public function close()
    {
        $this->adapter->close();
    }
}