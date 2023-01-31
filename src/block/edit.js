import { __ } from '@wordpress/i18n';
import React from 'react';
import { useBlockProps, BlockControls } from '@wordpress/block-editor';
import { ToolbarGroup, ToolbarButton } from '@wordpress/components';

import './editor.scss';

export default function Edit( { attributes } ) {
	const content = attributes.content || '';
	const handler = () => {
		// eslint-disable-next-line
		alert( 'Hello World!' );
	};

	return (
		<p { ...useBlockProps() }>
			<BlockControls>
				<ToolbarGroup>
					<ToolbarButton
						icon={ 'redo' }
						label={ __( 'Button Label' ) }
						onClick={ handler }
					/>
				</ToolbarGroup>
			</BlockControls>
			{ content }
		</p>
	);
}
