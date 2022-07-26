<?php

namespace Bhaktahari\Assignment6\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Customer\Helper\Session\CurrentCustomer;

class CustomerSection implements SectionSourceInterface
{
    /**
     * @var CurrentCustomer
     */
    private CurrentCustomer $currentCustomer;

    /**
     * CustomerSection constructor.
     *
     * @param CurrentCustomer $currentCustomer
     */
    public function __construct(
        CurrentCustomer $currentCustomer
    ) {
        $this->currentCustomer = $currentCustomer;
    }

    /**
     * Get Session Data
     *
     * @return array
     */
    public function getSectionData()
    {
        $customer = $this->currentCustomer->getCustomer();
        return [
        'customer_data' => $customer->getFirstname() .' '. $customer->getLastname()
        ];
    }
}
