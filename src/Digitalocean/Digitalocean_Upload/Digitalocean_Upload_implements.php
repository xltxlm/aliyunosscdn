<?php
namespace xltxlm\aliyunosscdn\Digitalocean\Digitalocean_Upload;

use \xltxlm\aliyunosscdn\Digitalocean\__to;
/**
 * :类;
 * 上传文件;
*/
abstract class Digitalocean_Upload_implements
{

    use __to;

/**
*  上传文件;
*  @return :\Aws\Result;
*/
abstract public function __invoke():\Aws\Result;
}