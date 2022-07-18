<?php
namespace Bhaktahari\Assignment3\Block;

use Bhaktahari\Assignment3\Api\Data\BhaktahariEntitySearchResultInterface;
use Bhaktahari\Assignment3\Model\BhaktahariEntityRepository;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Display extends Template
{
    /**
     * @var BhaktahariEntityRepository
     */
    private BhaktahariEntityRepository $entityRepository;
    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * Display constructor.
     *
     * @param Context $context
     * @param BhaktahariEntityRepository $entityRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param array $data
     */
    public function __construct(
        Context $context,
        BhaktahariEntityRepository $entityRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->entityRepository = $entityRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }
    /**
     * Get Entities
     *
     * @return BhaktahariEntitySearchResultInterface|void
     */
    public function getEntities()
    {
        return $this->entityRepository->getList($this->searchCriteriaBuilder->create());
    }
    /**
     * Get Action Url
     *
     * @return string
     */
    public function getActionUrl()
    {
        return $this->getUrl('customtable/index/save');
    }
    /**
     * Get form url
     *
     * @return string
     */
    public function getFormUrl()
    {
        return $this->getUrl('customtable/index/form');
    }

    /**
     * Get Entity
     *
     * @return \Bhaktahari\Assignment3\Api\Data\BhaktahariEntityInterface
     */
    public function getEntity()
    {
        $id = $this->getRequest()->getParam('id');
        return $this->entityRepository->getById($id);
    }
}
