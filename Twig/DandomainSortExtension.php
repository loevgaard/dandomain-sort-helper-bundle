<?php
namespace Loevgaard\DandomainSortHelperBundle\Twig;

use Loevgaard\DandomainSortHelperBundle\Helper\Helper;

class DandomainSortExtension extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
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
            'dandomain_sort' => $this->helper->getCurrentSort()
        );
    }

    public function getName()
    {
        return 'dandomain_sort_extension';
    }
}