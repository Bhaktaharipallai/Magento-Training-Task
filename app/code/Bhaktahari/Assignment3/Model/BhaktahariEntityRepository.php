<?php
namespace Bhaktahari\Assignment3\Model;

use Bhaktahari\Assignment3\Api\BhaktahariEntityRepositoryInterface;
use Bhaktahari\Assignment3\Model\ResourceModel\BhaktahariEntity as ResourceModel;
use Bhaktahari\Assignment3\Model\BhaktahariEntityFactory as  BhaktahariEntityFactory;
use Bhaktahari\Assignment3\Model\BhaktahariEntity as BhaktahariModel;
use Bhaktahari\Assignment3\Model\ResourceModel\BhaktahariCollection\Collection as Collection;
use Magento\Framework\App\ResourceConnection;

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
     * @var BhaktahariEntity
     */
    private BhaktahariModel $bhaktahariModel;
    /**
     * @var Collection
     */
    private Collection $collection;
    /**
     * @var ResourceConnection
     */
    private ResourceConnection $resourceConnection;

    /**
     * BhaktahariEntityRepository constructor.
     * @param ResourceModel $resourceModel
     * @param \Bhaktahari\Assignment3\Model\BhaktahariEntityFactory $entityFactory
     * @param BhaktahariEntity $bhaktahariModel
     * @param Collection $collection
     * @param ResourceConnection $connection
     */
    public function __construct(
        ResourceModel $resourceModel,
        BhaktahariEntityFactory $entityFactory,
        BhaktahariModel $bhaktahariModel,
        Collection $collection,
        ResourceConnection $connection
    ) {
        $this->resourceModel = $resourceModel;
        $this->entityFactory = $entityFactory;
        $this->bhaktahariModel = $bhaktahariModel;
        $this->collection = $collection;
        $this->resourceConnection  = $connection;
    }

    /**
     * @param string $entityId
     * @return  \Bhaktahari\Assignment3\Api\Data\BhaktahariEntityInterface;
     */
    public function getById($entityId)
    {

        //$entity = $this->bhaktahariModel;
        $entity = $this->entityFactory->create();
        $this->resourceModel->load($entity, $entityId);
        return $entity;
//        $connection  = $this->resourceConnection->getConnection();
//        $tableName = $connection->getTableName('bhaktahari_entity');
//        $query = $connection->select()
//            ->from(['entity' => $tableName])
//            ->join(
//                ['address' => 'bhaktahari_address'],
//                'entity.entity_id = address.entity_id'
//            )
//            ->where('entity.entity_id = ?', $entityId);
//        $fetchData = $connection-> fetchAll($query);
//
//        return $fetchData;
    }

    /**
     * Get Collection
     *
     * @return Collection
     */
    public function getCollection()
    {
        return $bhaktahariCollection = $this->collection->load();
    }

    public function getMultiData()
    {
        $connection  = $this->resourceConnection->getConnection();
        $tableName = $connection->getTableName('bhaktahari_entity');
        $query = $connection->select()
            ->from($tableName)
            ->where('entity_id IN (?)', [9,10]);

        $fetchData = $connection-> fetchAll($query);
        return $fetchData;
    }
}
