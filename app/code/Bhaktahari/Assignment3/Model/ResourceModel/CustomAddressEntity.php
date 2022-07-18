<?php

namespace Bhaktahari\Assignment3\Model\ResourceModel;

use Bhaktahari\Assignment3\Model\BhaktahariEntityFactory as BhaktahariEntityFactory;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomAddressEntity extends AbstractDb
{
    protected function _construct(): void
    {
        $this->_init('bhaktahari_address', 'address_id');
    }
}
