<?php

namespace Bhaktahari\Assignment3\Plugin;

use Bhaktahari\Assignment3\Model\BhaktahariEntityRepository;
use Bhaktahari\Assignment3\Model\CustomAddressEntityRepository;
use Bhaktahari\Assignment3\Api\Data\CustomAddressEntityExtensionFactory;

class AfterGetAddressId
{
    /**
     * @var CustomAddressEntityRepository
     */
    private CustomAddressEntityRepository $CustomAddressEntityRepository;
    /**
     * @var BhaktahariEntityRepository
     */
    private BhaktahariEntityRepository $bhaktahariEntityRepository;
    /**
     * @var CustomAddressEntityExtensionFactory
     */
    private CustomAddressEntityExtensionFactory $customAddressEntityExtensionFactory;

    /**
     * AfterGetId constructor.
     *
     * @param CustomAddressEntityRepository $customAddressEntityRepository
     * @param BhaktahariEntityRepository $bhaktahariEntityRepository
     * @param CustomAddressEntityExtensionFactory $customAddressEntityExtensionFactory
     */
    public function __construct(
        CustomAddressEntityRepository $customAddressEntityRepository,
        BhaktahariEntityRepository    $bhaktahariEntityRepository,
        CustomAddressEntityExtensionFactory $customAddressEntityExtensionFactory
    ) {
        $this->CustomAddressEntityRepository = $customAddressEntityRepository;
        $this->bhaktahariEntityRepository = $bhaktahariEntityRepository;
        $this->customAddressEntityExtensionFactory = $customAddressEntityExtensionFactory;
    }

    /**
     * @param \Bhaktahari\Assignment3\Api\CustomAddressRepositoryInterface $subject
     * @param \Bhaktahari\Assignment3\Api\Data\CustomAddressEntityInterface $result
     * @return \Bhaktahari\Assignment3\Api\Data\CustomAddressEntityInterface
     */
    public function afterGetById(
        \Bhaktahari\Assignment3\Api\CustomAddressRepositoryInterface $subject,
        \Bhaktahari\Assignment3\Api\Data\CustomAddressEntityInterface $result
    ) {
        $entityId = $result->getEntityId();
        if ($result->getExtensionAttributes()) {
            $extensionAttributes = $result->getExtensionAttributes();
        } else {
            $extensionAttributes = $this->customAddressEntityExtensionFactory->create();
        }
        $customAddress = $this->bhaktahariEntityRepository->getById($entityId);
        $extensionAttributes->setCustomCustomer($customAddress);
        $result->setExtensionAttributes($extensionAttributes);
        return $result;
    }
}
