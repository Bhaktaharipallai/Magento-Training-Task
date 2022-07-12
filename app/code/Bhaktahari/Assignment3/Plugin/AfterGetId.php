<?php
namespace Bhaktahari\Assignment3\Plugin;

use Bhaktahari\Assignment3\Api\Data\BhaktahariEntityExtensionFactory;
use Bhaktahari\Assignment3\Model\CustomAddressEntityRepository;

class AfterGetId
{
    /**
     * @var CustomAddressEntityRepository
     */
    private CustomAddressEntityRepository $CustomAddressEntityRepository;
    /**
     * @var BhaktahariEntityExtensionFactory
     */
    private BhaktahariEntityExtensionFactory $bhaktahariEntityExtensionFactory;

    /**
     * AfterGetId constructor.
     *
     * @param CustomAddressEntityRepository $customAddressEntityRepository
     * @param BhaktahariEntityExtensionFactory $bhaktahariEntityExtensionFactory
     */
    public function __construct(
        CustomAddressEntityRepository $customAddressEntityRepository,
        BhaktahariEntityExtensionFactory $bhaktahariEntityExtensionFactory
    ) {
        $this->CustomAddressEntityRepository = $customAddressEntityRepository;
        $this->bhaktahariEntityExtensionFactory = $bhaktahariEntityExtensionFactory;
    }

    /**
     * @param \Bhaktahari\Assignment3\Api\BhaktahariEntityRepositoryInterface $subject
     * @param \Bhaktahari\Assignment3\Api\Data\BhaktahariEntityInterface $result
     * @return \Bhaktahari\Assignment3\Api\Data\BhaktahariEntityInterface
     */
    public function afterGetById(
        \Bhaktahari\Assignment3\Api\BhaktahariEntityRepositoryInterface $subject,
        \Bhaktahari\Assignment3\Api\Data\BhaktahariEntityInterface $result
    ) {
        $id = $result->getId();
        $extensionAttributes = '';
        if ($result->getExtensionAttributes()) {
            $extensionAttributes =  $result->getExtensionAttributes();
        } else {
            $extensionAttributes = $this->bhaktahariEntityExtensionFactory->create();
        }
        $customAddress = $this->CustomAddressEntityRepository->getEntityAddress($id);
        $extensionAttributes->setCustomAddresses($customAddress);
        $result->setExtensionAttributes($extensionAttributes);
        return $result;
    }
}
