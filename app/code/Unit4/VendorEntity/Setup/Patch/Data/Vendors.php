<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit4\VendorEntity\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class Vendors
 * Unit4\VendorEntity\Setup\Patch\Data
 */
class Vendors implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    protected $moduleDataSetup;

    /**
     * Vendors constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }
    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $this->moduleDataSetup->getConnection()->insert(
            'vendor_entity',
            [
               'code' => 'Codilar',
               'contact' => '670794590',
               'goods_type' => 'Magento'
            ]
        );
    }

    /**
     * @return array|string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @return array|string[]
     */
    public function getAliases()
    {
        return [];
    }
}
