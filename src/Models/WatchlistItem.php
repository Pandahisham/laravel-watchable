<?php

    namespace Tshafer\Watchable\Models;

    use Illuminate\Database\Eloquent\Model;

    /**
     * Class WatchlistItem.
     */
    class WatchlistItem extends Model
    {

        /**
         * @var array
         */
        protected $guarded = [ 'id', 'created_at', 'updated_at' ];

        /**
         * @var array
         */
        protected $with = [ 'watchable' ];

        /**
         * @return \Illuminate\Database\Eloquent\Relations\MorphTo
         */
        public function watchable()
        {
            return $this->morphTo();
        }

        /**
         * @param \Illuminate\Database\Eloquent\Model $watchlist
         * @param \Illuminate\Database\Eloquent\Model $watchable
         *
         * @return static
         */
        public function addItem( Model $watchlist, Model $watchable )
        {
            $data = [
                'watchlist_id'   => $watchlist->id,
                'watchable_id'   => $watchable->id,
                'watchable_type' => get_class( $watchable ),
            ];

            if ( ! $item = static::where( $data )->first()) {
                $item = new static( array_except( $data, [ 'watchlist_id' ] ) );

                $watchlist->items()->save( $item );
            }

            return $item;
        }

        /**
         * @param \Illuminate\Database\Eloquent\Model $watchlist
         * @param \Illuminate\Database\Eloquent\Model $watchable
         *
         * @return bool
         */
        public function removeItem( Model $watchlist, Model $watchable )
        {
            $data = [
                'watchlist_id'   => $watchlist->id,
                'watchable_id'   => $watchable->id,
                'watchable_type' => get_class( $watchable ),
            ];

            if ( ! $item = static::where( $data )->first()) {
                return false;
            }

            return $item->delete();
        }
    }
