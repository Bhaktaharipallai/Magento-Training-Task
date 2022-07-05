<?php
namespace Bhaktahari\Assignment3\Model;

use Bhaktahari\Assignment3\Api\BhaktahariEntityRepositoryInterface;
use Bhaktahari\Assignment3\Model\ResourceModel\BhaktahariEntity as ResourceModel;
use Bhaktahari\Assignment3\Model\BhaktahariEntityFactory as  BhaktahariEntityFactory;

class BhaktahariEntityRepository implements BhaktahariEntityRepositoryInterface
{
    /**
     * @var ResourceModel
     */
    private ResourceModel $resourceModel;
    /**
     * @var \Bhaktahari\Assignment3\Model\BhaktahariEntityFactory
     */
    private BhaktahariEntityFactory $entityFactory;

    /**
     * BhaktahariEntityRepository constructor.
     * @param ResourceModel $resourceModel
     * @param \Bhaktahari\Assignment3\Model\BhaktahariEntityFactory $entityFactory
     */
    public function __construct(
        ResourceModel $resourceModel,
        BhaktahariEntityFactory $entityFactory
    ) {
        $this->resourceModel = $resourceModel;
        $this->entityFactory = $entityFactory;
    }

    /**
     * @param string $entityId
     * @return BhaktahariEntity
     */
    public function getById($entityId)
    {
        $entity = $this->entityFactory->create();
        $this->resourceModel->load($entity, $entityId);
        return $entity;
    }
}
