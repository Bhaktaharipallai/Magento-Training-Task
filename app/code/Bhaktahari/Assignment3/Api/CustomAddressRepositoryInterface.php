<?php
namespace Bhaktahari\Assignment3\Api;

use Magento\Framework\Api\SearchResultsInterface;

interface CustomAddressRepositoryInterface
{
    /**
     * Get entity by Id
     *
     * @param string $addressId
     * @return \Bhaktahari\Assignment3\Api\Data\CustomAddressEntityInterface;
     */
    public function getById(string $addressId);

    /**
     * @param string $addressId
     *
     * @return \Bhaktahari\Assignment3\Api\Data\CustomAddressEntityInterface;
     */
    public function getAddressById(string $addressId);
    /**
     * Get List
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}
