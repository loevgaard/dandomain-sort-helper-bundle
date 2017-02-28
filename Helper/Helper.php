<?php
namespace Loevgaard\DandomainPeriodHelperBundle\Helper;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Helper implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @return int
     */
    public function getCurrentPeriod()
    {
        $yearBegin          = $this->container->getParameter('loevgaard_dandomain_period_helper.year_begin');
        $periodWeekdayBegin = $this->container->getParameter('loevgaard_dandomain_period_helper.period_weekday_begin');
        $dandomainPeriod    = abs($this->container->getParameter('loevgaard_dandomain_period_helper.offset'));

        // calculate the diff in weeks between $yearBegin and present year
        $yearNow = date('Y');
        $dandomainPeriod += ($yearNow - $yearBegin) * 53; // 53 is the maximum number of weeks per year

        $startDate = \DateTimeImmutable::createFromFormat('U', strtotime('first ' . $periodWeekdayBegin . ' of january ' . $yearNow));
        $period = new \DatePeriod($startDate, new \DateInterval('P7D'), new \DateTimeImmutable());

        foreach ($period as $d) {
            $dandomainPeriod++;
        }

        return -1 * $dandomainPeriod;
    }
}