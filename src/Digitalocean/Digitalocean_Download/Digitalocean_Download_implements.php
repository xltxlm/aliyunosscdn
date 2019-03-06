<?php
namespace xltxlm\aliyunosscdn\Digitalocean\Digitalocean_Download;

use \xltxlm\aliyunosscdn\Digitalocean\__to;
/**
 * :类;
 * 下载文件;
*/
abstract class Digitalocean_Download_implements
{

    use __to;

/**
*  执行下载逻辑;
*  @return :\Aws\Result;
*/
abstract public function __invoke():\Aws\Result;
}