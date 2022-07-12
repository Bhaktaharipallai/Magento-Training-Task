<?php
namespace Bhaktahari\Assignment3\Api;

interface CustomAddressRepositoryInterface
{
    /**
     * Get entity by Id
     *
     * @param string $entityId
     * @return \Bhaktahari\Assignment3\Api\Data\CustomAddressEntityInterface;
     */
    public function getById(string $entityId);

    /**
     * @param string $addressId
     *
     * @return \Bhaktahari\Assignment3\Api\Data\CustomAddressEntityInterface;
     */
    public function getAddressById(string $addressId);
}
