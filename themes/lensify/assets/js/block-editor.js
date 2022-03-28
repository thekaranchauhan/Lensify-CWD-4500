wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
});
wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/image', 'rounded' );
} );

wp.blocks.registerBlockStyle( 'core/column', {
    name: 'blue-column',
    label: 'Blue Border',
} );
wp.blocks.registerBlockStyle( 'core/column', {
    name: 'tomato-column',
    label: 'Tomato Border',
} );

wp.blocks.registerBlockStyle( 'core/media-text', {
    name: 'border-mediatext',
    label: 'Border Text',
} );

wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/image', 'default' );
} );

wp.blocks.registerBlockStyle( 'core/group', {
    name: 'group-styled',
    label: 'Group Styled',
} );

wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/quote', 'plain' );
} ); 

wp.blocks.registerBlockStyle( 'core/table', {
    name: 'tomato-table',
    label: 'Tomato Table',
} );
wp.blocks.registerBlockStyle( 'core/table', {
    name: 'blue-table',
    label: 'Blue Table',
} );
wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/table', 'stripes' );
} );