import { useEffect } from 'react';
const RunOnce = ( { fn } ) => {
	useEffect( () => {
		fn();
	}, [] );
	return null;
};
export default RunOnce;
