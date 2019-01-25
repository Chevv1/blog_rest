<?php

namespace App\Models;

use App\Core\Model;

class Posts extends Model
{
    const TABLE_NAME = 'posts';

    public function getPosts()
    {
        $posts = $this->db->query('SELECT * FROM ' . self::TABLE_NAME);
        $posts = $posts->fetchAll($this->db::FETCH_ASSOC);

        return $posts;
    }

    public function getPost($id)
    {
        $post = $this->db->query('SELECT * FROM ' . self::TABLE_NAME . ' WHERE id = :id');
        $post->execute([':id' => $id]);
        $post = $post->fetch($this->db::FETCH_ASSOC);

        if (!$post) {
            return 'not found';
        }

        return $post;
    }

    public function addPost($title, $content, $authorId, $datePublished)
    {
        $sql = "INSERT INTO " . self::TABLE_NAME . " (title, content, author_id, date_published) VALUES (:title, :content, :authorId, :datePublished)";

        $result = $this->db->prepare($sql)->execute([
            ':title' => $title,
            ':content' => $content,
            ':authorId' => $authorId,
            ':datePublished' => $datePublished
        ]);

        return $result;
    }
}