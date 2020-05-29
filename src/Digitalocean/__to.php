<?php

namespace xltxlm\aliyunosscdn\Digitalocean;


/**
 * 基础配置信息;
 */
Trait __to
{
    use __to\__to_implements;

    /**
     * @param string $remote_path ;
     * @return $this
     */
    public function setremote_path(string $remote_path = "")
    {
        $this->remote_path = (ltrim($remote_path, '/'));
        return $this;
    }



    protected function Real_getAWSclient(): \Aws\S3\S3Client
    {
        //Only pulled if an AWS class doesn't already exist.
        $endpoint = "https://" . $this->getspaceName() . "." . $this->getregion() . "." . $this->gethost();
        $awsconfig = array(
            'region' => $this->getregion(),
            'version' => 'latest',
            'endpoint' => $endpoint,
            'credentials' => array(
                'key' => $this->getaccess_key(),
                'secret' => $this->getsecret_key(),
            ),
            'bucket_endpoint' => true,
            'signature_version' => 'v4-unsigned-body'
        );
        return new \Aws\S3\S3Client($awsconfig);
    }


}