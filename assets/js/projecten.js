/**
 * Projecten: filterbare flip-tegels.
 */
( function () {
  var tiles = document.querySelectorAll( '.flip-tile' );
  tiles.forEach( function ( tile ) {
    tile.addEventListener( 'click', function ( e ) {
      if ( e.target.closest( 'a' ) ) {
        return;
      }
      tile.classList.toggle( 'is-flipped' );
    } );
  } );

  var knoppen = document.querySelectorAll( '.filter-btn' );
  knoppen.forEach( function ( knop ) {
    knop.addEventListener( 'click', function () {
      knoppen.forEach( function ( k ) { k.classList.remove( 'is-active' ); } );
      knop.classList.add( 'is-active' );
      var f = knop.dataset.filter;
      tiles.forEach( function ( tile ) {
        var cats = ( tile.dataset.cats || tile.dataset.cat || '' ).split( ' ' );
        tile.style.display = ( f === 'all' || cats.indexOf( f ) !== -1 ) ? '' : 'none';
      } );
    } );
  } );
} )();
