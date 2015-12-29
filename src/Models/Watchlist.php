<?php

    namespace Tshafer\Watchable\Models;

    use Illuminate\Database\Eloquent\Model;
    use Cviebrock\EloquentSluggable\SluggableInterface;
    use Cviebrock\EloquentSluggable\SluggableTrait;

    /**
     * Class Watchlist.
     */
    class Watchlist extends Model implements SluggableInterface
    {

        use SluggableTrait;

        /**
         * @return array
         */
        protected $sluggable = [
            'build_from' => 'title',
            'save_to'    => 'slug',
        ];

        /**
         * @return array
         */
        protected $guarded = [ 'id', 'created_at', 'updated_at' ];

        /**
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function items()
        {
            return $this->hasMany( WatchlistItem::class );
        }

        /**
         * @return mixed
         */
        public function addItem( Model $model )
        {
            return ( new WatchlistItem() )->addItem( $this, $model );
        }

        /**
         * @return mixed
         */
        public function removeItem( Model $model )
        {
            return ( new WatchlistItem() )->removeItem( $this, $model );
        }

        /**
         * @return \Illuminate\Database\Eloquent\Relations\MorphTo
         */
        public function author()
        {
            return $this->morphTo( 'author' );
        }
    }
