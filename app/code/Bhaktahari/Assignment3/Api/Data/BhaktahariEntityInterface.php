<?php
namespace Bhaktahari\Assignment3\Api\Data;

interface BhaktahariEntityInterface
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
     * Get Age
     *
     * @return int
     */
    public function getAge();

    /**
     * Get Company Name
     *
     * @return string
     */
    public function getCompany();

    /**
     * Get Height
     *
     * @return float
     */
    public function getHeighth();

    /**
     * Get Company Timing
     *
     * @return string
     */
    public function getCompanyTiming();
}
