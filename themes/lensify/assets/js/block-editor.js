wp.domReady( function () {
    wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
} );

wp.blocks.registerBlockStyle( 'core/column', {
    name: 'gray-border',
    label: 'Gray Bordert',
} );
wp.blocks.registerBlockStyle( 'core/column', {
    name: 'teal-border',
    label: 'Teal Border',
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
    name: 'gray-table',
    label: 'Gray Table',
} );
wp.blocks.registerBlockStyle( 'core/table', {
    name: 'teal-table',
    label: 'Teal Table',
} );