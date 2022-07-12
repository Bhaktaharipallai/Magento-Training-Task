<?php
namespace Bhaktahari\Assignment3\Model\ResourceModel\BhaktahariCollection;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Bhaktahari\Assignment3\Model\CustomAddressEntity as Model;
use Bhaktahari\Assignment3\Model\ResourceModel\CustomAddressEntity as ResourceModel;

class AddressCollection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
