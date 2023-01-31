import React from 'react';
import { __ } from '@wordpress/i18n';

import { Notice, Metabox } from '@imaginary-machines/wp-admin-components';
export default function OtherTab() {
	return (
		<div>
			<Notice
				description={ __(
					'Tabs uses @imaginary-machines/wp-admin-components'
				) }
				type="info"
				link="https://imaginarymachines.github.io/wp-admin-components/?path=/story/readme--page"
			/>
			<Notice
				heading={ __( 'Notices can have headings!' ) }
				description={ __( 'You should probably remove this' ) }
				type="error"
				link="https://imaginarymachines.github.io/wp-admin-components/?path=/story/readme--page"
			/>
			<Metabox title="The Title">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
				sollicitudin tortor lorem, a aliquet elit ultricies eu. In vitae
				enim et odio vehicula lacinia ac a tellus. Curabitur sodales,
				justo sodales tristique dignissim, nibh diam ultrices leo, ac
				vulputate quam felis eget metus. Suspendisse ac mauris sapien.
				In a velit finibus, viverra mi eget, lacinia risus. Mauris augue
				ex, vulputate vitae iaculis quis, ornare eget nibh. Etiam quis
				lacus nec nulla ullamcorper mattis nec nec ligula. Aenean diam
				velit, tristique et dolor a, varius convallis nulla. Mauris
				imperdiet molestie metus in ornare.
			</Metabox>
		</div>
	);
}
