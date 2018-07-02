<?php

namespace EpoDownloaderManager\Adapters;

require_once __DIR__.'/IEpoAdapter.php';

class EpoHttpAdapter implements IEpoAdapter
{

    private $ch;

    public function connect(string $authUrl)
    {
        $this->ch = curl_init();
    }

    public function getResource(string $resourceUrl, string $target)
    {
        $f = fopen($target, 'w');
        curl_setopt($this->ch, CURLOPT_URL, $resourceUrl);
        curl_setopt($this->ch, CURLOPT_HEADER, true);
        curl_setopt($this->ch, CURLOPT_FILE, $f);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($this->ch);
        fclose($f);

        if(curl_errno($this->ch))
            return curl_error($this->ch);

        return $res;
    }

    public function getResourceInfo(string $resourceUrl)
    {
        curl_setopt($this->ch, CURLOPT_URL, $resourceUrl);
        curl_setopt($this->ch, CURLOPT_HEADER, true);
        curl_setopt($this->ch, CURLOPT_NOBODY, true);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($this->ch);

        if(curl_errno($this->ch))
            return curl_error($this->ch);

        return $res;
    }


    public function close()
    {
        curl_close($this->ch);
    }
}