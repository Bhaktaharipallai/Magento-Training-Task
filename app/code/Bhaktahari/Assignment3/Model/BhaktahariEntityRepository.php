<?php
namespace Bhaktahari\Assignment3\Model;

use Bhaktahari\Assignment3\Api\BhaktahariEntityRepositoryInterface;
use Bhaktahari\Assignment3\Api\Data\BhaktahariEntityInterface;
use Bhaktahari\Assignment3\Api\Data\BhaktahariEntitySearchResultInterface;
use Bhaktahari\Assignment3\Model\ResourceModel\BhaktahariEntity as ResourceModel;
use Bhaktahari\Assignment3\Model\BhaktahariEntityFactory as  BhaktahariEntityFactory;
use Bhaktahari\Assignment3\Model\BhaktahariEntity as BhaktahariModel;
use Bhaktahari\Assignment3\Model\ResourceModel\BhaktahariCollection\Collection as Collection;
use Bhaktahari\Assignment3\Model\ResourceModel\BhaktahariCollection\CollectionFactory as CollectionFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Bhaktahari\Assignment3\Api\Data\BhaktahariEntitySearchResultInterfaceFactory;
use Bhaktahari\Assignment3\Model\CustomAddressEntityRepository as CustomAddressEntityRepository;

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
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;
    /**
     * @var BhaktahariEntitySearchResultInterfaceFactory
     */
    private BhaktahariEntitySearchResultInterfaceFactory $entitySearchResultFactory;
    /**
     * @var \Bhaktahari\Assignment3\Model\CustomAddressEntityRepository
     */
    private CustomAddressEntityRepository $customAddressEntityRepository;
    /**
     * @var CollectionFactory
     */
    private CollectionFactory $collectionFactory;
    /**
     * @var ResourceModel
     */
    private ResourceModel $resouceModel;

    /**
     * BhaktahariEntityRepository constructor.
     * @param ResourceModel $resourceModel
     * @param \Bhaktahari\Assignment3\Model\BhaktahariEntityFactory $entityFactory
     * @param BhaktahariEntity $bhaktahariModel
     * @param Collection $collection
     * @param CollectionFactory $collectionFactory
     * @param ResourceConnection $connection
     * @param CollectionProcessorInterface $collectionProcessor
     * @param BhaktahariEntitySearchResultInterfaceFactory $entitySearchResultFactory
     * @param \Bhaktahari\Assignment3\Model\CustomAddressEntityRepository $customAddressEntityRepository
     */
    public function __construct(
        ResourceModel $resourceModel,
        BhaktahariEntityFactory $entityFactory,
        BhaktahariModel $bhaktahariModel,
        Collection $collection,
        CollectionFactory $collectionFactory,
        ResourceConnection $connection,
        CollectionProcessorInterface $collectionProcessor,
        BhaktahariEntitySearchResultInterfaceFactory $entitySearchResultFactory,
        CustomAddressEntityRepository $customAddressEntityRepository
    ) {
        $this->resourceModel = $resourceModel;
        $this->resouceModel = $resourceModel;
        $this->entityFactory = $entityFactory;
        $this->bhaktahariModel = $bhaktahariModel;
        $this->collection = $collection;
        $this->collectionFactory = $collectionFactory;
        $this->resourceConnection  = $connection;
        $this->collectionProcessor = $collectionProcessor;
        $this->entitySearchResultFactory = $entitySearchResultFactory;
        $this->customAddressEntityRepository = $customAddressEntityRepository;
    }

    /**
     * @param string $entityId
     * @return  BhaktahariEntityInterface;
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
       // return $this->customAddressEntityRepository->getList();
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
    /**
     * Save
     *
     * @param BhaktahariEntityInterface $entity
     * @return bool
     */
    public function save(BhaktahariEntityInterface $entity)
    {
        try {
            $this->resouceModel->save($entity);
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }
    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return BhaktahariEntitySearchResultInterface|void
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
         $collection = $this->collectionFactory->create();
         $this->collectionProcessor->process($searchCriteria, $collection);
        /** @var BhaktahariEntitySearchResultInterface $searchResults */
        $searchResults = $this->entitySearchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
