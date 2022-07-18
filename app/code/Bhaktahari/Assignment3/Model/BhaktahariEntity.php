<?php

namespace Bhaktahari\Assignment3\Model;

use Bhaktahari\Assignment3\Api\Data\BhaktahariEntityInterface;
use Magento\Framework\Api\ExtensionAttributesInterface;
use Magento\Framework\Model\AbstractExtensibleModel;
use Bhaktahari\Assignment3\Model\ResourceModel\BhaktahariEntity as ResourceModel;

class BhaktahariEntity extends AbstractExtensibleModel implements BhaktahariEntityInterface
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
     * Set Name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
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
     * Set Age
     *
     * @param int $age
     * @return $this
     */
    public function setAge($age)
    {
        return $this->setData(self::AGE, $age);
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
     * @param string $company
     * @return BhaktahariEntity|string
     */
    public function setCompany($company)
    {
        return $this->setData(self::COMPANY, $company);
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
     * @param $height
     * @return BhaktahariEntity|mixed
     */
    public function setHeight($height)
    {
         return $this->setData(self::HEIGHT, $height);
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

    /**
     * @param $companyTiming
     * @return BhaktahariEntity|mixed
     */
    public function setCompanyTiming($companyTiming)
    {
        return $this->setData(self::COMPANYTIMING, $companyTiming);
    }

    /**
     * @return ExtensionAttributesInterface
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @param BhaktahariEntityExtensionInterface $extensionAttributes
     * @return BhaktahariEntity
     */
    public function setExtensionAttributes(
        BhaktahariEntityExtensionInterface|
        \Bhaktahari\Assignment3\Api\Data\BhaktahariEntityExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
