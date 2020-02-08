<?php namespace App\Services;
use Illuminate\Support\Facades\Log;

/*   Logger class  */
class Logger
{
    public function __construct($path=null)
    {
        $this->path = is_null($path) ? env('DEFAULT_LOG_PATH') : $path;
    }

    public function log($type, $text = '', $timestamp = true)
    {
        if ($timestamp) {
            $datetime = date("d-m-Y H:i:s");
            $text = "$datetime, $type: $text \r\n\r\n";
        } else {
            $text = "$type\r\n\r\n";

        }
        error_log($text, 3, $this->path);
    }

}
