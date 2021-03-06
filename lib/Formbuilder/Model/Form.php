<?php

namespace Formbuilder\Model;

use Pimcore\Model;

class Form extends Model\AbstractModel
{

    /**
     * @var
     */
    protected $table;

    /**
     * @var null
     */
    var $id = NULL;

    /**
     * @var null
     */
    var $name = NULL;

    /**
     * @var null
     */
    var $date = NULL;

    public function save()
    {
        return $this->getDao()->save();
    }

    public function delete()
    {
        return $this->getDao()->delete();
    }

    public static function getById($id)
    {
        $id = intval($id);

        if ($id < 1)
        {
            return NULL;
        }

        $obj = new self;
        $obj->getDao()->getById($id);

        return $obj;

    }

    public static function getByName($name)
    {
        $name = (string) $name;

        if ( empty( $name ) )
        {
            return NULL;
        }

        $obj = new self;
        $obj->getDao()->getByName($name);

        return $obj;
    }

    public function getAll()
    {
        $list = new Form\Listing;
        return $list->getData();
    }

    public function rename($newName )
    {
        $this->setName($newName);
        $this->save();
        return true;
    }

    public function setId($id)
    {
       $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getNameById($id)
    {
        $obj = new self;
        $obj->getDao()->getById($id);

        return $obj->name;
    }

    public function getIdByName($name)
    {
        $obj = new self;
        $obj->getDao()->getByName($name);

        return $obj->id;
    }

}