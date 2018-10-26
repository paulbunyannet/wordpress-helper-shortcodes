# wordpress-helper-shortcodes
Helper shortcodes used from project to project

[![Build Status](https://travis-ci.org/paulbunyannet/wordpress-helper-shortcodes.svg?branch=master)](https://travis-ci.org/paulbunyannet/wordpress-helper-shortcodes)

## Shortcodes

### [env]

Get an environment variable. 

#### Usage

`[env ENVIRONMENT_VAR_NAME]`

### [bloginfo]

Get blog info. 

#### Properties

| Property  |   |   | Default |
|---|---|---|---|
| key | Required |  What property to get from the blog. See https://developer.wordpress.org/reference/functions/get_bloginfo/#description for all the options. | name |
| filter  | Optional |  What filter to use on the returned value | raw |

#### Usage
```
[bloginfo key="url" filter="raw"]
\\ return url of the site with the raw filter
```
