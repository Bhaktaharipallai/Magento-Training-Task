<?php
namespace Bhaktahari\Assignment3\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface BhaktahariEntitySearchResultInterface extends SearchResultsInterface
{
    /**
     * Get the block list
     *
     * @return BhaktahariEntityInterface[]
     */
    public function getItems();

    /**
     * Set block list
     *
     * @param  BhaktahariEntityInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
