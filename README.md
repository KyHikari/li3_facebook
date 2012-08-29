# Facebook PHP SDK plugin for the Lithium framework.

## Instalation
Checkout the code to either of your library directories:

	$ cd my/li3/project/
	$ git submodule add https://github.com/kyhikari/li3_facebook.git libraries/li3_facebook

Update submodules

	$ cd libraries/li3_facebook
	$ git submodule update --init

Include the library in in your `/app/config/bootstrap/libraries.php`

	Libraries::add('li3_facebook', array(
		'options' => array(
			'appId' => 'MYAPPID',
			'secret' => 'MYAPPSECRET'
		)
	));

## Usage

### Facebok Api
Use the `FacebookProxy` class

	use li3_facebook\extensions\FacebookProxy;

And you can use the static calls to use the original methods from the Facebook API

	$user = FacebookProxy::api('/me');

### Helper
The helper is fairly simple to use, it can use all the methods used on the official facebook sdk as it can generate the links for login and logout with `loginUrl` and `logoutUrl`

	$this->facebook->loginUrl('Login with Facebook.', array('scope' => 'email'));

If you only need the url to redirect the user yourself you can use:

	$url = $this->facebook->getLoginUrl($params);

Also, you can embed the js sdk with the method `javascriptSdk`

	$this->facebook->javascriptSdk();

## Credits
This work is based on:

[tmaiaroto/li3_facebook](https://github.com/tmaiaroto/li3_facebook)