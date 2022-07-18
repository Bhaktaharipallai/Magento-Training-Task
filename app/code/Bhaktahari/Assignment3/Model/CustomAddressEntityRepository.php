<?php
namespace Bhaktahari\Assignment3\Model;

use Bhaktahari\Assignment3\Api\BhaktahariEntityRepositoryInterface;
use Bhaktahari\Assignment3\Api\CustomAddressRepositoryInterface;
use Bhaktahari\Assignment3\Api\Data\BhaktahariEntityInterface;
use Bhaktahari\Assignment3\Api\Data\CustomAddressEntityInterface;
use Bhaktahari\Assignment3\Api\Data\CustomAddressSearchResultInterface;
use Bhaktahari\Assignment3\Model\ResourceModel\BhaktahariCollection\AddressCollection;
use Bhaktahari\Assignment3\Model\ResourceModel\BhaktahariCollection\AddressCollectionFactory;
use Bhaktahari\Assignment3\Model\ResourceModel\CustomAddressEntity as ResourceModel;
use Bhaktahari\Assignment3\Model\CustomAddressEntityFactory as CustomAddressEntityFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Bhaktahari\Assignment3\Api\Data\CustomAddressSearchResultInterfaceFactory as CustomAddressSearchResultFactory;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;

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
     * @var AddressCollection
     */
    private AddressCollectionFactory $collectionFactory;
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;
    /**
     * @var CustomAddressSearchResultFactory
     */
    private CustomAddressSearchResultFactory $customAddressSearchResultFactory;
    /**
     * @var FilterBuilder
     */
    private FilterBuilder $filterBuilder;
    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * CustomAddressEntityRepository constructor.
     *
     * @param ResourceModel $resourceModel
     * @param \Bhaktahari\Assignment3\Model\CustomAddressEntityFactory $entityFactory
     * @param AddressCollection $collection
     * @param CollectionProcessorInterface $collectionProcessor
     * @param AddressCollectionFactory $collectionFactory
     * @param CustomAddressSearchResultFactory $customAddressSearchResultFactory
     * @param FilterBuilder $filterBuilder
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        ResourceModel $resourceModel,
        CustomAddressEntityFactory $entityFactory,
        AddressCollection $collection,
        CollectionProcessorInterface $collectionProcessor,
        AddressCollectionFactory $collectionFactory,
        CustomAddressSearchResultFactory $customAddressSearchResultFactory,
        FilterBuilder $filterBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->resourceModel = $resourceModel;
        $this->entityFactory = $entityFactory;
        $this->collection = $collection;
        $this->collectionProcessor = $collectionProcessor;
        $this->collectionFactory = $collectionFactory;
        $this->customAddressSearchResultFactory = $customAddressSearchResultFactory;
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @param string $addressId
     *
     * @return CustomAddressEntityInterface
     */
    public function getById(string $addressId)
    {
        $address = $this->entityFactory->create();
        $this->resourceModel->load($address, $addressId);
        return $address;
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
     * @return CustomAddressEntityInterface[]|null
     */
    public function getEntityAddress($entityId)
    {
        $filter = $this->filterBuilder->setField('entity_id')
            ->setConditionType('eq')
            ->setValue($entityId)
            ->create();
        $searchCriteria = $this->searchCriteriaBuilder->addFilters([$filter])->create();
        $items = $this->getList($searchCriteria)->getItems();
//        foreach ($items as $item) {
//            var_dump($item->getEntityId());
//        }
//        die();
        return $this->getList($searchCriteria)->getItems();
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return CustomAddressSearchResultInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        /** @var CustomAddressSearchResultInterface $searchResults */
        $searchResults = $this->customAddressSearchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
