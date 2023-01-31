import React from 'react';
import apiFetch from '@wordpress/api-fetch';

//Function for saving settings
const saveSettings = async ( values ) => {
	const r = await apiFetch( {
		path: '/pm2-modern-plugin/v1/settings',
		method: 'POST',
		data: values,
	} ).then( ( res ) => {
		return res;
	} );
	return { update: r };
};

const getSettings = async () => {
	const r = await apiFetch( {
		path: '/pm2-modern-plugin/v1/settings',
		method: 'GET',
	} ).then( ( res ) => {
		return res;
	} );
};

/**
 * Hook for using settings
 *
 * @return {Object} {saveSettings: function,getSettings:function, isLoaded: boolean, isSaving: boolean, hasSaved: boolean}
 */
export const useSettings = () => {
	const [ isSaving, setIsSaving ] = React.useState( false );
	const [ hasSaved, setHasSaved ] = React.useState( false );
	const [ isLoaded, setIsLoaded ] = React.useState( false );
	//Reset the isSaving state after 2 seconds
	React.useEffect( () => {
		if ( hasSaved ) {
			const timer = setTimeout( () => {
				setIsSaving( false );
			}, 2000 );
			return () => clearTimeout( timer );
		}
	}, [ hasSaved ] );
	return {
		saveSettings: ( values ) => {
			setIsSaving( true );
			saveSettings( values ).then( () => {
				setIsSaving( false );
				setHasSaved( true );
			} );
		},
		getSettings: () => {
			setIsLoaded( true );
			getSettings().then( () => {
				setIsLoaded( false );
			} );
		},
		isLoaded,
		isSaving,
		hasSaved,
	};
};
export default useSettings;
