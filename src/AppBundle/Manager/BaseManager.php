<?php

namespace AppBundle\Manager;

abstract class BaseManager
{

    protected $em;

    /**
     * Enregistrement / Update d'une entité (Contenant une clé primaire nommée ID)
     *
     * @param multitype $entity
     */
    protected function save($entity)
    {
        if (!$entity->getId()) {
            $this->em->persist($entity);
        }
        $this->update();
    }

    /**
     * Sauvegarde d'une entity sans ID
     *
     * @param $entity
     */
    protected function saveNew($entity)
    {
        $this->em->persist($entity);
        $this->update();
    }

    /**
     * Mise a jour d'une entité
     */
    public function update()
    {
        $this->em->flush();
    }

    public function flushAll()
    {
        $this->em->flush();
    }

    /**
     * Retourne une entité vide
     *
     * @return multitype
     */
    public function createEmpty()
    {
        $className = $this->getRepository()->getClassName();
        return new $className();
    }

    /**
     * Récupère un enregistrement dans la base de donnée grace a un id
     *
     * @param multitype $id
     */
    public function findOneById($id)
    {
        return $this->getRepository()->find($id);
    }

    /**
     * Récupère les enregistrements selon les données passées en parametres
     *
     * @param array $criteria
     * @param array $orderBy
     * @param string $limit
     * @param string $offset
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->getRepository()->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * Récupère un enregistrement selon les données passées en paramètre
     *
     * @param array $criteria
     * @param array $orderBy
     */
    public function findOneBy(array $criteria, array $orderBy = null)
    {
        return $this->getRepository()->findOneBy($criteria, $orderBy);
    }

    /**
     * Récupère tous les enregistrements
     */
    public function findAll()
    {
        return $this->getRepository()->findAll();
    }

    /**
     * Supprime un enregistrement
     *
     * @param multitype $entity
     */
    public function deleteOne($entity)
    {
        $this->em->remove($entity);
        $this->update();
    }

    /**
     * Met a jour les ordre d'un élément
     *
     * @param integer $idElement
     * @param integer $numOrdre
     */
    public function majOrdre($idElement, $numOrdre)
    {
        $element = $this->findOneById($idElement);
        if ($element) {
            $element->setNumOrdre($numOrdre);
            $this->update();
        }
    }

    /**
     * Permet de valider une entité avec le service validator qui lit les règles de la classe
     *
     * @param unknown $entity
     * @return \AFT\ConceptionBundle\Manager\Response
     */
    public function isValid($entity)
    {
        $result = new \stdClass();
        if (!is_a($entity, get_class($this->createEmpty()))) {
            $result->valid = false;
            $result->errors = array(
                array(
                    'message' => "Un des éléments n'est pas valide",
                    'log' => 'Objet ' . get_class($this->createEmpty()) . ' attendu (' . gettype($entity) . 'spécifié)',
                ),
            );
        } else {
            $validator = $this->container->get('validator');
            $errorList = $validator->validate($entity);
            if (count($errorList) > 0) {
                $result->valid = false;
                $result->errors = $errorList;
            } else {
                $result->valid = true;
            }
        }
        return $result;
    }

    /**
     * enregistre un element
     *
     * @param multitype $entity
     * @param boolean $noId
     */
    public function saveOne($entity, $noId = false)
    {
        if ($noId) {
            $this->saveNew($entity);
        } else {
            $this->save($entity);
        }
    }

    /**
     * rafraichit un element pour avoir les données flush récemment
     *
     * @param multitype $entity
     */
    public function refresh($entity)
    {
        $this->em->refresh($entity);
    }
}
