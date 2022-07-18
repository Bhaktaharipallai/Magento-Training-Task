<?php
namespace Bhaktahari\Assignment3\Controller\Index;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;

class Form implements \Magento\Framework\App\ActionInterface
{
    /**
     * @var PageFactory
     */
    private PageFactory $pageFactory;

    /**
     * Form constructor.
     *
     * @param PageFactory $pageFactory
     */
    public function __construct(PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
    }

    /**
     * Execute
     *
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->pageFactory->create();
    }
}
