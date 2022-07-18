<?php
namespace Bhaktahari\Assignment3\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CustomAddressSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return CustomAddressEntityInterface[]
     */
    public function getItems();

    /**
     * @param  CustomAddressEntityInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
