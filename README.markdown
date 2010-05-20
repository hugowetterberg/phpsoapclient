PHP SOAP Client for Node.js
==============================

A simple wrapper around a PHP SOAP call.

Usage
-------

    var phpsoap = require('phpsoapclient');

    phpsoap.call("http://example.com/example.wsdl", "ExampleMethod", {
        "paramA": "valueA",
        "paramB": "paramB"
      }, function(result) {
        // Do something with result
      });