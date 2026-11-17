( function ( blocks, element, blockEditor, components, serverSideRender, i18n ) {
	const el = element.createElement;
	const { Fragment } = element;
	const { registerBlockType } = blocks;
	const { InspectorControls, useBlockProps } = blockEditor;
	const { PanelBody, TextControl, TextareaControl } = components;
	const ServerSideRender =
		serverSideRender && serverSideRender.default
			? serverSideRender.default
			: serverSideRender;
	const { __ } = i18n;

	if ( ! registerBlockType || ! InspectorControls || ! ServerSideRender ) {
		return;
	}

	registerBlockType( 'turborank/discovery-snapshot', {
		edit: function ( props ) {
			const { attributes, setAttributes } = props;
			const blockProps = useBlockProps( {
				className: 'tr-discovery-snapshot-block',
			} );

			return el(
				Fragment,
				null,
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: __( 'Header', 'turborank' ), initialOpen: true },
						el( TextControl, {
							label: __( 'Title', 'turborank' ),
							value: attributes.title || '',
							onChange: function ( value ) {
								setAttributes( { title: value } );
							},
						} ),
						el( TextControl, {
							label: __( 'Meta line', 'turborank' ),
							value: attributes.meta || '',
							onChange: function ( value ) {
								setAttributes( { meta: value } );
							},
						} ),
						el( TextControl, {
							label: __( 'Badge', 'turborank' ),
							value: attributes.badge || '',
							onChange: function ( value ) {
								setAttributes( { badge: value } );
							},
						} ),
						el( TextControl, {
							label: __( 'Accessible label', 'turborank' ),
							value: attributes.ariaLabel || '',
							onChange: function ( value ) {
								setAttributes( { ariaLabel: value } );
							},
						} )
					),
					el(
						PanelBody,
						{ title: __( 'Your brand stat', 'turborank' ), initialOpen: true },
						el( TextControl, {
							label: __( 'Label', 'turborank' ),
							value: attributes.stat1Label || '',
							onChange: function ( value ) {
								setAttributes( { stat1Label: value } );
							},
						} ),
						el( TextControl, {
							label: __( 'Stat line 1', 'turborank' ),
							value: attributes.stat1Pre || '',
							onChange: function ( value ) {
								setAttributes( { stat1Pre: value } );
							},
						} ),
						el( TextControl, {
							label: __( 'Stat emphasis', 'turborank' ),
							value: attributes.stat1Em || '',
							onChange: function ( value ) {
								setAttributes( { stat1Em: value } );
							},
						} ),
						el( TextControl, {
							label: __( 'Footnote', 'turborank' ),
							value: attributes.stat1Foot || '',
							onChange: function ( value ) {
								setAttributes( { stat1Foot: value } );
							},
						} )
					),
					el(
						PanelBody,
						{ title: __( 'Competitor stat', 'turborank' ), initialOpen: false },
						el( TextControl, {
							label: __( 'Label', 'turborank' ),
							value: attributes.stat2Label || '',
							onChange: function ( value ) {
								setAttributes( { stat2Label: value } );
							},
						} ),
						el( TextControl, {
							label: __( 'Stat', 'turborank' ),
							value: attributes.stat2Em || '',
							onChange: function ( value ) {
								setAttributes( { stat2Em: value } );
							},
						} ),
						el( TextControl, {
							label: __( 'Footnote', 'turborank' ),
							value: attributes.stat2Foot || '',
							onChange: function ( value ) {
								setAttributes( { stat2Foot: value } );
							},
						} )
					),
					el(
						PanelBody,
						{ title: __( 'Missed opportunity', 'turborank' ), initialOpen: false },
						el( TextControl, {
							label: __( 'Title', 'turborank' ),
							value: attributes.missedTitle || '',
							onChange: function ( value ) {
								setAttributes( { missedTitle: value } );
							},
						} ),
						el( TextareaControl, {
							label: __( 'Body', 'turborank' ),
							value: attributes.missedLine || '',
							onChange: function ( value ) {
								setAttributes( { missedLine: value } );
							},
							rows: 3,
						} )
					),
					el(
						PanelBody,
						{ title: __( 'First move', 'turborank' ), initialOpen: false },
						el( TextControl, {
							label: __( 'Title', 'turborank' ),
							value: attributes.moveTitle || '',
							onChange: function ( value ) {
								setAttributes( { moveTitle: value } );
							},
						} ),
						el( TextareaControl, {
							label: __( 'Description', 'turborank' ),
							value: attributes.moveText || '',
							onChange: function ( value ) {
								setAttributes( { moveText: value } );
							},
							rows: 4,
						} )
					),
					el(
						PanelBody,
						{ title: __( 'Footer', 'turborank' ), initialOpen: false },
						el( TextControl, {
							label: __( 'Strategist caption', 'turborank' ),
							value: attributes.strategistCaption || '',
							onChange: function ( value ) {
								setAttributes( { strategistCaption: value } );
							},
							help: __(
								'Photo is Matthew Pearce from the theme assets.',
								'turborank'
							),
						} )
					)
				),
				el(
					'div',
					blockProps,
					el( ServerSideRender, {
						block: 'turborank/discovery-snapshot',
						attributes: attributes,
					} )
				)
			);
		},
	} );
} )(
	window.wp.blocks,
	window.wp.element,
	window.wp.blockEditor,
	window.wp.components,
	window.wp.serverSideRender,
	window.wp.i18n
);
