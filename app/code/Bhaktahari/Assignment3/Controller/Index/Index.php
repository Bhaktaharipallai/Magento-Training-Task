<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bhaktahari\Assignment3\Controller\Index;

use Bhaktahari\Assignment3\Model\BhaktahariEntityRepository;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResourceConnection;

class Index implements ActionInterface
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
     * @var RequestInterface
     */
    private RequestInterface $request;
    /**
     * @var ResourceConnection
     */
    private ResourceConnection $resourceConnection;

    /**
     * Constructor
     *
     * @param JsonFactory $resultJsonFactory
     * @param BhaktahariEntityRepository $entityRepository
     * @param RequestInterface $request
     * @param ResourceConnection $resourceConnection
     */
    public function __construct(
        JsonFactory $resultJsonFactory,
        BhaktahariEntityRepository $entityRepository,
        RequestInterface $request,
        ResourceConnection $resourceConnection
    ) {

        $this->resultJsonFactory = $resultJsonFactory;
        $this->entityRepository = $entityRepository;
        $this->request = $request;
        $this->resourceConnection = $resourceConnection;
    }

    /**
     * @return \Magento\Framework\Controller\Result\Json
     * @throws NoSuchEntityException
     */
    public function execute(): \Magento\Framework\Controller\Result\Json
    {
        $entityId = $this->request->getParam('id');
        $resultJson = $this->resultJsonFactory->create();
        if (empty($entityId)) {
            $entityCollection = $this->entityRepository->getCollection();
            $entites = [];
            foreach ($entityCollection as $bhaktahariEntity) {
                $entites[] =[
                    'id' => $bhaktahariEntity->getId(),
                    'name' => $bhaktahariEntity->getName(),
                    'age' => $bhaktahariEntity->getAge(),
                    'company' => $bhaktahariEntity->getCompany(),
                    'height' => $bhaktahariEntity->getHeighth(),
                    'Company timing' => $bhaktahariEntity->getCompanyTiming()
                ];
            }
            $resultJson->setData($entites);
            return $resultJson;
        } else {
            $result = $this->entityRepository->getById($entityId);
            //$multiData = $this->entityRepository->getMultiData();
            //var_dump($multiData);
            //$manualResult = $this->entityRepository->getById(6);
            if (empty($result)) {
                throw new NoSuchEntityException(__('There is no records with this id.'));
            } else {
                return $resultJson->setData($result);
//                ], [
//                    'id' => $manualResult->getId(),
//                    'name' => $manualResult->getName(),
//                    'age' => $manualResult->getAge(),
//                    'company' => $manualResult->getCompany(),
//                    'height' => $manualResult->getHeighth(),
//                    'Company timing' =>$manualResult->getCompanyTiming()
//                    ]]);
            }

        }
    }
}
