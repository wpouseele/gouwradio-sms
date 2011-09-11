<?php
namespace My\Doctrine\Common\Cache;

use \Doctrine\Common\Cache\AbstractCache;

/**
 * Description of EacceleratorCache
 *
 * @author Costin
 */
class EacceleratorCache extends AbstractCache
{
    /**
     * {@inheritdoc}
     */
    protected function _doFetch($id)
    {
        $ret = eaccelerator_get($id);
        return is_null($ret) ? FALSE : unserialize($ret);
    }

    /**
     * {@inheritdoc}
     */
    protected function _doContains($id)
    {
        return eaccelerator_get($id) ? TRUE : FALSE;
    }

    /**
     * {@inheritdoc}
     */
    protected function _doSave($id, $data, $lifeTime = 0)
    {
        return eaccelerator_put($id, serialize($data), (int)$lifeTime);
    }

    /**
     * {@inheritdoc}
     */
    protected function _doDelete($id)
    {
        return eaccelerator_rm($id);
    }

    /**
     * {@inheritdoc}
     */
    public function getIds()
    {
        return eaccelerator_list_keys();
    }
}
?>
