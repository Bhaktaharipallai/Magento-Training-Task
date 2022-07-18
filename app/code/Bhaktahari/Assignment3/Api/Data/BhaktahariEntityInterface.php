<?php
namespace Bhaktahari\Assignment3\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface BhaktahariEntityInterface extends ExtensibleDataInterface
{
    public const ID ='enitity_id';
    public const NAME ='name';
    public const  AGE = 'age';
    public const COMPANY = 'company';
    public const HEIGHT = 'height';
    public const COMPANYTIMING = 'Company timing';

    /**
     * Get Id
     *
     * @return int
     */
    public function getId();

    /**
     * Get Name
     *
     * @return string
     */
    public function getName();

    /**
     * set Name
     *
     * @param string name
     * @return $this
     */
    public function setName($name);

    /**
     * Get Age
     *
     * @return int
     */
    public function getAge();

    /**
     * set Age
     *
     * @param int $age
     * @return int
     */
    public function setAge($age);
    /**
     * Get Company Name
     *
     * @return string
     */
    public function getCompany();

    /**
     * set Company Name
     *
     * @param string $company
     * @return string
     */
    public function setCompany($company);
    /**
     * Get Height
     *
     * @return float
     */
    public function getHeighth();

    /**
     * Set Height
     *
     * @param $height
     * @return mixed
     */
    public function setHeight($height);
    /**
     * Get Company Timing
     *
     * @return string
     */
    public function getCompanyTiming();

    /**
     * Set CompanyTiming
     *
     * @param $companyTiming
     * @return mixed
     */
    public function setCompanyTiming($companyTiming);
    /**
     * @return \Bhaktahari\Assignment3\Api\Data\BhaktahariEntityExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * @param \Bhaktahari\Assignment3\Api\Data\BhaktahariEntityExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Bhaktahari\Assignment3\Api\Data\BhaktahariEntityExtensionInterface
                                           $extensionAttributes);
}
