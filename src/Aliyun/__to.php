<?php
namespace xltxlm\aliyunosscdn\Aliyun;


/**
 * Aliyun通用配置属性;
*/
Trait __to{
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

}