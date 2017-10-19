<?php

namespace Album\Model\Storage;

use Album\Model\Entity\AlbumEntity;

interface AlbumStorageInterface
{
    /**
     * Fetch a list of albums.
     *
     * @return AlbumEntity[]
     */
    public function fetchAlbumList();

    /**
     * Fetch an album by identifer.
     *
     * @param int $id
     * @return AlbumEntity|null
     */
    public function fetchAlbumById($id);

    /**
     * Insert an album into storage.
     *
     * @param AlbumEntity $album
     * @return bool
     */
    public function insertAlbum(AlbumEntity $album);

    /**
     * Update an album.
     *
     * @param AlbumEntity $album
     * @return bool
     */
    public function updateAlbum(AlbumEntity $album);

    /**
     * Delete an album.
     *
     * @param AlbumEntity $album
     * @return bool
     */
    public function deleteAlbum(AlbumEntity $album);
}
