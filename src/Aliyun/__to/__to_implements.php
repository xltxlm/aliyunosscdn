<?php
namespace xltxlm\aliyunosscdn\Aliyun\__to;

/**
 * :Trait;
 * Aliyun通用配置属性;
*/
Trait __to_implements
{


/* @var string   */
    protected $OssaccessKeyId = '';





    /**
    * @return string;
    */
            public function getOssaccessKeyId():string        {
                return $this->OssaccessKeyId;
        }

    
    




/**
* @param string $OssaccessKeyId;
* @return $this
*/
    public function setOssaccessKeyId(string $OssaccessKeyId  = "")
    {
    $this->OssaccessKeyId = $OssaccessKeyId;
    return $this;
    }



/* @var string   */
    protected $OssaccessKeySecret = '';





    /**
    * @return string;
    */
            public function getOssaccessKeySecret():string        {
                return $this->OssaccessKeySecret;
        }

    
    




/**
* @param string $OssaccessKeySecret;
* @return $this
*/
    public function setOssaccessKeySecret(string $OssaccessKeySecret  = "")
    {
    $this->OssaccessKeySecret = $OssaccessKeySecret;
    return $this;
    }



/* @var string   */
    protected $Ossendpoint = '';





    /**
    * @return string;
    */
            public function getOssendpoint():string        {
                return $this->Ossendpoint;
        }

    
    




/**
* @param string $Ossendpoint;
* @return $this
*/
    public function setOssendpoint(string $Ossendpoint  = "")
    {
    $this->Ossendpoint = $Ossendpoint;
    return $this;
    }



/* @var string   */
    protected $Bucket = '';





    /**
    * @return string;
    */
            public function getBucket():string        {
                return $this->Bucket;
        }

    
    




/**
* @param string $Bucket;
* @return $this
*/
    public function setBucket(string $Bucket  = "")
    {
    $this->Bucket = $Bucket;
    return $this;
    }



/* @var string  远程路径,设置的时候,去掉第一个/ */
    protected $remote_path = '';





    /**
    * @return string;
    */
            public function getremote_path():string        {
                return $this->remote_path;
        }

    
    




/**
* @param string $remote_path;
* @return $this
*/
    abstract public function setremote_path(string $remote_path  = "");



/* @var string  本地文件的路径 */
    protected $local_path = '';





    /**
    * @return string;
    */
            public function getlocal_path():string        {
                return $this->local_path;
        }

    
    




/**
* @param string $local_path;
* @return $this
*/
    public function setlocal_path(string $local_path  = "")
    {
    $this->local_path = $local_path;
    return $this;
    }



/* @var \OSS\OssClient  获取Oss的链接客户端,然后可以调取其他sdk接口 */
    protected $client;





    /**
    * @return \OSS\OssClient;
    */
            public function getclient():\OSS\OssClient        {
                return $this->client;
        }

    
    




/**
* @param \OSS\OssClient $client;
* @return $this
*/
    public function setclient(\OSS\OssClient $client )
    {
    $this->client = $client;
    return $this;
    }



}