<?php

interface ArchiveStrategy{
    public function run($file);
}


class RarArchiveStrategy implements ArchiveStrategy {

    public function run($file){
        echo "run rar archive " . $file;
    }
}

class ZipArchiveStrategy implements ArchiveStrategy {

    public function run($file){
        echo "run zip archive " . $file;
    }
}

class Archive {

    /** @var ArchiveStrategy  */
    private $strategy;

    /**
     * Archive constructor.
     * @param $strategy
     */
    public function __construct(ArchiveStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function execute($file){
        $this->strategy->run($file);
    }
}


$archive = new Archive(
    new ZipArchiveStrategy()
);

$archive->execute('file.txt');



