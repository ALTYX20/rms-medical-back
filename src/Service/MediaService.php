<?php


namespace App\Service;

use App\Entity\Media;
use App\Entity\Users;
use App\Entity\Log;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\MediaServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class MediaService implements MediaServiceInterface
{
    private $entityManager;
    private $propertyAccessor;
    private $session;

    public function __construct(EntityManagerInterface $entityManager , SessionInterface $session)
    {
        $this->entityManager = $entityManager;
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
        $this->session = $session;
    }

    
    /**
     * @param Request $request
     * @return object[]
     */
    public function ConvertToArray(Request $request){

        // Getting Parameters from Json Request
        $parameters = [];
        if ($content = $request->getContent()) {
            $parameters = json_decode($content, true);
        }
        return $parameters;

    }

    /**
     * @return object[]
     */
    function getAllMedia() {
        
        return $this->entityManager->createQueryBuilder()
            ->select('m.id , m.titre , m.description , m.lien , m.type')
            ->from('App:Media', 'm')
            ->getQuery()->getResult();

    }



    /**
     * @param int $id
     * @return object|null
     */
    function getMediaById(int $id)
    {
        return $this->entityManager->createQueryBuilder()
            ->select('m.id , m.titre , m.description , m.lien , m.type ')
            ->from('App:Media', 'm')
            ->where('m.id = :id')
            ->setParameter('id', $id)
            ->getQuery()->getResult();

    }

    /**
     * @param Request $request
     */
    public function SetMedia(Request $request){

        $media = $this->entityManager->getRepository(Media::class)->findOneBy(['lien' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[lien]')]);
        if($media){
            return 'this file already exist';
        }
        $media = new Media();
        $media->setTitre($this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]'));
        $media->setDescription($this->propertyAccessor->getValue($this->ConvertToArray($request), '[description]'));
        $media->setLien($this->propertyAccessor->getValue($this->ConvertToArray($request), '[lien]'));
        $media->setType($this->propertyAccessor->getValue($this->ConvertToArray($request), '[type]'));
        
        //Prepare and inject media into database
        $this->entityManager->persist($media);
        $this->entityManager->flush();

        //add to Log 
        $log = new Log();
        $log->setDate(new \DateTime('now'));
        $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
        $log->setAction("Add Media");
        $log->setModule("Media");
        $log->setUrl('/media');
        $this->entityManager->persist($log);
        $this->entityManager->flush(); 

        return 'Media added successfully ';
    }


    /**
     * @param Request $request
     */
    public function ModifyMedia(Request $request){

        $media = $this->entityManager->getRepository(Media::class)->findOneBy(['id' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[id]')]);
        if($media){

            $media->setTitre($this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]'));
            $media->setDescription($this->propertyAccessor->getValue($this->ConvertToArray($request), '[description]'));
            $media->setLien($this->propertyAccessor->getValue($this->ConvertToArray($request), '[lien]'));
        
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new \DateTime('now'));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
            $log->setAction("Modify Media");
            $log->setModule("Media");
            $log->setUrl('/media');
            $this->entityManager->persist($log);
            $this->entityManager->flush(); 

            return 'Media Modified successfully ';
        }

        return 'Media was not found ';
    }

    
    /**
     * @param Request $request
     */
    public function DeleteMedia(Request $request){

        $mediaID = $this->propertyAccessor->getValue($this->ConvertToArray($request),'[id]');
        $media = $this->entityManager->getRepository(Media::class)->find($mediaID);
        if($media){
            $this->entityManager->remove($media);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new \DateTime('now'));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
            $log->setAction("Delete Media");
            $log->setModule("Media");
            $log->setUrl('/media');
            $this->entityManager->persist($log);
            $this->entityManager->flush(); 
            return 'media has been Deleted' ;
        }
            return 'media doesn\'t exist';

    }
    
}