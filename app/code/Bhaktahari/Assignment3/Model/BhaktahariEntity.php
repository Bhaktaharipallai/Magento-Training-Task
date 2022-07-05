<?php

namespace Bhaktahari\Assignment3\Model;

use Bhaktahari\Assignment3\Api\Data\BhaktahariEntityInterface;
use Magento\Framework\Model\AbstractModel;
use Bhaktahari\Assignment3\Model\ResourceModel\BhaktahariEntity as ResourceModel;

class BhaktahariEntity extends AbstractModel implements BhaktahariEntityInterface
{
    /**
     * @inheritdoc
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }
    /**
     * Get Age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->getData(self::AGE);
    }

    /**
     * Get Company Name
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->getData(self::COMPANY);
    }

    /**
     * Get Height
     *
     * @return float
     */
    public function getHeighth()
    {
         return $this->getData(self::HEIGHT);
    }

    /**
     * Get CompanyTiming
     *
     * @return string
     */
    public function getCompanyTiming()
    {
        return $this->getData(self::COMPANYTIMING);
    }
}
