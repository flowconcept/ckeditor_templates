/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

// Register a templates definition set named "default".
CKEDITOR.addTemplates( 'default', {
	// The name of sub folder which hold the shortcut preview images of the
	// templates.
	imagesPath: CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + '../../../templates/images/' ),

	// The templates definitions.
	templates: [ {
		title: 'Polaroid',
		image: 'polaroid.gif',
		description: 'Bild mit Untertitel im Sofortbildkamera-Stil',
		html: '<figure class="instant">' +
			// Use src=" " so image is not filtered out by the editor as incorrect (src is required).
			'<img src=" " alt="" height="244" width="360" />' +
      '<figcaption>' +
			'<h3>Untertitel</h3>' +
			'</figcaption>' +
      '</figure>'
	} ]
} );
