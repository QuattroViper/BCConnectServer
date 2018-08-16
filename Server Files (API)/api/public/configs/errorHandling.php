<?php 

abstract class Error 
{

    // Not authorized
    const UNAUTHORIZED = 401;

    // Data is false from the Database
    const FALSEDATA = 410;

    // No record in the Database
    const NORECORD = 404;

    // No record in the Database
    const NOUSER = 416;

    // Found Student record in the Database
    const ALREADYUSER = 409;

    // Student is not Active / Banned.
    const NOTACTIVE = 403;

    // Ban Student.
    const BANSTUDENT = 428;

    // Authentication update failed
    const AUTHUPDATEFAILED = 405;

    // Token is not a known token
    const UNKOWNTOKEN = 401;

    // Connection error
    const CONNECTIONERROR = 503;

    // No Rank found
    const NORANK = 406;

    // Menu Item not open
    const MENUNOTOPEN = 423;

    // Database Connection Failed
    const DATABASEFAILED = 415;

    // If Menu settings could not be retrieved
    const NOTSETTIGNS = 451;

    // Notify of a ban
    const BANNOTIFY = 426;

}