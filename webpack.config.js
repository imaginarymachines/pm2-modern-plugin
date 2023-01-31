const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );

module.exports = {
    ...defaultConfig,
    entry: {
        ...defaultConfig.entry,
        settings: path.resolve( process.cwd(), 'src/settings', 'index.js' ),
		'block/index': path.resolve( process.cwd(), 'src/block', 'index.js' ),
    }
};
