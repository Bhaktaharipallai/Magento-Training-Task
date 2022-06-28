<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Session2\CustomDi\Model;

use Magento\Framework\App\Config;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Api\Data\StoreInterface;
use Magento\Store\Api\StoreRepositoryInterface;
use Magento\Store\Model\ResourceModel\Store;
use Magento\Store\Model\StoreFactory;
use Magento\Store\Model\ResourceModel\Store\CollectionFactory;
use Magento\Store\Model\StoreIsInactiveException;

class StoreRepository implements StoreRepositoryInterface
{
    /**
     * @var Store
     */
    private Store $resourceModel;
    /**
     * @var StoreFactory
     */
    private StoreFactory $storeFactory;
    /**
     * @var CollectionFactory
     */
    private CollectionFactory $collectionFactory;
    /**
     * @var StoreInterface[]
     */
    protected array $entities = [];

    /**
     * @var StoreInterface[]
     */
    protected array $entitiesById = [];

    /**
     * @var bool
     */
    protected bool $allLoaded = false;

    /**
     * @var Config
     */
    private $appConfig;

    /**
     * StoreRepository constructor.
     * @param Store $resourceModel
     * @param StoreFactory $storeFactory
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Store $resourceModel,
        StoreFactory $storeFactory,
        CollectionFactory $collectionFactory
    ) {
        $this->resourceModel = $resourceModel;
        $this->collectionFactory = $collectionFactory;
        $this->storeFactory = $storeFactory;
    }

    /**
     * @inheritDoc
     */
    public function get($code)
    {
        if (isset($this->entities[$code])) {
            return $this->entities[$code];
        }

        $storeData = $this->getAppConfig()->get('scopes', "stores/$code", []);
        $store = $this->storeFactory->create([
            'data' => $storeData
        ]);

        if ($store->getId() === null) {
            throw new NoSuchEntityException(
                __("The store that was requested wasn't found. Verify the store and try again.")
            );
        }
        $this->entities[$code] = $store;
        $this->entitiesById[$store->getId()] = $store;
        return $store;
    }

    /**
     * @inheritDoc
     */
    public function getActiveStoreByCode($code)
    {
        $store = $this->get($code);

        if (!$store->isActive()) {
            throw new StoreIsInactiveException();
        }
        return $store;
    }

    /**
     * @inheritDoc
     */
    public function getActiveStoreById($id)
    {
        $store = $this->getById($id);

        if (!$store->isActive()) {
            throw new StoreIsInactiveException();
        }
        return $store;
    }

    /**
     * @inheritDoc
     */
    public function getById($id)
    {
        if (isset($this->entitiesById[$id])) {
            return $this->entitiesById[$id];
        }

        $storeData = $this->getAppConfig()->get('scopes', "stores/$id", []);
        $store = $this->storeFactory->create([
            'data' => $storeData
        ]);

        if ($store->getId() === null) {
            throw new NoSuchEntityException(
                __("The store that was requested wasn't found. Verify the store and try again.")
            );
        }

        $this->entitiesById[$id] = $store;
        $this->entities[$store->getCode()] = $store;
        return $store;
    }

    /**
     * @inheritDoc
     */
    public function getList()
    {
        $collection = $this->collectionFactory->create();
        //$stores = $collection->getItems();
        return $collection->load();
    }
    /**
     * Retrieve application config.
     *
     * @deprecated 100.1.3
     * @return Config
     */
    private function getAppConfig()
    {
        if (!$this->appConfig) {
            $this->appConfig = ObjectManager::getInstance()->get(Config::class);
        }
        return $this->appConfig;
    }
    /**
     * @inheritDoc
     */
    public function clean()
    {
        $this->entities = [];
        $this->entitiesById = [];
        $this->allLoaded = false;
    }
}
