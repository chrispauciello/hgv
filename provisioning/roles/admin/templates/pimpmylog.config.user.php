<?php
/*! pimpmylog - 1.7.7 - 82a1a7504873a6aed42a95a13b42ec8f8d12213f*/
/*
* pimpmylog
* http://pimpmylog.com
*
* Copyright (c) 2014 Potsky, contributors
* Licensed under the GPLv3 license.
*/
?>
<?php if(realpath(__FILE__)===realpath($_SERVER["SCRIPT_FILENAME"])){header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');die();}?>
{
    "globals": {
        "_remove_me_to_set_AUTH_LOG_FILE_COUNT"         : 100,
        "_remove_me_to_set_AUTO_UPGRADE"                : false,
        "_remove_me_to_set_CHECK_UPGRADE"               : true,
        "_remove_me_to_set_EXPORT"                      : true,
        "_remove_me_to_set_FILE_SELECTOR"               : "bs",
        "_remove_me_to_set_FOOTER"                      : "&copy; <a href=\"http:\/\/www.potsky.com\" target=\"doc\">Potsky<\/a> 2007-' . YEAR . ' - <a href=\"http:\/\/pimpmylog.com\" target=\"doc\">Pimp my Log<\/a>",
            "_remove_me_to_set_FORGOTTEN_YOUR_PASSWORD_URL" : "http:\/\/support.pimpmylog.com\/kb\/misc\/forgotten-your-password",
            "_remove_me_to_set_GEOIP_URL"                   : "http:\/\/www.geoiptool.com\/en\/?IP=%p",
            "_remove_me_to_set_GOOGLE_ANALYTICS"            : "UA-XXXXX-X",
            "_remove_me_to_set_HELP_URL"                    : "http:\/\/pimpmylog.com",
            "_remove_me_to_set_LOCALE"                      : "gb_GB",
            "_remove_me_to_set_LOGS_MAX"                    : 50,
            "_remove_me_to_set_LOGS_REFRESH"                : 0,
            "_remove_me_to_set_MAX_SEARCH_LOG_TIME"         : 5,
            "_remove_me_to_set_NAV_TITLE"                   : "",
            "_remove_me_to_set_NOTIFICATION"                : true,
            "_remove_me_to_set_NOTIFICATION_TITLE"          : "New logs [%f]",
            "_remove_me_to_set_PIMPMYLOG_ISSUE_LINK"        : "https:\/\/github.com\/potsky\/PimpMyLog\/issues\/",
            "_remove_me_to_set_PIMPMYLOG_VERSION_URL"       : "http:\/\/demo.pimpmylog.com\/version.js",
            "_remove_me_to_set_PULL_TO_REFRESH"             : true,
            "_remove_me_to_set_SORT_LOG_FILES"              : "default",
            "_remove_me_to_set_TAG_DISPLAY_LOG_FILES_COUNT" : true,
            "_remove_me_to_set_TAG_NOT_TAGGED_FILES_ON_TOP" : true,
            "_remove_me_to_set_TAG_SORT_TAG"                : "default | display-asc | display-insensitive | display-desc | display-insensitive-desc",
            "_remove_me_to_set_TITLE"                       : "Pimp my Log",
            "_remove_me_to_set_TITLE_FILE"                  : "Pimp my Log [%f]",
            "_remove_me_to_set_UPGRADE_MANUALLY_URL"        : "http:\/\/pimpmylog.com\/getting-started\/#update",
            "_remove_me_to_set_USER_CONFIGURATION_DIR"      : "config.user.d",
            "_remove_me_to_set_USER_TIME_ZONE"              : "Europe\/Paris"
        },

        "badges": {
            "severity": {
                "debug"       : "success",
                "info"        : "success",
                "notice"      : "default",
                "Notice"      : "info",
                "warn"        : "warning",
                "error"       : "danger",
                "crit"        : "danger",
                "alert"       : "danger",
                "emerg"       : "danger",
                "Notice"      : "info",
                "fatal error" : "danger",
                "parse error" : "danger",
                "Warning"     : "warning"
            },
            "http": {
                "1" : "info",
                "2" : "success",
                "3" : "default",
                "4" : "warning",
                "5" : "danger"
            }
        },

        "files": {
            "nginx1": {
                "display" : "PHP-FPM NGINX Access Log",
                "path"    : "\/var\/log\/nginx\/php.hgv.dev.apachestyle.access.log",
                "refresh" : 0,
                "max"     : 10,
                "notify"  : false,
                "format"  : {
                    "type"         : "NCSA Extended",
                    "regex"        : "|^((\\S*) )*(\\S*) (\\S*) (\\S*) \\[(.*)\\] \"(\\S*) (.*) (\\S*)\" ([0-9]*) (.*)( \"(.*)\" \"(.*)\"( [0-9]*/([0-9]*))*)*$|U",
                    "export_title" : "URL",
                    "match"        : {
                        "Date"    : 6,
                        "IP"      : 3,
                        "CMD"     : 7,
                        "URL"     : 8,
                        "Code"    : 10,
                        "Size"    : 11,
                        "Referer" : 13,
                        "UA"      : 14,
                        "User"    : 5
                    },
                    "types": {
                        "Date"    : "date:H:i:s",
                        "IP"      : "ip:geo",
                        "URL"     : "txt",
                        "Code"    : "badge:http",
                        "Size"    : "numeral:0b",
                        "Referer" : "link",
                        "UA"      : "ua:{os.name} {os.version} | {browser.name} {browser.version}\/100"
                    },
                    "exclude": {
                        "URL": ["\/favicon.ico\/", "\/\\.pml\\.php\\.*$\/"],
                        "CMD": ["\/OPTIONS\/"]
                    }
                }
            },
            "nginx2": {
                "display" : "PHP-FPM NGINX Error Log",
                "path"    : "\/var\/log\/nginx\/php.hgv.dev.error.log",
                "refresh" : 5,
                "max"     : 10,
                "notify"  : true,
                "format"    : {
                    "type"         : "NGINX",
                    "regex"        : "@^(.*)/(.*)/(.*) (.*):(.*):(.*) \\[(.*)\\] [0-9#]*: \\*[0-9]+ (((.*), client: (.*), server: (.*), request: \"(.*) (.*) HTTP.*\", host: \"(.*)\"(, referrer: \"(.*)\")*)|(.*))$@U",
                    "export_title" : "Error",
                    "match"        : {
                        "Date"     : [1,"\/",2,"\/",3," ",4,":",5,":",6],
                        "Severity" : 7,
                        "Error"    : [10,18],
                        "Client"   : 11,
                        "Server"   : 12,
                        "Method"   : 13,
                        "Request"  : 14,
                        "Host"     : 15,
                        "Referer"  : 17
                    },
                    "types"    : {
                        "Date"     : "date:d\/m\/Y H:i:s \/100",
                        "Severity" : "badge:severity",
                        "Error"    : "pre",
                        "Client"   : "ip:http",
                        "Server"   : "txt",
                        "Method"   : "txt",
                        "Request"  : "txt",
                        "Host"     : "ip:http",
                        "Referer"  : "link"
                    }
                }
            },
            "nginx3": {
                "display" : "HHVM NGINX Access Log",
                "path"    : "\/var\/log\/nginx\/hhvm.hgv.dev.apachestyle.access.log",
                "refresh" : 0,
                "max"     : 10,
                "notify"  : false,
                "format"  : {
                    "type"         : "NCSA Extended",
                    "regex"        : "|^((\\S*) )*(\\S*) (\\S*) (\\S*) \\[(.*)\\] \"(\\S*) (.*) (\\S*)\" ([0-9]*) (.*)( \"(.*)\" \"(.*)\"( [0-9]*/([0-9]*))*)*$|U",
                    "export_title" : "URL",
                    "match"        : {
                        "Date"    : 6,
                        "IP"      : 3,
                        "CMD"     : 7,
                        "URL"     : 8,
                        "Code"    : 10,
                        "Size"    : 11,
                        "Referer" : 13,
                        "UA"      : 14,
                        "User"    : 5
                    },
                    "types": {
                        "Date"    : "date:H:i:s",
                        "IP"      : "ip:geo",
                        "URL"     : "txt",
                        "Code"    : "badge:http",
                        "Size"    : "numeral:0b",
                        "Referer" : "link",
                        "UA"      : "ua:{os.name} {os.version} | {browser.name} {browser.version}\/100"
                    },
                    "exclude": {
                        "URL": ["\/favicon.ico\/", "\/\\.pml\\.php\\.*$\/"],
                        "CMD": ["\/OPTIONS\/"]
                    }
                }
            },
            "nginx4": {
                "display" : "HHVM NGINX Error Log",
                "path"    : "\/var\/log\/nginx\/hhvm.hgv.dev.error.log",
                "refresh" : 5,
                "max"     : 10,
                "notify"  : true,
                "format"    : {
                    "type"         : "NGINX",
                    "regex"        : "@^(.*)/(.*)/(.*) (.*):(.*):(.*) \\[(.*)\\] [0-9#]*: \\*[0-9]+ (((.*), client: (.*), server: (.*), request: \"(.*) (.*) HTTP.*\", host: \"(.*)\"(, referrer: \"(.*)\")*)|(.*))$@U",
                    "export_title" : "Error",
                    "match"        : {
                        "Date"     : [1,"\/",2,"\/",3," ",4,":",5,":",6],
                        "Severity" : 7,
                        "Error"    : [10,18],
                        "Client"   : 11,
                        "Server"   : 12,
                        "Method"   : 13,
                        "Request"  : 14,
                        "Host"     : 15,
                        "Referer"  : 17
                    },
                    "types"    : {
                        "Date"     : "date:d\/m\/Y H:i:s \/100",
                        "Severity" : "badge:severity",
                        "Error"    : "pre",
                        "Client"   : "ip:http",
                        "Server"   : "txt",
                        "Method"   : "txt",
                        "Request"  : "txt",
                        "Host"     : "ip:http",
                        "Referer"  : "link"
                    }
                }
            },
            "nginx5": {
                "display" : "Cached PHP-FPM NGINX Access Log",
                "path"    : "\/var\/log\/nginx\/cache.php.hgv.dev.apachestyle.access.log",
                "refresh" : 0,
                "max"     : 10,
                "notify"  : false,
                "format"  : {
                    "type"         : "NCSA Extended",
                    "regex"        : "|^((\\S*) )*(\\S*) (\\S*) (\\S*) \\[(.*)\\] \"(\\S*) (.*) (\\S*)\" ([0-9]*) (.*)( \"(.*)\" \"(.*)\"( [0-9]*/([0-9]*))*)*$|U",
                    "export_title" : "URL",
                    "match"        : {
                        "Date"    : 6,
                        "IP"      : 3,
                        "CMD"     : 7,
                        "URL"     : 8,
                        "Code"    : 10,
                        "Size"    : 11,
                        "Referer" : 13,
                        "UA"      : 14,
                        "User"    : 5
                    },
                    "types": {
                        "Date"    : "date:H:i:s",
                        "IP"      : "ip:geo",
                        "URL"     : "txt",
                        "Code"    : "badge:http",
                        "Size"    : "numeral:0b",
                        "Referer" : "link",
                        "UA"      : "ua:{os.name} {os.version} | {browser.name} {browser.version}\/100"
                    },
                    "exclude": {
                        "URL": ["\/favicon.ico\/", "\/\\.pml\\.php\\.*$\/"],
                        "CMD": ["\/OPTIONS\/"]
                    }
                }
            },
            "nginx6": {
                "display" : "Cached PHP-FPM NGINX Error Log",
                "path"    : "\/var\/log\/nginx\/cache.php.hgv.dev.error.log",
                "refresh" : 5,
                "max"     : 10,
                "notify"  : true,
                "format"    : {
                    "type"         : "NGINX",
                    "regex"        : "@^(.*)/(.*)/(.*) (.*):(.*):(.*) \\[(.*)\\] [0-9#]*: \\*[0-9]+ (((.*), client: (.*), server: (.*), request: \"(.*) (.*) HTTP.*\", host: \"(.*)\"(, referrer: \"(.*)\")*)|(.*))$@U",
                    "export_title" : "Error",
                    "match"        : {
                        "Date"     : [1,"\/",2,"\/",3," ",4,":",5,":",6],
                        "Severity" : 7,
                        "Error"    : [10,18],
                        "Client"   : 11,
                        "Server"   : 12,
                        "Method"   : 13,
                        "Request"  : 14,
                        "Host"     : 15,
                        "Referer"  : 17
                    },
                    "types"    : {
                        "Date"     : "date:d\/m\/Y H:i:s \/100",
                        "Severity" : "badge:severity",
                        "Error"    : "pre",
                        "Client"   : "ip:http",
                        "Server"   : "txt",
                        "Method"   : "txt",
                        "Request"  : "txt",
                        "Host"     : "ip:http",
                        "Referer"  : "link"
                    }
                }
            },
            "nginx7": {
                "display" : "Cached HHVM NGINX Access Log",
                "path"    : "\/var\/log\/nginx\/cache.hhvm.hgv.dev.apachestyle.access.log",
                "refresh" : 0,
                "max"     : 10,
                "notify"  : false,
                "format"  : {
                    "type"         : "NCSA Extended",
                    "regex"        : "|^((\\S*) )*(\\S*) (\\S*) (\\S*) \\[(.*)\\] \"(\\S*) (.*) (\\S*)\" ([0-9]*) (.*)( \"(.*)\" \"(.*)\"( [0-9]*/([0-9]*))*)*$|U",
                    "export_title" : "URL",
                    "match"        : {
                        "Date"    : 6,
                        "IP"      : 3,
                        "CMD"     : 7,
                        "URL"     : 8,
                        "Code"    : 10,
                        "Size"    : 11,
                        "Referer" : 13,
                        "UA"      : 14,
                        "User"    : 5
                    },
                    "types": {
                        "Date"    : "date:H:i:s",
                        "IP"      : "ip:geo",
                        "URL"     : "txt",
                        "Code"    : "badge:http",
                        "Size"    : "numeral:0b",
                        "Referer" : "link",
                        "UA"      : "ua:{os.name} {os.version} | {browser.name} {browser.version}\/100"
                    },
                    "exclude": {
                        "URL": ["\/favicon.ico\/", "\/\\.pml\\.php\\.*$\/"],
                        "CMD": ["\/OPTIONS\/"]
                    }
                }
            },
            "nginx8": {
                "display" : "Cached HHVM NGINX Error Log",
                "path"    : "\/var\/log\/nginx\/cache.hhvm.hgv.dev.error.log",
                "refresh" : 5,
                "max"     : 10,
                "notify"  : true,
                "format"    : {
                    "type"         : "NGINX",
                    "regex"        : "@^(.*)/(.*)/(.*) (.*):(.*):(.*) \\[(.*)\\] [0-9#]*: \\*[0-9]+ (((.*), client: (.*), server: (.*), request: \"(.*) (.*) HTTP.*\", host: \"(.*)\"(, referrer: \"(.*)\")*)|(.*))$@U",
                    "export_title" : "Error",
                    "match"        : {
                        "Date"     : [1,"\/",2,"\/",3," ",4,":",5,":",6],
                        "Severity" : 7,
                        "Error"    : [10,18],
                        "Client"   : 11,
                        "Server"   : 12,
                        "Method"   : 13,
                        "Request"  : 14,
                        "Host"     : 15,
                        "Referer"  : 17
                    },
                    "types"    : {
                        "Date"     : "date:d\/m\/Y H:i:s \/100",
                        "Severity" : "badge:severity",
                        "Error"    : "pre",
                        "Client"   : "ip:http",
                        "Server"   : "txt",
                        "Method"   : "txt",
                        "Request"  : "txt",
                        "Host"     : "ip:http",
                        "Referer"  : "link"
                    }
                }
            },
            "nginx9": {
                "display" : "Main NGINX Access Log",
                "path"    : "\/var\/log\/nginx\/access.log",
                "refresh" : 0,
                "max"     : 10,
                "notify"  : false,
                "format"  : {
                    "type"         : "NCSA Extended",
                    "regex"        : "|^((\\S*) )*(\\S*) (\\S*) (\\S*) \\[(.*)\\] \"(\\S*) (.*) (\\S*)\" ([0-9]*) (.*)( \"(.*)\" \"(.*)\"( [0-9]*/([0-9]*))*)*$|U",
                    "export_title" : "URL",
                    "match"        : {
                        "Date"    : 6,
                        "IP"      : 3,
                        "CMD"     : 7,
                        "URL"     : 8,
                        "Code"    : 10,
                        "Size"    : 11,
                        "Referer" : 13,
                        "UA"      : 14,
                        "User"    : 5
                    },
                    "types": {
                        "Date"    : "date:H:i:s",
                        "IP"      : "ip:geo",
                        "URL"     : "txt",
                        "Code"    : "badge:http",
                        "Size"    : "numeral:0b",
                        "Referer" : "link",
                        "UA"      : "ua:{os.name} {os.version} | {browser.name} {browser.version}\/100"
                    },
                    "exclude": {
                        "URL": ["\/favicon.ico\/", "\/\\.pml\\.php\\.*$\/"],
                        "CMD": ["\/OPTIONS\/"]
                    }
                }
            },
            "nginx10": {
                "display" : "Main NGINX Error Log",
                "path"    : "\/var\/log\/nginx\/error.log",
                "refresh" : 5,
                "max"     : 10,
                "notify"  : true,
                "format"    : {
                    "type"         : "NGINX",
                    "regex"        : "@^(.*)/(.*)/(.*) (.*):(.*):(.*) \\[(.*)\\] [0-9#]*: \\*[0-9]+ (((.*), client: (.*), server: (.*), request: \"(.*) (.*) HTTP.*\", host: \"(.*)\"(, referrer: \"(.*)\")*)|(.*))$@U",
                    "export_title" : "Error",
                    "match"        : {
                        "Date"     : [1,"\/",2,"\/",3," ",4,":",5,":",6],
                        "Severity" : 7,
                        "Error"    : [10,18],
                        "Client"   : 11,
                        "Server"   : 12,
                        "Method"   : 13,
                        "Request"  : 14,
                        "Host"     : 15,
                        "Referer"  : 17
                    },
                    "types"    : {
                        "Date"     : "date:d\/m\/Y H:i:s \/100",
                        "Severity" : "badge:severity",
                        "Error"    : "pre",
                        "Client"   : "ip:http",
                        "Server"   : "txt",
                        "Method"   : "txt",
                        "Request"  : "txt",
                        "Host"     : "ip:http",
                        "Referer"  : "link"
                    }
                }
            },
            "nginx11": {
                "display" : "Varnish NGINX Access Log",
                "path"    : "\/var\/log\/nginx\/varnish.hgv.dev.apachestyle.access.log",
                "refresh" : 0,
                "max"     : 10,
                "notify"  : false,
                "format"  : {
                    "type"         : "NCSA Extended",
                    "regex"        : "|^((\\S*) )*(\\S*) (\\S*) (\\S*) \\[(.*)\\] \"(\\S*) (.*) (\\S*)\" ([0-9]*) (.*)( \"(.*)\" \"(.*)\"( [0-9]*/([0-9]*))*)*$|U",
                    "export_title" : "URL",
                    "match"        : {
                        "Date"    : 6,
                        "IP"      : 3,
                        "CMD"     : 7,
                        "URL"     : 8,
                        "Code"    : 10,
                        "Size"    : 11,
                        "Referer" : 13,
                        "UA"      : 14,
                        "User"    : 5
                    },
                    "types": {
                        "Date"    : "date:H:i:s",
                        "IP"      : "ip:geo",
                        "URL"     : "txt",
                        "Code"    : "badge:http",
                        "Size"    : "numeral:0b",
                        "Referer" : "link",
                        "UA"      : "ua:{os.name} {os.version} | {browser.name} {browser.version}\/100"
                    },
                    "exclude": {
                        "URL": ["\/favicon.ico\/", "\/\\.pml\\.php\\.*$\/"],
                        "CMD": ["\/OPTIONS\/"]
                    }
                }
            },
            "nginx12": {
                "display" : "Varnish NGINX Error Log",
                "path"    : "\/var\/log\/nginx\/varnish.hgv.dev.error.log",
                "refresh" : 5,
                "max"     : 10,
                "notify"  : true,
                "format"    : {
                    "type"         : "NGINX",
                    "regex"        : "@^(.*)/(.*)/(.*) (.*):(.*):(.*) \\[(.*)\\] [0-9#]*: \\*[0-9]+ (((.*), client: (.*), server: (.*), request: \"(.*) (.*) HTTP.*\", host: \"(.*)\"(, referrer: \"(.*)\")*)|(.*))$@U",
                    "export_title" : "Error",
                    "match"        : {
                        "Date"     : [1,"\/",2,"\/",3," ",4,":",5,":",6],
                        "Severity" : 7,
                        "Error"    : [10,18],
                        "Client"   : 11,
                        "Server"   : 12,
                        "Method"   : 13,
                        "Request"  : 14,
                        "Host"     : 15,
                        "Referer"  : 17
                    },
                    "types"    : {
                        "Date"     : "date:d\/m\/Y H:i:s \/100",
                        "Severity" : "badge:severity",
                        "Error"    : "pre",
                        "Client"   : "ip:http",
                        "Server"   : "txt",
                        "Method"   : "txt",
                        "Request"  : "txt",
                        "Host"     : "ip:http",
                        "Referer"  : "link"
                    }
                }
            }
        }
    }
