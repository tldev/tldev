<?php

namespace Application\Service;

use League\Flysystem\FilesystemInterface;
use Zend\Http\Headers;
use Zend\Http\Response\Stream;

/**
 * Class ResumeDownload
 *
 * @package Application\Service
 */
class ResumeDownload
{

    protected $filesystem;

    protected $default_filename;

    protected $enabled_exts = array(
        'txt',
        'pdf',
        'docx'
    );

    public function __construct(FilesystemInterface $filesystem, $default_filename)
    {
        if (!$default_filename) {
            throw new \Exception('default filename required!');
        }
        $this->default_filename = $default_filename;
        $this->filesystem       = $filesystem;
    }

    /**
     * @param $ext
     * @return array|false|null
     */
    public function getStream($ext)
    {
        if (!in_array($ext, $this->enabled_exts)) {
            return null;
        }
        $stream = null;
        $file   = "{$this->default_filename}.{$ext}";
        if ($this->filesystem->has($file)) {
            $file_stream = $this->filesystem->readStream($file);
            $stream      = new Stream();
            $stream->setStream($file_stream);
            $headers = new Headers();
            $headers->addHeaders(
                    array(
                        'Content-Disposition' => 'attachment; filename="' . basename($file) . '"',
                        'Content-Type'        => 'application/octet-stream',
                        'Content-Length'      => $this->filesystem->getSize($file)
                    )
            );
            $stream->setHeaders($headers);
        }

        return $stream;
    }
} 
