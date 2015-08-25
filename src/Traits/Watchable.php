<?php

    namespace Tshafer\Watchable\Traits;

    use Tshafer\Watchable\Models\Watchlist;

    /**
     * Class Watchable.
     */
    trait Watchable
    {

        /**
         * @return \Illuminate\Database\Eloquent\Relations\MorphMany
         */
        public function watchlists()
        {
            return $this->morphMany( Watchlist::class, 'author' );
        }

        /**
         * @param $id
         *
         * @return mixed
         */
        public function getWatchlist( $id )
        {
            return $this->watchlists()->find( $id );
        }

        /**
         * @param $slug
         *
         * @return mixed
         */
        public function getWatchlistBySlug( $slug )
        {
            return $this->watchlists()->findBySlug( $slug );
        }

        /**
         * @param $type
         *
         * @return mixed
         */
        public function getWatchlistByType( $type )
        {
            return $this->watchlists()->whereType( $type )->get();
        }

        /**
         * @param $data
         *
         * @return mixed
         */
        public function createWatchlist( $data )
        {
            $data[ 'author_id' ]   = $this->id;
            $data[ 'author_type' ] = get_class( $this );

            return $this->watchlists()->create( $data );
        }

        /**
         * @param $id
         * @param $data
         *
         * @return mixed
         */
        public function updateWatchlist( $id, $data )
        {
            if (is_string( $id )) {
                $wishlist = $this->getWatchlistBySlug( $id );
            } else {
                $wishlist = $this->getWatchlist( $id );
            }

            return $wishlist->update( $data );
        }

        /**
         * @param $id
         *
         * @return mixed
         */
        public function deleteWatchlist( $id )
        {
            if (is_string( $id )) {
                $wishlist = $this->getWatchlistBySlug( $id );
            } else {
                $wishlist = $this->getWatchlist( $id );
            }

            return $wishlist->delete();
        }
    }
