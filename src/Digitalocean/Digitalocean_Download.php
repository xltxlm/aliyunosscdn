<?php

namespace xltxlm\aliyunosscdn\Digitalocean;

use \xltxlm\aliyunosscdn\Digitalocean\__to;

/**
 * 下载文件;
 */
class Digitalocean_Download extends Digitalocean_Download\Digitalocean_Download_implements
{
    public function __invoke(): \Aws\Result
    {
        $client = $this->getAWSclient();
        $result = $client->getObject(array(
            'Bucket' => $this->getspaceName(),
            'Key' => $this->getremote_path(),
            'SaveAs' => $this->getlocal_path()
        ));
        return $result;
    }


}