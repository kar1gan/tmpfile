<?php

class TmpFile
{
    public function run(): void {
        $file = $this->write();
        $this->read($file);
        fclose($file);
    }

    public function write() {
        $tmp = tmpfile();
        fwrite($tmp, 'test');

        return $tmp;
    }

    public function read($file): void {
        fseek($file, 0);

        echo fread($file, 1024) . PHP_EOL;
    }
}

(new TmpFile())->run();