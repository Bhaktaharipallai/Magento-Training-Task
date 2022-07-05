<?php

namespace Bhaktahari\Assignment3\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class BhaktahariEntity extends AbstractDb
{
    protected function _construct(): void
    {
        $this->_init('bhaktahari_entity', 'entity_id');
    }
}
