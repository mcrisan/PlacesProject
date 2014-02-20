<?php

namespace Bundle\ProjectBundle\lib;

use Bundle\ProjectBundle\lib\GetUserIp;
use Bundle\ProjectBundle\Entity\UsersIp;

class UserIp {
    function addUserIp($em) {
        // Get the current ip addr
        $userIp = new GetUserIp();
        $currentIp = $userIp->get_user_ip();
        //exit();
        // Vf. for duplicate ip
        $query = $em->createQuery(
                    'SELECT u.ip
                    FROM BundleProjectBundle:UsersIp u
                    WHERE u.ip = :ip'
            )->setParameter('ip', $currentIp);

        $ipResult = $query->getResult();
        if (empty($ipResult)) {
            $ip = new UsersIp();
            $ip->setIp($currentIp);
            $ip->setCount(1);
            $ip->setVoteFlag(0);
            $em->persist($ip);
            $em->flush();
        } else {
            // select current count
             $countQuery = $em->createQuery(
                    'SELECT u.count
                    FROM BundleProjectBundle:UsersIp u
                    WHERE u.ip = :ip'
            )->setParameter('ip', $currentIp);
           $countResult = $countQuery->getResult();
            
           $currentCount = $countResult[0]['count'] +1;
           //exit();
            // if ip - count++
            $qb = $em->createQueryBuilder()
                ->update('BundleProjectBundle:UsersIp', 'u')
                ->set('u.count', ':hit')
                ->where('u.ip = :ip')
                ->setParameter('hit', $currentCount)
                ->setParameter('ip', $currentIp)
                ->getQuery();
            $qb->execute();
        }
    }
}
?>
