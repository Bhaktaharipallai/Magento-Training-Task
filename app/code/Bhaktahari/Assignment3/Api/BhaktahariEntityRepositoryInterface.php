<?php
namespace Bhaktahari\Assignment3\Api;

use Bhaktahari\Assignment3\Model\BhaktahariEntity;

interface BhaktahariEntityRepositoryInterface
{
    /**
     * Get entit by Id
     *
     * @param string $entityId
     * @return BhaktahariEntity
     */
    public function getById($entityId);
}
