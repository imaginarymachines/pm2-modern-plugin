import React from 'react';

import { FieldTr, Input } from '@imaginary-machines/wp-admin-components';
import { Spinner } from '@wordpress/components';

const name = 'apiKey';
const label = 'Api Key';
const id = 'apiKey';
const ApiKeyField = ( { value, onChange, isSaving } ) => {
	return (
		<FieldTr name={ name } label={ label } id={ id }>
			<Input
				label={ label }
				id={ id }
				name={ name }
				value={ value }
				onChange={ onChange }
			/>
			{ ! isSaving ? <Spinner /> : null }
		</FieldTr>
	);
};
export default ApiKeyField;
