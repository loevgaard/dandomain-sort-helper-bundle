<?php
namespace Loevgaard\DandomainSortHelperBundle\Helper;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Helper implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @return int
     */
    public function getCurrentSort()
    {
        $yearBegin          = $this->container->getParameter('loevgaard_dandomain_sort_helper.year_begin');
        $weekdayBegin       = $this->container->getParameter('loevgaard_dandomain_sort_helper.weekday_begin');
        $sort               = abs($this->container->getParameter('loevgaard_dandomain_sort_helper.offset'));

        // calculate the diff in weeks between $yearBegin and present year
        $yearNow = date('Y');
        $sort += ($yearNow - $yearBegin) * 53; // 53 is the maximum number of weeks per year

        $startDate = \DateTimeImmutable::createFromFormat('U', strtotime('first ' . $weekdayBegin . ' of january ' . $yearNow));
        $period = new \DatePeriod($startDate, new \DateInterval('P7D'), new \DateTimeImmutable());

        foreach ($period as $d) {
            $sort++;
        }

        return -1 * $sort;
    }
}