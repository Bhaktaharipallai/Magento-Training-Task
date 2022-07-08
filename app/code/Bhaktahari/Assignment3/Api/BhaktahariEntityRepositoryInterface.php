<?php
namespace Bhaktahari\Assignment3\Api;

use Bhaktahari\Assignment3\Model\BhaktahariEntity;
use Bhaktahari\Assignment3\Model\ResourceModel\BhaktahariCollection\Collection;

interface BhaktahariEntityRepositoryInterface
{
    /**
     * Get entit by Id
     *
     * @param string $entityId
     * @return BhaktahariEntity
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
}
