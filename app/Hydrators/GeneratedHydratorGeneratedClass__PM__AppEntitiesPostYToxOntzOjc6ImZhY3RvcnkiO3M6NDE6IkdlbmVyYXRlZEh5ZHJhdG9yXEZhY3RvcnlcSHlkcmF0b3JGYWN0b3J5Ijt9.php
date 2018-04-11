<?php

namespace GeneratedHydratorGeneratedClass\__PM__\App\Entities\Post;

class YToxOntzOjc6ImZhY3RvcnkiO3M6NDE6IkdlbmVyYXRlZEh5ZHJhdG9yXEZhY3RvcnlcSHlkcmF0b3JGYWN0b3J5Ijt9 implements \Zend\Hydrator\HydratorInterface
{
    private $hydrateCallbacks = array(), $extractCallbacks = array();
    function __construct()
    {
        $this->hydrateCallbacks[] = \Closure::bind(function ($object, $values) {
            if (isset($values['id']) || $object->id !== null && \array_key_exists('id', $values)) {
                $object->id = $values['id'];
            }
            if (isset($values['title']) || $object->title !== null && \array_key_exists('title', $values)) {
                $object->title = $values['title'];
            }
            if (isset($values['body']) || $object->body !== null && \array_key_exists('body', $values)) {
                $object->body = $values['body'];
            }
            if (isset($values['published']) || $object->published !== null && \array_key_exists('published', $values)) {
                $object->published = $values['published'];
            }
            if (isset($values['author']) || $object->author !== null && \array_key_exists('author', $values)) {
                $object->author = $values['author'];
            }
            if (isset($values['comments']) || $object->comments !== null && \array_key_exists('comments', $values)) {
                $object->comments = $values['comments'];
            }
            if (isset($values['tags']) || $object->tags !== null && \array_key_exists('tags', $values)) {
                $object->tags = $values['tags'];
            }
            if (isset($values['createdAt']) || $object->createdAt !== null && \array_key_exists('createdAt', $values)) {
                $object->createdAt = $values['createdAt'];
            }
            if (isset($values['updatedAt']) || $object->updatedAt !== null && \array_key_exists('updatedAt', $values)) {
                $object->updatedAt = $values['updatedAt'];
            }
        }, null, 'App\\Entities\\Post');
        $this->extractCallbacks[] = \Closure::bind(function ($object, &$values) {
            $values['id'] = $object->id;
            $values['title'] = $object->title;
            $values['body'] = $object->body;
            $values['published'] = $object->published;
            $values['author'] = $object->author;
            $values['comments'] = $object->comments;
            $values['tags'] = $object->tags;
            $values['createdAt'] = $object->createdAt;
            $values['updatedAt'] = $object->updatedAt;
        }, null, 'App\\Entities\\Post');
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