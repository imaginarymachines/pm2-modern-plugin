import { render } from 'react-dom';

import React from 'react';

import { Tabs } from '@imaginary-machines/wp-admin-components';
import { __ } from '@wordpress/i18n';
import SettingsForm from './settingsTab';
import OtherTab from './otherTab';
const tabs = [
	{
		children: <SettingsForm />,
		id: 'settings',
		label: 'Settings',
	},
	{
		children: <OtherTab />,
		id: 'otherTab',
		label: 'Other',
	},
];

/**
 * Primary App Component
 */
const App = () => {
	return <Tabs initialTab="settings" tabs={ tabs } />;
};

/**
 * Load the settings page
 */
render( <App />, document.getElementById( 'pm2-modern-plugin-settings' ) );
