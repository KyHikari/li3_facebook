# Facebook PHP SDK plugin for the Lithium framework.

## Instalation
Checkout the code to either of your library directories:

	$ cd my/li3/project/
	$ git submodule add https://github.com/kyhikari/li3_facebook.git libraries/li3_facebook

Include the library in in your `/app/config/bootstrap/libraries.php`

	Libraries::add('li3_facebook', array(
		'options' => array(
			'appId' => 'MYAPPID',
			'secret' => 'MYAPPSECRET'
		)
	));

## Usage

### Auth
This library contains an auth adapter and a helper to make use of the official facebook php sdk.

To use the auth adapter simply add it to your auth config like this:

	Auth::config(array(
		'facebook' => array('adapter' => 'Facebook')
	));

So you can check exchange the code for the actual request token using:

	$user = Auth::check('facebook', $this->request);

### Helper
The helper is fairly simple to use, it can use all the methods used on the official facebook sdk as it can generate the links for login and logout with `loginUrl` and `logoutUrl`

Also, you can embed the js sdk with the method `javascriptSdk`

## Credits
This work is kind of based on:

[tmaiaroto/li3_facebook](https://github.com/tmaiaroto/li3_facebook)