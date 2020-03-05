<?php


namespace App\Service;

use App\Entity\Presentation;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\PresentationServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;

class PresentationService implements PresentationServiceInterface
{
    private $entityManager;
    private $propertyAccessor;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
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
    function getAllPresentation() {
        $presentation = $this->entityManager->getRepository(Presentation::class)->findAll();
        return $presentation;
    }



    /**
     * @param int $id
     * @return object|null
     */
    function getPresentationById(int $id)
    {
        return $this->entityManager->getRepository(Presentation::class)->find($id);
    }

    /**
     * @param Request $request
     */
    public function SetPresentation(Request $request){

        $presentation = $this->entityManager->getRepository(Presentation::class)->findOneBy(['nom' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[nom]')]);
        if($presentation){
            return 'this presentation already exist';
        }
        $presentation = new Presentation();
        $presentation->setTitre($this->entityManager->getRepository(Presentation::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]')));
        $presentation->setTerritories($this->entityManager->getRepository(Presentation::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[territories]')));
        
        //Prepar and inject product into database
        $this->entityManager->persist($presentation);
        $this->entityManager->flush();

        return 'Presentation added successfully ';
    }


    /**
     * @param Request $request
     */
    public function ModifyPresentation(Request $request){

        $presentation = $this->entityManager->getRepository(Presentation::class)->findOneBy(['titre' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]')]);
        if($presentation){

            $presentation->setTitre($this->entityManager->getRepository(Presentation::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]')));
            $presentation->setTerritories($this->entityManager->getRepository(Presentation::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[territories]')));
           // $presentation->addProject(add one project exist but u need to add multiple projects function);
           // $presentation->addProduct(add one product exist but u need to add multiple products function);
           // $presentation->setPresentationCreator(Getting Creator Id from Session);
        
            $this->entityManager->flush();

            return ' presentation '.$presentation->getTitre().' Modifed successfully ';
        }

        return 'presentation was not found ';
    }

    
    /**
     * @param Request $request
     */
    public function DeletePresentation(Request $request){

        $presentationID = $this->propertyAccessor->getValue($this->ConvertToArray($request),'[id]');
        $presentation = $this->entityManager->getRepository(presentation::class)->find($presentationID);
        if($presentation){
            $this->entityManager->remove($presentation);
            $this->entityManager->flush();
            return 'presentation has been Deleted' ;
        }
            return 'presentation dosn\'t exist';
    }
    
}