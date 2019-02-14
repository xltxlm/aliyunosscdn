<?php

namespace xltxlm\aliyunosscdn\Digitalocean;


/**
 * 上传文件;
 */
class Digitalocean_Upload extends Digitalocean_Upload\Digitalocean_Upload_implements
{
    public function __invoke(): \Aws\Result
    {
        $client = $this->getAWSclient();

        $access = "public-read";
        $file = fopen($this->getlocal_path(), 'r+');
        $args = array(
            'Bucket' => $this->getspaceName(),
            'Key' => $this->getremote_path(),
            'Body' => $file,
            'ACL' => $access,
            'ContentType' => mime_content_type($this->getlocal_path())
        );
        try {
            $result = $client->putObject($args);
        } catch (\Exception $e) {
            p([$this->getremote_path(), $this->getremote_path(), $args]);
            throw $e;
        }
        $client->waitUntil('ObjectExists', array(
            'Bucket' => $this->getspaceName(),
            'Key' => $this->getremote_path()
        ));
        return $result;
    }


}