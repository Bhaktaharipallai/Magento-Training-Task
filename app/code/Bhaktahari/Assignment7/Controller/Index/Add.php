<?php
/**
 * Copyright © 2021 Magenest. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bhaktahari\Assignment7\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Add implements ActionInterface
{
    protected $_pageFactory;

    public function __construct(
        PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
