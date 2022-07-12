<?php
namespace Bhaktahari\Assignment3\Model;

use Bhaktahari\Assignment3\Api\CustomAddressRepositoryInterface;
use Bhaktahari\Assignment3\Api\Data\BhaktahariEntityInterface;
use Bhaktahari\Assignment3\Api\Data\CustomAddressEntityInterface;
use Bhaktahari\Assignment3\Model\ResourceModel\BhaktahariCollection\AddressCollection;
use Bhaktahari\Assignment3\Model\ResourceModel\CustomAddressEntity as ResourceModel;
use Bhaktahari\Assignment3\Model\CustomAddressEntityFactory as CustomAddressEntityFactory;

class CustomAddressEntityRepository implements CustomAddressRepositoryInterface
{
    /**
     * @var ResourceModel
     */
    private ResourceModel $resourceModel;
    /**
     * @var \Bhaktahari\Assignment3\Model\CustomAddressEntityFactory
     */
    private CustomAddressEntityFactory $entityFactory;
    /**
     * @var AddressCollection
     */
    private AddressCollection $collection;

    /**
     * CustomAddressEntityRepository constructor.
     *
     * @param ResourceModel $resourceModel
     * @param \Bhaktahari\Assignment3\Model\CustomAddressEntityFactory $entityFactory
     */
    public function __construct(
        ResourceModel $resourceModel,
        CustomAddressEntityFactory $entityFactory,
        AddressCollection $collection
    ) {
        $this->resourceModel = $resourceModel;
        $this->entityFactory = $entityFactory;
        $this->collection = $collection;
    }

    /**
     * @param string $entityId
     *
     * @return CustomAddressEntityInterface
     */
    public function getById(string $entityId)
    {
        $entity = $this->entityFactory->create();
        $this->resourceModel->load($entity, $entityId);
        return $entity;
    }

    /**
     * @param $addressId
     *
     * @return CustomAddressEntityInterface
     */
    public function getAddressById($addressId)
    {
        $address = $this->entityFactory->create();
        $this->resourceModel->load($address, $addressId);
        return $address;
    }

    /**
     * @param $entityId
     * @return array
     */
    public function getEntityAddress($entityId)
    {
        return $this->collection->addFieldToFilter('entity_id', $entityId)->getData();
    }
}
