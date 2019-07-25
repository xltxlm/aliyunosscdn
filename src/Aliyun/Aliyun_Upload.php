<?php

namespace xltxlm\aliyunosscdn\Aliyun;

use OSS\OssClient;


/**
 * 阿里云oss上传文件;
 */
class Aliyun_Upload extends Aliyun_Upload\Aliyun_Upload_implements
{
    public function __invoke()
    {
        //第一部分：上传文件
        (new OssClient($this->getOssaccessKeyId(), $this->getOssaccessKeySecret(), $this->getOssendpoint(), false))
            ->uploadFile($this->getBucket(), $this->getremote_path(), $this->getlocal_path(), [OssClient::OSS_CHECK_MD5 => true]);
    }


}