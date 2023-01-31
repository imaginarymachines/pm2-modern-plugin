import React from 'react';
import { ExternalLink } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

import {
	Form,
	FormTable,
	TrSubmitButton,
} from '@imaginary-machines/wp-admin-components';

import ApiKeyField from '../components/ApiKeyField';
import useSettings from '../api/useSettings';

const SettingsForm = () => {
	const { isSaving, saveSettings } = useSettings();
	const [ values, setValues ] = React.useState( () => {
		//Try to set defaults from localized data
		// eslint-disable-next-line no-undef
		if ( ACTION_PREFIX.settings ) {
			// eslint-disable-next-line no-undef
			return ACTION_PREFIX.settings;
		}
		return {
			apiKey: '',
		};
	} );
	const id = 'settings-form';

	//Save settings handler
	const onSubmit = ( e ) => {
		e.preventDefault();
		saveSettings( values ).then( ( { update } ) => {
			setValues( { ...values, update } );
		} );
	};

	return (
		<div>
			<ExternalLink href="https://plugin-uri.com">
				{ __( 'Documentation' ) }
			</ExternalLink>
			<Form id={ id } onSubmit={ onSubmit }>
				<FormTable>
					<>
						<ApiKeyField
							value={ values.key }
							onChange={ ( value ) =>
								setValues( { ...values, key: value } )
							}
							isSaving={ isSaving }
						/>
						<TrSubmitButton
							id={ 'submit-button' }
							name={ 'submit-button' }
							value={ 'Save' }
						/>
						<>{ isSaving ? 'Saving...' : '' }</>
					</>
				</FormTable>
			</Form>
		</div>
	);
};
export default SettingsForm;
