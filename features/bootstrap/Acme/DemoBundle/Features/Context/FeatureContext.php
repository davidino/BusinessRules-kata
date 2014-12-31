<?php

namespace Acme\DemoBundle\Features\Context;

use Acme\DemoBundle\Model\Company;
use Acme\DemoBundle\Model\Order;
use Acme\DemoBundle\Model\Product;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Symfony2Extension\Context\KernelDictionary;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends \PHPUnit_Framework_TestCase implements Context, SnippetAcceptingContext
{
    use KernelDictionary;

    private $order;
    private $company;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given a product named :arg1 and priced :arg2 was added to the order
     */
    public function aProductNamedAndPricedWasAddedToTheOrder($name, $price)
    {
        $product = Product::createWithNameAndPrice($name, $price);
        $this->order = Order::createWithProducts(new ArrayCollection(array($product)));
    }

    /**
     * @When i process the order
     */
    public function iProcessTheOrder()
    {
        $this->company = Company::initWithOrder($this->order);
    }

    /**
     * @Then the company should generate the packing slip
     */
    public function theCompanyShouldGenerateThePackingSlip()
    {
        $this->assertInstanceOf('Acme\DemoBundle\Model\PackageSlip',$this->company->processOrder());
    }
}
