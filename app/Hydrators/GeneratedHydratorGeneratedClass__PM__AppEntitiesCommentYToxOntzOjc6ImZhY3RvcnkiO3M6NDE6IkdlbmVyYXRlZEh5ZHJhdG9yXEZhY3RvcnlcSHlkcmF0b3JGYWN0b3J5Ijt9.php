<?php

namespace GeneratedHydratorGeneratedClass\__PM__\App\Entities\Comment;

class YToxOntzOjc6ImZhY3RvcnkiO3M6NDE6IkdlbmVyYXRlZEh5ZHJhdG9yXEZhY3RvcnlcSHlkcmF0b3JGYWN0b3J5Ijt9 implements \Zend\Hydrator\HydratorInterface
{
    private $hydrateCallbacks = array(), $extractCallbacks = array();
    function __construct()
    {
        $this->hydrateCallbacks[] = \Closure::bind(function ($object, $values) {
            if (isset($values['id']) || $object->id !== null && \array_key_exists('id', $values)) {
                $object->id = $values['id'];
            }
            if (isset($values['text']) || $object->text !== null && \array_key_exists('text', $values)) {
                $object->text = $values['text'];
            }
            if (isset($values['author']) || $object->author !== null && \array_key_exists('author', $values)) {
                $object->author = $values['author'];
            }
            if (isset($values['post']) || $object->post !== null && \array_key_exists('post', $values)) {
                $object->post = $values['post'];
            }
            if (isset($values['createdAt']) || $object->createdAt !== null && \array_key_exists('createdAt', $values)) {
                $object->createdAt = $values['createdAt'];
            }
            if (isset($values['updatedAt']) || $object->updatedAt !== null && \array_key_exists('updatedAt', $values)) {
                $object->updatedAt = $values['updatedAt'];
            }
        }, null, 'App\\Entities\\Comment');
        $this->extractCallbacks[] = \Closure::bind(function ($object, &$values) {
            $values['id'] = $object->id;
            $values['text'] = $object->text;
            $values['author'] = $object->author;
            $values['post'] = $object->post;
            $values['createdAt'] = $object->createdAt;
            $values['updatedAt'] = $object->updatedAt;
        }, null, 'App\\Entities\\Comment');
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