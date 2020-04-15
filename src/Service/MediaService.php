<?php


namespace App\Service;

use App\Entity\Media;
use App\Entity\Users;
use App\Entity\Log;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\MediaServiceInterface;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;



class MediaService implements MediaServiceInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager )
    {
        $this->entityManager = $entityManager;

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
     * @return string
     * @throws Exception
     */
    public function SetMedia(Request $request){

        $media = $this->entityManager->getRepository(Media::class)->findOneBy(['lien' => $request->get('lien')]);
        if($media){
            return 'this file already exist';
        }
        $media = new Media();

        
        $media->setTitre($request->get('titre'));
        $media->setDescription($request->get('description'));
        $media->setLien('---');
        $media->setType($request->get('type'));
        
        //Prepare and inject media into database
        $this->entityManager->persist($media);
        $this->entityManager->flush();

        //add to Log 
        $log = new Log();
        $log->setDate(new DateTime('now'));
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
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function ModifyMedia(int $id,Request $request){

        $media = $this->entityManager->getRepository(Media::class)->find($id);
        if($media){

            $media->setTitre($request->get('titre'));
            $media->setDescription($request->get('description'));
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
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
     * @param int $id
     * @return string
     * @throws Exception
     */
 public function DeleteMedia(int $id)
 {

            $media = $this->entityManager->getRepository(Media::class)->find($id);
            if($media){
            $this->entityManager->remove($media);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new DateTime('now'));
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

    /**
     * @param int $id
     * @param Request $request
     * @param string $uploadDir
     * @return string
     */
    public function UploadFile(Request $request, int $id , string $uploadDir)
    {
        
        /** @var UploadedFile $file */
        $file = ($request->files->get('image'));
        $filename = md5(uniqid()) . '.' . $file->guessClientExtension();
        if ($file) {
            $file->move(
                $uploadDir,
                $filename
            );

            $media = $this->entityManager->getRepository(Media::class)->find($id);
            if(!$media){ 
                return 'no media to upload found';
            }
            $media->setLien('/uploads/' . $filename);
            $this->entityManager->flush();
            return 'upload done ';
        }
        return 'no file';
    }

}