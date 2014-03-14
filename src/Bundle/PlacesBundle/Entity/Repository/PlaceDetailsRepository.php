<?php

namespace Bundle\PlacesBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PlaceDetailsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PlaceDetailsRepository extends EntityRepository {

    // Get more places - infinite scroll
    public function getMorePlaces($input) {
        
        $arr = explode(',',$input);
        //echo "<pre>";print_r($arr);echo "</pre>";
        //echo "<br />";
        $qb = $this->createQueryBuilder('place')
                ->select('place.placeId,place.placeName,place.placeRating')
                ->where('place.placeId not in (:name)')
                ->setParameter('name', $input)
                ->getQuery()
                ->useResultCache(false)
                ->setMaxResults(4)
                ->getResult();
        
        return $qb;
        
        
//        $em = $this->getEntityManager();
//
//        $query = $em
//                ->createQuery("
//                SELECT pd.placeId,pd.placeName,pd.placeRating, p.slug
//                FROM Bundle\ProjectBundle\Entity\PlaceDetails pd
//                ,Bundle\ProjectBundle\Entity\Places p
//                WHERE pd.placeId = p.id AND
//                p.id NOT IN (:idsArray) 
//                order by pd.placeName asc
//            ")
//                ->setParameter('idsArray', '%' . $input . '%')
//               ->setMaxResults(1);
//
//        return $query->getResult();
    }
    
