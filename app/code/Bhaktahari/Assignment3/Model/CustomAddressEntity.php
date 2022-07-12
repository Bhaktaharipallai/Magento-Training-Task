<?php
namespace Bhaktahari\Assignment3\Model;

use Bhaktahari\Assignment3\Api\Data\CustomAddressEntityExtensionInterface;
use Bhaktahari\Assignment3\Api\Data\CustomAddressEntityInterface;
use Bhaktahari\Assignment3\Api\Data\BhaktahariEntityExtensionInterface ;
use Bhaktahari\Assignment3\Model\ResourceModel\CustomAddressEntity as ResourceModel;
use Magento\Framework\Api\ExtensionAttributesInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class CustomAddressEntity extends AbstractExtensibleModel implements CustomAddressEntityInterface
{
    /**
     * @inheritdoc
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @return int|mixed|null
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * @param int $entityId
     * @return CustomAddressEntity|int
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * @return mixed|String|null
     */
    public function getCountry()
    {
        return $this->getData(self::COUNTRY);
    }

    /**
     * @param $country
     * @return CustomAddressEntity|String
     */
    public function setCountry($country)
    {
        return $this->setData(self::COUNTRY, $country);
    }

    /**
     * @return mixed|String|null
     */
    public function getState()
    {
        return $this->getData(self::STATE);
    }

    /**
     * @param $state
     * @return CustomAddressEntity|String
     */
    public function setState($state)
    {
        return $this->setData(self::STATE, $state);
    }

    /**
     * @return mixed|String|null
     */
    public function getPhone()
    {
        return $this->getData(self::PHONE);
    }

    /**
     * @param $phone
     * @return CustomAddressEntity|String
     */
    public function setPhone($phone)
    {
        return $this->setData(self::PHONE, $phone);
    }

    /**
     * @return ExtensionAttributesInterface
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @param CustomAddressEntityExtensionInterface $extensionAttributes
     * @return CustomAddressEntity
     */
    public function setExtensionAttributes(
        CustomAddressEntityExtensionInterface
        $extensionAttributes
    ) {
         return $this->_setExtensionAttributes($extensionAttributes);
    }
}
