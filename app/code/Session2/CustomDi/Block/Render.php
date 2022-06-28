<?php
namespace Session2\CustomDi\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Store\Api\StoreRepositoryInterface;

class Render extends \Magento\Framework\View\Element\Template
{
    /**
     * @var StoreRepositoryInterface
     */
    private StoreRepositoryInterface $storeRepository;
    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * Render constructor.
     *
     * @param Template\Context $context
     * @param StoreRepositoryInterface $storeRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        StoreRepositoryInterface $storeRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->storeRepository = $storeRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @return \Magento\Store\Api\Data\StoreInterface[]
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getStores()
    {
        return $this->storeRepository->getList($this->searchCriteriaBuilder->create());
    }
}
