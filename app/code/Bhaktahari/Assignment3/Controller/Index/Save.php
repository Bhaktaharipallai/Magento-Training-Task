<?php
namespace Bhaktahari\Assignment3\Controller\Index;

use Bhaktahari\Assignment3\Api\BhaktahariEntityRepositoryInterface;
use Bhaktahari\Assignment3\Api\Data\BhaktahariEntityInterface;
use Bhaktahari\Assignment3\Api\Data\BhaktahariEntityInterfaceFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;

class Save implements \Magento\Framework\App\ActionInterface
{
    /**
     * @var BhaktahariEntityRepositoryInterface
     */
    private BhaktahariEntityRepositoryInterface $bhaktahariEntityRepository;
    /**
     * @var BhaktahariEntityInterfaceFactory
     */
    private BhaktahariEntityInterfaceFactory $bhaktahariEntityFactory;
    /**
     * @var RedirectFactory
     */
    private RedirectFactory $redirectFactory;
    /**
     * @var ManagerInterface
     */
    private ManagerInterface $messageManager;
    /**
     * @var RequestInterface
     */
    private RequestInterface $request;

    public function __construct(
        BhaktahariEntityRepositoryInterface $bhaktahariEntityRepository,
        BhaktahariEntityInterfaceFactory $bhaktahariEntityFactory,
        RedirectFactory $redirectFactory,
        ManagerInterface $messageManager,
        RequestInterface $request,
    ) {
        $this->bhaktahariEntityRepository = $bhaktahariEntityRepository;
        $this->bhaktahariEntityFactory = $bhaktahariEntityFactory;
        $this->redirectFactory = $redirectFactory;
        $this->messageManager = $messageManager;
        $this->request = $request;
    }
    /**
     * Execute
     *
     * @return \Magento\Framework\Controller\Result\Redirect|void
     */
    public function execute()
    {
        $id = $this->request->getParam('id');
        if (!empty($id)) {
            $entity = $this->bhaktahariEntityRepository->getById($id);
        } else {
            $entity = $this->bhaktahariEntityFactory->create();
        }
        $result = $this->saveEntity($entity, $this->request->getParams());
        $redirect = $this->redirectFactory->create();
        if ($result) {
            $this->messageManager->addSuccessMessage("Entity Saved correctly");
            return $redirect->setPath('customtable/index/display');
        } else {
            $this->messageManager->addErrorMessage("Failed to save entity");
            return $redirect->setPath('customtable/index/display');
        }
    }

    /**
     * Save Entity
     *
     * @param BhaktahariEntityInterface $entity
     * @param array $params
     */
    public function saveEntity($entity, $params)
    {
        $entity->setName($params['name']);
        $entity->setAge($params['age']);
        $entity->setCompany($params['company']);
        $entity->setHeight($params['height']);
        $entity->setCompanyTiming($params['company_timing']);
        return $this->bhaktahariEntityRepository->save($entity);
    }
}
