<?php

namespace GeneratedHydratorGeneratedClass\__PM__\App\Entities\User;

class YToxOntzOjc6ImZhY3RvcnkiO3M6NDE6IkdlbmVyYXRlZEh5ZHJhdG9yXEZhY3RvcnlcSHlkcmF0b3JGYWN0b3J5Ijt9 implements \Zend\Hydrator\HydratorInterface
{
    private $hydrateCallbacks = array(), $extractCallbacks = array();
    function __construct()
    {
        $this->hydrateCallbacks[] = \Closure::bind(function ($object, $values) {
            if (isset($values['id']) || $object->id !== null && \array_key_exists('id', $values)) {
                $object->id = $values['id'];
            }
            if (isset($values['firstName']) || $object->firstName !== null && \array_key_exists('firstName', $values)) {
                $object->firstName = $values['firstName'];
            }
            if (isset($values['lastName']) || $object->lastName !== null && \array_key_exists('lastName', $values)) {
                $object->lastName = $values['lastName'];
            }
            if (isset($values['posts']) || $object->posts !== null && \array_key_exists('posts', $values)) {
                $object->posts = $values['posts'];
            }
            if (isset($values['createdAt']) || $object->createdAt !== null && \array_key_exists('createdAt', $values)) {
                $object->createdAt = $values['createdAt'];
            }
            if (isset($values['updatedAt']) || $object->updatedAt !== null && \array_key_exists('updatedAt', $values)) {
                $object->updatedAt = $values['updatedAt'];
            }
        }, null, 'App\\Entities\\User');
        $this->extractCallbacks[] = \Closure::bind(function ($object, &$values) {
            $values['id'] = $object->id;
            $values['firstName'] = $object->firstName;
            $values['lastName'] = $object->lastName;
            $values['posts'] = $object->posts;
            $values['createdAt'] = $object->createdAt;
            $values['updatedAt'] = $object->updatedAt;
        }, null, 'App\\Entities\\User');
    }
    function hydrate(array $data, $object)
    {
        $this->hydrateCallbacks[0]->__invoke($object, $data);
        return $object;
    }
    function extract($object)
    {
        $ret = array();
        $this->extractCallbacks[0]->__invoke($object, $ret);
        return $ret;
    }
}