var spawn = require('child_process').spawn;

exports.call = function (wsdl, method, arguments, callback) {
  var json = '',
    request = spawn("/usr/bin/env", ["php", __dirname + "/bin/soapclient.php", wsdl, method]);

  request.stdin.write(JSON.stringify(arguments), 'utf8');
  request.stdin.end();

  request.stdout.addListener('data', function (data) {
    json += data;
  });

  request.addListener('exit', function (code) {
    callback(JSON.parse(json));
  });
};