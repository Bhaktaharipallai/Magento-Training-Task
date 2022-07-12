<?php
namespace Bhaktahari\Assignment3\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface CustomAddressEntityInterface extends ExtensibleDataInterface
{
    public const ID = 'address_id';
    public const ENTITY_ID = 'entity_id';
    public const COUNTRY = 'country';
    public const CITY = 'city';
    public const STATE = 'state';
    public const PHONE = 'phone';
    public const IS_COUSTOMER = 'is_coustomer';

    /**
     * Get Entity Id
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Set the ENTITY Id
     *
     * @param $entityId
     * @return int
     */
    public function setEntityId($entityId);

    /**
     * Get the country
     *
     * @return String
     */
    public function getCountry();

    /**
     * Set the Country
     *
     * @param $country
     * @return String
     */
    public function setCountry($country);

    /**
     * Get the State
     *
     * @return String
     */
    public function getState();

    /**
     * Set the State
     *
     * @param $state
     * @return String
     */
    public function setState($state);

    /**
     * Get PhoneNumber
     *
     * @return String
     */
    public function getPhone();

    /**
     * Set PhoneNumber
     *
     * @param $phone
     * @return String
     */
    public function setPhone($phone);
    /**
     * @return \Bhaktahari\Assignment3\Api\Data\CustomAddressEntityExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * @param \Bhaktahari\Assignment3\Api\Data\CustomAddressEntityExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Bhaktahari\Assignment3\Api\Data\CustomAddressEntityExtensionInterface
                                           $extensionAttributes);
}
