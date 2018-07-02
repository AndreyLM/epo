<?php
set_time_limit(3600);

use EpoDownloaderManager\Adapters\EpoHttpAdapter;
use EpoDownloaderManager\EpoDownloaderManager;

require_once __DIR__.'/EpoDownloaderManager/EpoDownloaderManager.php';
require_once __DIR__.'/EpoDownloaderManager/Adapters/EpoHttpAdapter.php';

$manager = new EpoDownloaderManager(new EpoHttpAdapter());
$manager->connect();
$manager->getResource('https://publication.epo.org/raw-data/download/files/2017/12/22/1513936752381/EBD_1749.zip',
    '/1.zip');
$manager->getResource('https://publication.epo.org/raw-data/download/files/2017/12/22/1513936752381/EBD_1749.zip',
    '/2.zip');