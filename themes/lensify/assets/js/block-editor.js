/*
1. Button Blocks
2. Image Blocks
3. Column Blocks
4. Media & Text Blocks
5. Quote Blocks
6. Table Blocks
7. Group Blocks
*/

// Button Blocks
wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
});

// Image Blocks
wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/image', 'rounded' );
} );

// Column Blocks
wp.blocks.registerBlockStyle( 'core/column', {
    name: 'blue-column',
    label: 'Blue Border',
} );
wp.blocks.registerBlockStyle( 'core/column', {
    name: 'tomato-column',
    label: 'Tomato Border',
} );

// Media & Text Blocks
wp.blocks.registerBlockStyle( 'core/media-text', {
    name: 'border-mediatext',
    label: 'Border Text',
} );

// Quote Blocks
wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/quote', 'plain' );
} ); 

// Table Blocks
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

// Group Blocks
wp.blocks.registerBlockStyle( 'core/group', {
    name: 'group-styled',
    label: 'Group Styled',
} );