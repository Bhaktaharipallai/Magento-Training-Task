<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bhaktahari\Assignment3\Controller\Index;

use Bhaktahari\Assignment3\Model\BhaktahariEntityRepository;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class Index implements HttpGetActionInterface
{
    /**
     * @var JsonFactory
     */
    private JsonFactory $resultJsonFactory;
    /**
     * @var BhaktahariEntityRepository
     */
    private BhaktahariEntityRepository $entityRepository;

    /**
     * Constructor
     *
     * @param JsonFactory $resultJsonFactory
     * @param BhaktahariEntityRepository $entityRepository
     */
    public function __construct(
        JsonFactory $resultJsonFactory,
        BhaktahariEntityRepository $entityRepository
    ) {

        $this->resultJsonFactory = $resultJsonFactory;
        $this->entityRepository = $entityRepository;
    }

    /**
     * @return \Magento\Framework\Controller\Result\Json
     */
    public function execute(): \Magento\Framework\Controller\Result\Json
    {
        $result = $this->entityRepository->getById(1);
        $resultJson = $this->resultJsonFactory->create();
        return $resultJson->setData([
            'id' => $result->getId(),
            'name' => $result->getName(),
            'age' => $result->getAge(),
            'company' => $result->getCompany(),
            'height' => $result->getHeighth(),
            'Company timing' => $result->getCompanyTiming()
        ]);
    }
}
