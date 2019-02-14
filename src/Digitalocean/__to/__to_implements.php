<?php
namespace xltxlm\aliyunosscdn\Digitalocean\__to;

/**
 * :Trait;
 * 基础配置信息;
*/
Trait __to_implements
{


/* @var string   */
    protected $access_key = '';





    /**
    * @return string;
    */
            public function getaccess_key():string        {
                return $this->access_key;
        }

    
    




/**
* @param string $access_key;
* @return $this
*/
    public function setaccess_key(string $access_key  = "")
    {
    $this->access_key = $access_key;
    return $this;
    }



/* @var string   */
    protected $secret_key = '';





    /**
    * @return string;
    */
            public function getsecret_key():string        {
                return $this->secret_key;
        }

    
    




/**
* @param string $secret_key;
* @return $this
*/
    public function setsecret_key(string $secret_key  = "")
    {
    $this->secret_key = $secret_key;
    return $this;
    }



/* @var string   */
    protected $spaceName = '';





    /**
    * @return string;
    */
            public function getspaceName():string        {
                return $this->spaceName;
        }

    
    




/**
* @param string $spaceName;
* @return $this
*/
    public function setspaceName(string $spaceName  = "")
    {
    $this->spaceName = $spaceName;
    return $this;
    }



/* @var string   */
    protected $region = 'nyc3';





    /**
    * @return string;
    */
            public function getregion():string        {
                return $this->region;
        }

    
    




/**
* @param string $region;
* @return $this
*/
    public function setregion(string $region  = "nyc3")
    {
    $this->region = $region;
    return $this;
    }



/* @var string   */
    protected $host = 'digitaloceanspaces.com';





    /**
    * @return string;
    */
            public function gethost():string        {
                return $this->host;
        }

    
    




/**
* @param string $host;
* @return $this
*/
    public function sethost(string $host  = "digitaloceanspaces.com")
    {
    $this->host = $host;
    return $this;
    }



/* @var \Aws\S3\S3Client  生成的句柄 */
    protected $AWSclient;




    protected $cached_AWSclient = false;
    /**
    * @return \Aws\S3\S3Client;
    */
    abstract protected function Real_getAWSclient():\Aws\S3\S3Client;

    /**
    * @return \Aws\S3\S3Client;
    */
    public final function getAWSclient(bool $清除缓存 = false ):\Aws\S3\S3Client    {
    if($this->cached_AWSclient === false || $清除缓存===true)
    {
    $this->cached_AWSclient = $this->Real_getAWSclient();
    }
    return $this->cached_AWSclient;
    }





/**
* @param \Aws\S3\S3Client $AWSclient;
* @return $this
*/
    public function setAWSclient(\Aws\S3\S3Client $AWSclient )
    {
    $this->AWSclient = $AWSclient;
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



}