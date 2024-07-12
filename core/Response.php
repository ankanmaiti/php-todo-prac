<?php
namespace core;

class Response {
  const NOT_FOUND = 404; // Resource not found
  const FORBIDDEN = 403; // Forbidden, unauthorized access

  const OK = 200; // OK
  const CREATED = 201; // Created
  const NO_CONTENT = 204; // No content

  const MOVED_PERMANENTLY = 301; // Moved permanently
  const FOUND = 302; // Found, temporary redirect
  const SEE_OTHER = 303; // See Other, redirect after POST
  const NOT_MODIFIED = 304; // Not Modified

  const BAD_REQUEST = 400; // Bad request
  const UNAUTHORIZED = 401; // Unauthorized
  const METHOD_NOT_ALLOWED = 405; // Method Not Allowed
  const CONFLICT = 409; // Conflict
  const GONE = 410; // Gone

  const INTERNAL_SERVER_ERROR = 500; // Internal Server Error
  const NOT_IMPLEMENTED = 501; // Not Implemented
  const SERVICE_UNAVAILABLE = 503; // Service Unavailable
}

