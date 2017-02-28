<?php
namespace Loevgaard\DandomainPeriodHelperBundle\Twig;

use Loevgaard\DandomainPeriodHelperBundle\Helper\Helper;

class DandomainPeriodExtension extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{
    /** @var Helper */
    protected $helper;

    public function __construct(Helper $helper)
    {
        $this->helper = $helper;
    }

    public function getGlobals()
    {
        return array(
            'dandomain_period' => $this->helper->getCurrentPeriod()
        );
    }

    public function getName()
    {
        return 'dandomain_period_extension';
    }
}