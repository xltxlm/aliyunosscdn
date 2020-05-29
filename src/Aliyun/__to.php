<?php

namespace xltxlm\aliyunosscdn\Aliyun;


use OSS\OssClient;

/**
 * Aliyun通用配置属性;
 */
Trait __to
{
    use __to\__to_implements;


    public function getclient(): \OSS\OssClient
    {
        return (new OssClient($this->getOssaccessKeyId(), $this->getOssaccessKeySecret(), $this->getOssendpoint(), false));
    }


    /**
     * @param string $remote_path ;
     * @return $this
     */
    public function setremote_path(string $remote_path = "")
    {
        $this->remote_path = (ltrim($remote_path, '/'));
        return $this;
    }

}