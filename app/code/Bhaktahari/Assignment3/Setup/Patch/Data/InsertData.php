<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bhaktahari\Assignment3\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InsertData implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * AddTableData constructor.
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * Apply
     *
     * @return InsertData|void
     */
    public function apply()
    {
        $setup = $this->moduleDataSetup;

        $setup->getConnection()->insertMultiple(
            $setup->getTable('bhaktahari_entity'),
            [
                [
                    'name' => 'Bhaktahari',
                    'age' => 23,
                    'company'=> 'Codilar Technologies PVT LTD',
                    'height' => 5.6
                ],
                [
                    'name' => 'Sachin Kumar biswal',
                    'age' => 22,
                    'company'=> 'Codilar Technologies PVT LTD',
                    'height' => 5.5
                ]
            ]
        );
    }

    /**
     * GetAliases
     *
     * @return array
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * GetDependencies
     *
     * @return array
     */
    public static function getDependencies()
    {
        return [];
    }
}
