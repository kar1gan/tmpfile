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
        
        echo 'путь до временного файла - ' . stream_get_meta_data($tmp)['uri'];
        
        fwrite($tmp, 'test');

        return $tmp;
    }

    public function read($file): void {
        fseek($file, 0);

        echo fread($file, 1024) . PHP_EOL;
    }
}

(new TmpFile())->run();