    // Get places by name
    public function getPlacesNamesAndIds($input) {

        $em = $this->getEntityManager();

        $query = $em
                ->createQuery("
                SELECT pd.placeId,pd.placeName,pd.placeRating, p.slug
                FROM Bundle\PlacesBundle\Entity\PlaceDetails pd
                ,Bundle\PlacesBundle\Entity\Places p
                WHERE pd.placeId = p.id AND
                pd.placeName LIKE :name
                order by pd.placeName asc
                
            ")
                ->setParameter('name', '%' . $input . '%');

        return $query->getResult();


        /*
          $qb = $this->createQueryBuilder('place')
          ->select('place')
          ->where('place.place_name LIKE :type')
          ->setParameter('type', '%' . $input . '%')
          ->setMaxResults(100);
          return $qb->getQuery()->getResult();

         */
    }
    
    public function getPlacesNamesAndIdsByAddress($input) {

        $em = $this->getEntityManager();

        $query = $em
                ->createQuery("
                SELECT pd.placeId,pd.placeName,pd.placeRating, p.slug
                FROM Bundle\PlacesBundle\Entity\PlaceDetails pd
                ,Bundle\PlacesBundle\Entity\Places p
                WHERE pd.placeId = p.id AND
                pd.placeVicinity LIKE :address
                order by pd.placeName asc
                
            ")
                ->setParameter('address', '%' . $input . '%');

        return $query->getResult();


        /*
          $qb = $this->createQueryBuilder('place')
          ->select('place')
          ->where('place.place_name LIKE :type')
          ->setParameter('type', '%' . $input . '%')
          ->setMaxResults(100);
          return $qb->getQuery()->getResult();

         */
    }
    
    public function getPlacesNamesAndIdsByTag($input) {

        $em = $this->getEntityManager();
        
        $qb = $em->createQueryBuilder()
                ->select('pd.placeId,pd.placeName,pd.placeRating, p.slug, t.tag')
                ->from('BundlePlacesBundle:PlaceDetails', 'pd')
                ->innerJoin('BundlePlacesBundle:Places', 'p', 'WITH', 'pd.placeId = p.id')
                ->innerJoin('BundlePlacesBundle:PlaceTags', 'pt', 'WITH', 'pd.placeId = pt.placeId')
                ->innerJoin('BundlePlacesBundle:Tags', 't', 'WITH', 'pt.tagId = t.id')
                ->where('t.tag= :tag')
                ->setParameter('tag', $input)
                ->getQuery()
                ->getResult();

        return $qb;
    }
    
    public function getPlacesNamesByTagAndAddress($tag, $address) {

        $em = $this->getEntityManager();
        
        $qb = $em->createQueryBuilder()
                ->select('pd.placeId,pd.placeName,pd.placeRating, p.slug, t.tag')
                ->from('BundlePlacesBundle:PlaceDetails', 'pd')
                ->innerJoin('BundlePlacesBundle:Places', 'p', 'WITH', 'pd.placeId = p.id')
                ->innerJoin('BundlePlacesBundle:PlaceTags', 'pt', 'WITH', 'pd.placeId = pt.placeId')
                ->innerJoin('BundlePlacesBundle:Tags', 't', 'WITH', 'pt.tagId = t.id')
                ->where('t.tag= :tag AND pd.placeVicinity LIKE :address')
                ->setParameters(array('tag' => $tag, 'address' => '%' . $address . '%'))
                ->getQuery()
                ->getResult();

        return $qb;
    }
    
    
    
//    public function getPlacesByNameOrAddressOrTag($input) {
//
//        $em = $this->getEntityManager();
//        $qb = $em->createQueryBuilder()
//                
//                ->select('DISTINCT pd.placeId,pd.placeName,pd.placeRating, p.slug, t.tag')
//                ->from('BundlePlacesBundle:PlaceDetails', 'pd')
//                ->innerJoin('BundlePlacesBundle:Places', 'p', 'WITH', 'pd.placeId = p.id')
//                ->innerJoin('BundlePlacesBundle:PlaceTags', 'pt', 'WITH', 'pd.placeId = pt.placeId')
//                ->innerJoin('BundlePlacesBundle:Tags', 't', 'WITH', 'pt.tagId = t.id')
//                ->where('pd.placeName LIKE :name OR t.tag LIKE :tag OR pd.placeVicinity LIKE :address')
//                ->groupBy('pd.placeId')
//                ->setParameters(array('name' => $input, 'tag' => $input, 'address' => '%' . $input . '%'))
//                ->getQuery()
//                ->getResult();
//        //var_dump($qb);
//        //die;
//        return $qb;
//    }
    
    public function getPlacesByNameOrAddressOrTag($input) {

        $em = $this->getEntityManager();
        $var = "CONCAT(%, pd.placeName)";
        $qb = $em->createQueryBuilder()
                
                ->select('DISTINCT pd.placeId,pd.placeName,pd.placeRating, p.slug, t.tag')
                ->from('BundlePlacesBundle:PlaceDetails', 'pd')
                ->innerJoin('BundlePlacesBundle:Places', 'p', 'WITH', 'pd.placeId = p.id')
                ->innerJoin('BundlePlacesBundle:PlaceTags', 'pt', 'WITH', 'pd.placeId = pt.placeId')
                ->innerJoin('BundlePlacesBundle:Tags', 't', 'WITH', 'pt.tagId = t.id')
                ->where(":name LIKE CONCAT(CONCAT(:a, pd.placeName), :a) OR pd.placeName LIKE :name OR t.tag LIKE :tag OR pd.placeVicinity LIKE :address OR :address LIKE CONCAT(CONCAT(:a, pd.placeVicinity), :a)")
                ->groupBy('pd.placeId')
                ->setParameters(array('name' => '%'.$input."%", 'tag' => $input, 'address' => '%' . $input . '%', 'a'=> '%'))
                ->getQuery()
                ->getResult();
        //var_dump($qb);
        //die;
        return $qb;
    }
    
//     public function getPlacesByNameOrAddressOrTag($input) {
//
//        $em = $this->getEntityManager();
//
////        $query = $em
////                ->createQuery("
////                SELECT pd.placeId,pd.placeName,pd.placeRating, p.slug
////                FROM Bundle\PlacesBundle\Entity\PlaceDetails pd
////                ,Bundle\PlacesBundle\Entity\Places p
////                WHERE pd.placeId = p.id AND
////                pd.placeVicinity LIKE :address
////                order by pd.placeName asc
////                
////            ")
////                ->setParameter('address', '%' . $input . '%');
//        echo "here";
//        $query = $em
//                ->createQuery("
//                SELECT pd FROM Bundle\PlacesBundle\Entity\PlaceDetails pd
//                WHERE :v pd.placeName LIKE :v ")
//                ->setParameter('v', $input );
//                //->setParameter('v2', '1' );
//        var_dump($query->getResult());
//        return $query->getResult();
//
//    }
    


    // Get place id by name
    public function getPlaceIdByName($name) {
        $qb = $this->createQueryBuilder('place')
                ->select('place.placeId')
                ->where('place.placeName = :name')
                ->setParameter('name', $name)
                ->getQuery()
                ->getResult();
        return $qb;
    }
    
    public function checkPlaceDetailsByNameAndAddress($name, $address) {
        $em = $this->getEntityManager();
        
        $qb = $em->createQueryBuilder()
                ->select('pd.placeId')
                ->from('BundlePlacesBundle:PlaceDetails', 'pd')
                ->where('pd.placeName= :name AND pd.placeVicinity LIKE :address')
                ->setParameters(array('name' => $name, 'address' =>  $address ))
                ->getQuery()
                ->getResult();
        $rows = count($qb);
        if ($rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    // Get places details
    public function getPlacesDetails($start = null, $limit = null) {
        $qb = $this->createQueryBuilder('place')
                ->select('place');

        if (false === is_null($start) && false === is_null($limit)) {
            $qb->where('place.placeId >= :start')
                    ->setParameter('start', $start)
                    ->setMaxResults($limit)
                    ->addOrderBy('place.placeId', 'ASC');
        }

        if (false === is_null($limit)) {
            $qb->setMaxResults($limit);
        }

        return $qb->getQuery()->getResult();
    }

    // Get total places
    public function getTotalPlaces() {
        $qb = $this->createQueryBuilder('place')
                ->select('place.placeId')
                ->setMaxResults(1)
                ->orderBy('place.placeId', 'DESC')
                ->getQuery()
                ->getResult();
        return $qb;
    }

    // Get place by id
    public function getPlaceById($id) {
        $qb = $this->createQueryBuilder('place')
                ->select('place')
                ->where('place.placeId = :id')
                ->setParameter('id', $id);
        return $qb->getQuery()->getResult();
    }

    // Get place details by name
    public function getPlaceDetailsByName($name) {
        $qb = $this->createQueryBuilder('place')
                ->select('place')
                ->where('place.placeName = :name')
                ->setParameter('name', $name);
        return $qb->getQuery()->getResult();
    }

    // Check for place
    public function checkPlaceDetails($id) {
        $qb = $this->createQueryBuilder('place')
                ->select('place.placeId')
                ->where('place.placeId = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getResult();

        $rows = count($qb);
        if ($rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    // Get suggest for auto complete
    function getAutoSuggest($input) {
        $qb = $this->createQueryBuilder('place')
                ->select('place.placeName')
                ->where('place.placeName LIKE :term')
                ->setParameter('term', $input . '%')
                ->setMaxResults(1)
                ->getQuery()
                ->getResult();

        return $qb;
    }

    // Update details table 
    public function updatePlaceDetails($id, $name, $phone, $addr, $lat, $lng, $rating, $icon, $url, $website) {
        $qb = $this->createQueryBuilder('')
                ->update('Bundle\PlacesBundle\Entity\PlaceDetails', 'place')
                ->set('place.placeName', ':name')
                ->set('place.placePhonenumber', ':phone')
                ->set('place.placeVicinity', ':addr')
                ->set('place.placeLat', ':lat')
                ->set('place.placeLng', ':lng')
                ->set('place.placeRating', ':rating')
                ->set('place.placeIcon', ':icon')
                ->set('place.placeUrl', ':url')
                ->set('place.placeWebsite', ':website')
                ->where('place.placeId = :id')
                ->setParameter('id', $id)
                ->setParameter('name', $name)
                ->setParameter('phone', $phone)
                ->setParameter('addr', $addr)
                ->setParameter('type', $type)
                ->setParameter('lat', $lat)
                ->setParameter('lng', $lng)
                ->setParameter('rating', $rating)
                ->setParameter('icon', $icon)
                ->setParameter('url', $url)
                ->setParameter('website', $website);

        return $qb->getQuery();
    }

    // Get the first id from the table
    public function getFirstId() {
        $qb = $this->createQueryBuilder('place')
                ->select('place.place_id')
                ->setMaxResults(1);
        return $qb->getQuery()->getResult();
    }

    // join places to get the slug for current place..
//    select pd.place_name, pd.id 'placeId', p.id, p.slug
//    from place_details pd join places p
//    on pd.place_id = p.id
//    limit 0,1
    // 
    /**
     * Get place slug from places tb.
     *
     * @return Result
     */
    public function getPlacesSlug($id) {
        $em = $this->getEntityManager();

        $query = $em
                ->createQuery("
                SELECT pd.placeName, p.slug
                FROM Bundle\PlacesBundle\Entity\PlaceDetails pd
                ,Bundle\PlacesBundle\Entity\Places p
                WHERE pd.placeId = p.id
                AND p.id = :id
            ")
                ->setParameter('id', $id);

        return $query->getResult();
    }

//    select pd.*, p.slug from place_details pd
//    , places p where p.id = pd.place_id
//    and p.slug = 'starbucks'
    // 

    public function getPlaceDetailsBySlug($slug) {
        $em = $this->getEntityManager();

        $query = $em
                ->createQuery("
                SELECT pd.placeName, pd.placeId, pd.placePhonenumber, pd.placeVicinity,
                pd.placeLat, pd.placeLng, pd.placeRating, pd.placeIcon, 
                pd.placeUrl, pd.placeWebsite, p.slug
                FROM Bundle\PlacesBundle\Entity\PlaceDetails pd
                ,Bundle\PlacesBundle\Entity\Places p
                WHERE pd.placeId = p.id
                AND p.slug = :slug
            ")
                ->setParameter('slug', $slug);

        return $query->getResult();
    }

}
