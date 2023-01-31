var fs = require('fs');
var archiver = require('archiver');
const slug = 'pm2-modern-plugin';
var output = fs.createWriteStream(`${slug}.zip`);
var archive = archiver('zip');

console.log( 'Zipping!')
output.on('close', function () {
    console.log('Zipped!');
    console.log(archive.pointer() + ' total bytes');
});

archive.on('error', function(err){
    throw err;
});

archive.pipe(output);

archive.append(fs.createReadStream(
    __dirname + `/${slug}.php`
), { name: `/${slug}.php` });

//Directories to copy
['php', 'build', 'vendor/composer'].forEach( ( dir ) => {
	archive.directory(dir, '/' + dir);
});

archive.append(fs.createReadStream(
    __dirname + '/vendor/autoload.php'
), { name: 'vendor/autoload.php' });

archive.finalize();
