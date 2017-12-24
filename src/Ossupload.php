<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/12/24
 * Time: 18:22
 */

namespace xltxlm\aliyunosscdn;

use DefaultAcsClient;
use DefaultProfile;
use OSS\OssClient;
use Cdn\Request\V20141111 as Cdn;

/**
 * 上传文件到oss，同时刷新cdn地址
 * Class Ossupload
 * @package xltxlm\aliyunosscdn
 */
class Ossupload
{
    //oss配置
    protected $ossaccessKeyId, $ossaccessKeySecret, $ossendpoint;
    //cdn配置
    protected $cdnregionId, $cdnaccessKeyId, $cdnaccessSecret, $cdndomain;

    /** @var string 本地需要上传的文件路径 */
    protected $localfilepath = '';

    protected $bucket = '';
    /** @var string 相对路径,不能带"/"作为前缀 */
    protected $cdnOrOsspath = '';

    /**
     * @return mixed
     */
    public function getCdndomain()
    {
        return $this->cdndomain;
    }

    /**
     * @param mixed $cdndomain
     * @return Ossupload
     */
    public function setCdndomain($cdndomain)
    {
        $this->cdndomain = $cdndomain;
        return $this;
    }


    /**
     * @return string
     */
    public function getBucket()
    {
        return $this->bucket;
    }

    /**
     * @param string $bucket
     * @return Ossupload
     */
    public function setBucket($bucket)
    {
        $this->bucket = $bucket;
        return $this;
    }

    /**
     * @return string
     */
    public function getCdnOrOsspath()
    {
        return $this->cdnOrOsspath;
    }

    /**
     * @param string $cdnOrOsspath
     * @return Ossupload
     */
    public function setCdnOrOsspath($cdnOrOsspath)
    {
        //确保传递进来的路径不是以“/”作为前缀
        if ($cdnOrOsspath[0] == '/') {
            $cdnOrOsspath = trim($cdnOrOsspath, '/');
        }
        $this->cdnOrOsspath = $cdnOrOsspath;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getOssaccessKeyId()
    {
        return $this->ossaccessKeyId;
    }

    /**
     * @param mixed $ossaccessKeyId
     * @return Ossupload
     */
    public function setOssaccessKeyId($ossaccessKeyId)
    {
        $this->ossaccessKeyId = $ossaccessKeyId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOssaccessKeySecret()
    {
        return $this->ossaccessKeySecret;
    }

    /**
     * @param mixed $ossaccessKeySecret
     * @return Ossupload
     */
    public function setOssaccessKeySecret($ossaccessKeySecret)
    {
        $this->ossaccessKeySecret = $ossaccessKeySecret;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOssendpoint()
    {
        return $this->ossendpoint;
    }

    /**
     * @param mixed $ossendpoint
     * @return Ossupload
     */
    public function setOssendpoint($ossendpoint)
    {
        $this->ossendpoint = $ossendpoint;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCdnregionId()
    {
        return $this->cdnregionId;
    }

    /**
     * @param mixed $cdnregionId
     * @return Ossupload
     */
    public function setCdnregionId($cdnregionId)
    {
        $this->cdnregionId = $cdnregionId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCdnaccessKeyId()
    {
        return $this->cdnaccessKeyId;
    }

    /**
     * @param mixed $cdnaccessKeyId
     * @return Ossupload
     */
    public function setCdnaccessKeyId($cdnaccessKeyId)
    {
        $this->cdnaccessKeyId = $cdnaccessKeyId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCdnaccessSecret()
    {
        return $this->cdnaccessSecret;
    }

    /**
     * @param mixed $cdnaccessSecret
     * @return Ossupload
     */
    public function setCdnaccessSecret($cdnaccessSecret)
    {
        $this->cdnaccessSecret = $cdnaccessSecret;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocalfilepath()
    {
        return $this->localfilepath;
    }

    /**
     * @param string $localfilepath
     * @return Ossupload
     */
    public function setLocalfilepath($localfilepath)
    {
        $this->localfilepath = $localfilepath;
        return $this;
    }


    /**
     * 上传文件，并且刷新cdn
     * @return string
     * @throws \OSS\Core\OssException
     */
    public function __invoke()
    {
        //第一部分：上传文件
        $ossClient = new OssClient('LTAI9IblEPRva27b', 'NzIf4mWpKtNBq2IWJK2JNKtFeYrTx4', 'http://oss-cn-beijing.aliyuncs.com', false);
        $ossClient->uploadFile($this->getBucket(), $this->getCdnOrOsspath(), $this->getLocalfilepath());
        $picurl = "{$this->getCdndomain()}{$this->getCdnOrOsspath()}";

        //第二部分：刷新cdn
        if ($this->getCdnregionId()) {
            //上传完毕之后，刷新cdn
            require __DIR__ . '/../aliyun-openapi-php-sdk/aliyun-php-sdk-core/Config.php';

            $iClientProfile = DefaultProfile::getProfile($this->getCdnregionId(), $this->getCdnaccessKeyId(), $this->getCdnaccessSecret());
            $client = new DefaultAcsClient($iClientProfile);


            //设置参数
            $request = new Cdn\RefreshObjectCachesRequest();
            $request->setObjectPath($picurl);
            $request->setObjectType('File');
            // 发起请求
            $client->getAcsResponse($request);
        }
        return $picurl;
    }
}