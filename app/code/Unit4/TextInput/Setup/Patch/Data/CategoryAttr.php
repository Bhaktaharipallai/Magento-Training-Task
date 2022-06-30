<?php
namespace Unit4\TextInput\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Catalog\Setup\CategorySetup;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Eav\Attribute as CatalogAttribute;

/**
 * Class CategoryAttr
 * Unit4\TextInput\Setup\Patch\Data
 */
class CategoryAttr implements DataPatchInterface
{
    /**
     * @var CategorySetupFactory
     */
    protected CategorySetupFactory $categorySetupFactory;
    /**
     * @var ModuleDataSetupInterface
     */
    protected ModuleDataSetupInterface $moduleDataSetup;
    /**
     * Entity code.
     * Can be used as part of method name for entity processing
     */
    const ENTITY = 'catalog_product';

    /**
     * CategoryAttr constructor.
     * @param CategorySetupFactory $categorySetupFactory
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        CategorySetupFactory $categorySetupFactory,
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->categorySetupFactory = $categorySetupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
    }
    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $catalogSetup = $this->categorySetupFactory->create(['setup' => $this->moduleDataSetup]);
        $catalogSetup->addAttribute(Product::ENTITY, 'flavor', [
            'label'            => 'flavor',
            'visible_on_front' =>1,
            'required'         => 0 ,
            'global'           => catalogAttribute::SCOPE_STORE
        ]);
        $this->moduleDataSetup->endSetup();
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
