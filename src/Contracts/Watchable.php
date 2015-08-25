<?php

    namespace Tshafer\Watchable\Contracts;

    /**
     * Interface Watchable
     *
     * @package Tshafer\Watchable\Contracts
     */
    interface Watchable
    {

        /**
         * @return mixed
         */
        public function watchlists();

        /**
         * @param $id
         *
         * @return mixed
         */
        public function getWatchlist( $id );

        /**
         * @param $slug
         *
         * @return mixed
         */
        public function getWatchlistBySlug( $slug );

        /**
         * @param $type
         *
         * @return mixed
         */
        public function getWatchlistByType( $type );

        /**
         * @param $data
         *
         * @return mixed
         */
        public function createWatchlist( $data );

        /**
         * @param $id
         * @param $data
         *
         * @return mixed
         */
        public function updateWatchlist( $id, $data );

        /**
         * @param $id
         *
         * @return mixed
         */
        public function deleteWatchlist( $id );
    }
