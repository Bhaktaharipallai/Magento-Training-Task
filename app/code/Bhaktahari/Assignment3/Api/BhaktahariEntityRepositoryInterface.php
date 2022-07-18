<?php
namespace Bhaktahari\Assignment3\Api;

use Bhaktahari\Assignment3\Api\Data\BhaktahariEntityInterface;
use Bhaktahari\Assignment3\Model\BhaktahariEntity;
use Magento\Framework\Api\SearchCriteriaInterface;
use Bhaktahari\Assignment3\Model\ResourceModel\BhaktahariCollection\Collection;

interface BhaktahariEntityRepositoryInterface
{
    /**
     * Get entit by Id
     *
     * @param string $entityId
     * @return \Bhaktahari\Assignment3\Api\Data\BhaktahariEntityInterface;
     */
    public function getById($entityId);

    /**
     * Get Collection
     *
     * @return Collection
     */
    public function getCollection();

    /**
     * Get MultiData
     *
     * @return mixed
     */
    public function getMultiData();
    /**
     * Save
     *
     * @param BhaktahariEntityInterface $entity
     * @return boolean
     */
    public function save(BhaktahariEntityInterface $entity);
    /**
     * Get list
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Bhaktahari\Assignment3\Api\Data\BhaktahariEntitySearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
